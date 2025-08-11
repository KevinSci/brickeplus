<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Básico Mensual',
                'stripe_price_id' => 'price_1RqmZB3sfr7lAp9p7iW90Sra',
                'price' => 9.99,
                'billing_period' => 'monthly',
                'type' => 'basic',
                'description' => 'Plan básico con funcionalidades esenciales',
                'is_active' => true,
            ],
            [
                'name' => 'Familiar Mensual',
                'stripe_price_id' => 'price_1RpIAD3sfr7lAp9pfVDlYW6E',
                'price' => 19.99,
                'billing_period' => 'monthly',
                'type' => 'family',
                'description' => 'Plan familiar para hasta 5 usuarios',
                'is_active' => true,
            ],
            [
                'name' => 'Premium Mensual',
                'stripe_price_id' => 'price_1RpHxJ3sfr7lAp9pZXgKSTMs',
                'price' => 29.99,
                'billing_period' => 'monthly',
                'type' => 'premium',
                'description' => 'Plan premium con todas las funcionalidades',
                'is_active' => true,
            ],
            [
                'name' => 'Básico Anual',
                'stripe_price_id' => 'price_1RpJoY3sfr7lAp9pfuQKLMyn',
                'price' => 99.99,
                'billing_period' => 'yearly',
                'type' => 'basic',
                'description' => 'Plan básico anual con 2 meses gratis',
                'is_active' => true,
            ],
            [
                'name' => 'Familiar Anual',
                'stripe_price_id' => 'price_1Rqogg3sfr7lAp9p3SvsuToJ',
                'price' => 199.99,
                'billing_period' => 'yearly',
                'type' => 'family',
                'description' => 'Plan familiar anual con 2 meses gratis',
                'is_active' => true,
            ],
            [
                'name' => 'Premium Anual',
                'stripe_price_id' => 'price_1RpJsX3sfr7lAp9pPeXrd2NW',
                'price' => 299.99,
                'billing_period' => 'yearly',
                'type' => 'premium',
                'description' => 'Plan premium anual con 2 meses gratis',
                'is_active' => true,
            ],
        ];

        foreach ($plans as $plan) {
            Plan::updateOrCreate(
                ['stripe_price_id' => $plan['stripe_price_id']],
                $plan
            );
        }
    }
}