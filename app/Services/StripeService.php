<?php

namespace App\Services;

use App\Models\Plan;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\Subscription;
use Stripe\Customer;
use Stripe\Exception\ApiErrorException;
use Illuminate\Support\Facades\Log;


class StripeService
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    /**
     * Create checkout session for subscription.
     */
    public function createCheckoutSession(string $planKey): array
    {
        $priceMap = $this->getPriceMap();
        
        if (!array_key_exists($planKey, $priceMap)) {
            throw new \InvalidArgumentException('Plan de suscripción no válido.');
        }

        try {
            $session = Session::create([
                'payment_method_types' => ['card'],
                'mode' => 'subscription',
                'line_items' => [[
                    'price' => $priceMap[$planKey],
                    'quantity' => 1,
                ]],
                'success_url' => route('stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('stripe.cancel'),
                'customer_email' => auth()->user()->email ?? null,
            ]);

            return [
                'success' => true,
                'session_url' => $session->url,
                'session_id' => $session->id,
            ];
        } catch (ApiErrorException $e) {
            Log::error('Error creating Stripe checkout session: ' . $e->getMessage());
            
            return [
                'success' => false,
                'error' => 'Error al crear la sesión de pago: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Retrieve checkout session.
     */
    public function retrieveSession(string $sessionId): ?Session
    {
        try {
            return Session::retrieve($sessionId);
        } catch (ApiErrorException $e) {
            Log::error('Error retrieving Stripe session: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Retrieve subscription.
     */
    public function retrieveSubscription(string $subscriptionId): ?Subscription
    {
        try {
            return Subscription::retrieve($subscriptionId);
        } catch (ApiErrorException $e) {
            Log::error('Error retrieving Stripe subscription: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Retrieve customer.
     */
    public function retrieveCustomer(string $customerId): ?Customer
    {
        try {
            return Customer::retrieve($customerId);
        } catch (ApiErrorException $e) {
            Log::error('Error retrieving Stripe customer: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Get price map from database.
     */
    private function getPriceMap(): array
    {
        return [
            "monthly_basic" => "price_1RqmZB3sfr7lAp9p7iW90Sra",
            "monthly_family" => "price_1RpIAD3sfr7lAp9pfVDlYW6E",
            "monthly_premium" => "price_1RpHxJ3sfr7lAp9pZXgKSTMs",
            "yearly_basic" => "price_1RpJoY3sfr7lAp9pfuQKLMyn",
            "yearly_family" => "price_1Rqogg3sfr7lAp9p3SvsuToJ",
            "yearly_premium" => "price_1RpJsX3sfr7lAp9pPeXrd2NW"
        ];
        
        // Alternativamente, usar la base de datos:
        // return Plan::active()->pluck('stripe_price_id', 'type')->toArray();
    }

    /**
     * Process successful checkout session.
     */
    public function processSuccessfulCheckout(Session $session): array
    {
        if (!$session->subscription) {
            return [
                'success' => false,
                'error' => 'Esta sesión no tiene una suscripción asociada.',
            ];
        }

        $subscription = $this->retrieveSubscription($session->subscription);
        $customer = $this->retrieveCustomer($session->customer);

        if (!$subscription || !$customer) {
            return [
                'success' => false,
                'error' => 'No se pudo obtener información de la suscripción.',
            ];
        }

        $email = $customer->email;
        $priceId = $subscription->items->data[0]->price->id;
        $plan = Plan::findByStripePriceId($priceId);

        if (!$plan) {
            Log::error("Plan no encontrado para price_id: {$priceId}");
            return [
                'success' => false,
                'error' => 'Plan no encontrado.',
            ];
        }

        return [
            'success' => true,
            'email' => $email,
            'plan' => $plan,
            'subscription' => $subscription,
            'customer' => $customer,
        ];
    }
}