<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $casts = [
        'status' => OrderStatus::class,
    ];

    protected $fillable = [
        'order_number',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'customer_note',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        // Generate order number before creating the order
        static::creating(function ($order) {
            // Get the last order id
            $lastOrder = static::orderBy('id', 'desc')->first();
            $nextId = $lastOrder ? $lastOrder->id + 1 : 1;

            // Generate the order number
            $order->order_number = 'ORD-'.str_pad($nextId, 6, '0', STR_PAD_LEFT);
        });
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
