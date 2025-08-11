<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Plan;
use App\Models\Transaction;
use App\Services\StripeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StripeController extends Controller
{
    private StripeService $stripeService;

    public function __construct(StripeService $stripeService)
    {
        $this->stripeService = $stripeService;
    }

    /**
     * Create checkout session.
     */
    public function createCheckoutSession(Request $request)
    {
        $request->validate([
            'plan' => 'required|string|in:monthly_basic,monthly_family,monthly_premium,yearly_basic,yearly_family,yearly_premium'
        ]);

        $result = $this->stripeService->createCheckoutSession($request->plan);

        if (!$result['success']) {
            return response()->json([
                'error' => $result['error']
            ], 400);
        }

        return redirect($result['session_url']);
    }

    /**
     * Handle successful payment.
     */
    public function success(Request $request)
    {
        $sessionId = $request->get('session_id');

        if (!$sessionId) {
            return redirect()->route('home')->with('error', 'No se proporcionó una sesión válida.');
        }

        $session = $this->stripeService->retrieveSession($sessionId);

        if (!$session) {
            return redirect()->route('home')->with('error', 'Sesión no encontrada.');
        }

        $result = $this->stripeService->processSuccessfulCheckout($session);

        if (!$result['success']) {
            return redirect()->route('home')->with('error', $result['error']);
        }

        // Actualizar o crear usuario
        $user = User::updateOrCreateWithSubscription($result['email'], [
            'plan_id' => $result['plan']->id,
            'payment_id' => $session->payment_intent,
            'stripe_customer_id' => $session->customer,
            'stripe_subscription_id' => $session->subscription,
        ]);

        // Crear transacción
        Transaction::createForSubscription(
            $user->id,
            $result['plan']->id,
            $session->payment_intent,
            $session->subscription,
            $result['plan']->price
        );

        return view('stripe.success', [
            'email' => $result['email'],
            'plan' => $result['plan'],
        ]);
    }

    /**
     * Handle canceled payment.
     */
    public function cancel()
    {
        return view('stripe.cancel');
    }

    /**
     * Show subscription plans.
     */
    public function plans()
    {
        $plans = Plan::active()->get();
        
        return view('stripe.plans', compact('plans'));
    }
}