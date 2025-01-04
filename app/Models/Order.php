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

    public function generateOrderNumber($prefix = 'ORD-', $pad_string = '0', $length = 6): void
    {
        $orderNumber = $prefix.str_pad($this->id, $pad_string, STR_PAD_LEFT);
        $this->order_number = $orderNumber;
        $this->save();
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
