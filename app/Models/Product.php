<?php

namespace App\Models;

use App\Enums\ProductStatus;
use Cknow\Money\Money;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $casts = [
        'stock' => 'integer',
        'created_at' => 'datetime',
        'status' => ProductStatus::class,

    ];

    protected $appends = [
        'images',
    ];

    protected $fillable = [
        'name',
        'description',
        'before_price',
        'price',
        'stock',
        'status',
    ];

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();
        if ($file) {
            $file->url = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview = $file->getUrl('preview');
        }

        return $file;
    }

    public function formattedPrice(): Money
    {
        return Money::RWF($this->price);
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit(Fit::Contain, 300, 300)->nonQueued();

    }

    public static function boot(): void
    {
        parent::boot();
        static::creating(function ($product) {
            $product->slug = Str::slug($product->name);
        });
    }
}
