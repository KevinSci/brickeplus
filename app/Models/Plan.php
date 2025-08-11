<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'stripe_price_id',
        'price',
        'billing_period',
        'type',
        'description',
        'is_active',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Get the users for the plan.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get the transactions for the plan.
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Scope a query to only include active plans.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Find plan by Stripe price ID.
     */
    public static function findByStripePriceId(string $stripePriceId): ?self
    {
        return static::where('stripe_price_id', $stripePriceId)
                    ->where('is_active', true)
                    ->first();
    }

    /**
     * Get price map for Stripe checkout.
     */
    public static function getPriceMap(): array
    {
        return static::active()
                    ->pluck('stripe_price_id', 'type')
                    ->toArray();
    }
}