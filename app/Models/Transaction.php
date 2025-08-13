<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'plan_id',
        'stripe_payment_intent_id',
        'stripe_subscription_id',
        'amount',
        'status',
        'type',
        'metadata',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'metadata' => 'array',
        ];
    }

    /**
     * Get the user that owns the transaction.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the plan that belongs to the transaction.
     */
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    /**
     * Scope a query to only include successful transactions.
     */
    public function scopeSuccessful($query)
    {
        return $query->where('status', 'succeeded');
    }

    /**
     * Create transaction for subscription.
     */
    public static function createForSubscription(
        int $userId,
        int $planId,
        //string $paymentIntentId,
        string $subscriptionId,
        float $amount
    ): self {
        return static::create([
            'user_id' => $userId,
            'plan_id' => $planId,
            //'stripe_payment_intent_id' => $paymentIntentId,
            'stripe_subscription_id' => $subscriptionId,
            'amount' => $amount,
            'status' => 'succeeded',
            'type' => 'subscription',
        ]);
    }
}