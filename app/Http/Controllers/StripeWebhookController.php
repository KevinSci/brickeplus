<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Plan;
use App\Models\Transaction;
use App\Services\StripeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Webhook;
use Stripe\Exception\UnexpectedValueException;
use Stripe\Exception\SignatureVerificationException;

class StripeWebhookController extends Controller
{
    private StripeService $stripeService;

    public function __construct(StripeService $stripeService)
    {
        $this->stripeService = $stripeService;
    }

    /**
     * Handle Stripe webhook.
     */
    public function handleWebhook(Request $request)
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $endpointSecret = config('services.stripe.webhook_secret');

        if (empty($sigHeader)) {
            Log::error("No se recibió firma de Stripe");
            return response('Missing signature', 400);
        }

        try {
            $event = Webhook::constructEvent($payload, $sigHeader, $endpointSecret);
        } catch (UnexpectedValueException $e) {
            Log::error("Payload inválido: " . $e->getMessage());
            return response('Invalid payload', 400);
        } catch (SignatureVerificationException $e) {
            Log::error("Firma inválida: " . $e->getMessage());
            return response('Invalid signature', 400);
        }

        Log::info("Webhook recibido: {$event['type']} - ID: {$event['id']}");

        try {
            switch ($event['type']) {
                case 'checkout.session.completed':
                    $this->handleCheckoutSessionCompleted($event['data']['object']);
                    break;

                case 'customer.subscription.updated':
                    $this->handleSubscriptionUpdated($event['data']['object']);
                    break;

                case 'customer.subscription.deleted':
                    $this->handleSubscriptionDeleted($event['data']['object']);
                    break;

                default:
                    Log::info("Evento no manejado: {$event['type']}");
            }
        } catch (\Exception $e) {
            Log::error("Error procesando webhook {$event['type']}: " . $e->getMessage());
            return response('Webhook processing failed', 500);
        }

        return response('OK', 200);
    }

    /**
     * Handle checkout session completed event.
     */
    private function handleCheckoutSessionCompleted(array $session)
    {
        // Validar que es una suscripción
        if ($session['mode'] !== 'subscription') {
            Log::info("Checkout session no es de suscripción");
            return;
        }

        $subscriptionId = $session['subscription'] ?? null;
        $email = $session['customer_details']['email'] ?? null;
        $paymentId = $session['payment_intent'] ?? null;
        $customerId = $session['customer'] ?? null;

        if (!$subscriptionId || !$email) {
            Log::error("Datos incompletos en checkout.session.completed");
            return;
        }

        // Verificar que el usuario existe
        $user = User::findByEmail($email);
        if (!$user) {
            Log::error("Usuario no encontrado con email: {$email}");
            return;
        }

        // Obtener la suscripción para conseguir el price_id
        $subscription = $this->stripeService->retrieveSubscription($subscriptionId);
        if (!$subscription) {
            Log::error("No se pudo obtener la suscripción: {$subscriptionId}");
            return;
        }

        $priceId = $subscription->items->data[0]->price->id ?? null;
        if (!$priceId) {
            Log::error("No se pudo obtener price_id de la suscripción");
            return;
        }

        // Obtener plan desde la base de datos
        $plan = Plan::findByStripePriceId($priceId);
        if (!$plan) {
            Log::error("No se encontró plan activo para price_id: {$priceId}");
            return;
        }

        // Actualizar el usuario
        $user->update([
            'plan_id' => $plan->id,
            'payment_id' => $paymentId,
            'stripe_customer_id' => $customerId,
            'stripe_subscription_id' => $subscriptionId,
            'subscription_status' => 'active',
            'subscription_start' => now()->toDateString(),
        ]);

        // Crear transacción
        Transaction::createForSubscription(
            $user->id,
            $plan->id,
            $paymentId,
            $subscriptionId,
            $plan->price
        );

        Log::info("Usuario actualizado exitosamente: Email: {$email}, Plan ID: {$plan->id}");
    }

    /**
     * Handle subscription updated event.
     */
    private function handleSubscriptionUpdated(array $subscription)
    {
        $customerId = $subscription['customer'] ?? null;
        $subscriptionId = $subscription['id'] ?? null;
        $status = $subscription['status'] ?? null;
        $priceId = $subscription['items']['data'][0]['price']['id'] ?? null;

        if (!$customerId || !$priceId) {
            Log::error("Datos incompletos en subscription.updated");
            return;
        }

        $plan = Plan::findByStripePriceId($priceId);
        if (!$plan) {
            Log::error("No se encontró plan para price_id en subscription.updated: {$priceId}");
            return;
        }

        // Obtener el email del customer
        $customer = $this->stripeService->retrieveCustomer($customerId);
        if (!$customer || !$customer->email) {
            Log::error("No se pudo obtener email del customer: {$customerId}");
            return;
        }

        // Mapear estados de Stripe a nuestros estados
        $subscriptionStatus = in_array($status, ['canceled', 'unpaid', 'past_due', 'incomplete']) 
            ? $status 
            : 'active';

        $user = User::findByEmail($customer->email);
        if ($user) {
            $user->update([
                'plan_id' => $plan->id,
                'stripe_subscription_id' => $subscriptionId,
                'subscription_status' => $subscriptionStatus,
            ]);

            Log::info("Suscripción actualizada: Email: {$customer->email}, Plan ID: {$plan->id}, Status: {$subscriptionStatus}");
        }
    }

    /**
     * Handle subscription deleted event.
     */
    private function handleSubscriptionDeleted(array $subscription)
    {
        $customerId = $subscription['customer'] ?? null;

        if (!$customerId) {
            Log::error("Customer ID faltante en subscription.deleted");
            return;
        }

        $customer = $this->stripeService->retrieveCustomer($customerId);
        if (!$customer || !$customer->email) {
            Log::error("No se pudo obtener email del customer: {$customerId}");
            return;
        }

        $user = User::findByEmail($customer->email);
        if ($user) {
            $user->update([
                'plan_id' => null,
                'subscription_status' => 'canceled',
                'subscription_end' => now()->toDateString(),
            ]);

            Log::info("Suscripción cancelada: Email: {$customer->email}");
        }
    }
}