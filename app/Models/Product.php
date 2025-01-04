<?php

namespace App\Models;

use App\Enums\ProductStatus;
use Cknow\Money\Money;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $casts = [
        'stock' => 'integer',
        'created_at' => 'datetime',
        'status' => ProductStatus::class,

    ];

    protected $fillable = [
        'name',
        'image',
        'description',
        'before_price',
        'price',
        'measurement',
        'stock',
        'status',
    ];

    public function formattedPrice(): Money
    {
        return Money::RWF($this->price);
    }

    public function formattedPriceBefore(): Money
    {
        return Money::RWF($this->before_price);
    }

    public static function boot(): void
    {
        parent::boot();
        static::creating(function ($product) {
            $product->slug = Str::slug($product->name);
        });
    }
}
