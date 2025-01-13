<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum OrderStatus: string implements HasColor, HasIcon, HasLabel
{
    case PENDING = 'pending';
    case PROCESSING = 'processing';
    case SHIPPED = 'shipped';
    case DELIVERED = 'delivered';
    case CANCELLED = 'cancelled';
    case REFUNDED = 'refunded';
    case COMPLETED = 'completed';

    public function getLabel(): string
    {
        return match ($this) {
            OrderStatus::PENDING => 'Pending',
            OrderStatus::PROCESSING => 'Processing',
            OrderStatus::SHIPPED => 'Shipped',
            OrderStatus::DELIVERED => 'Delivered',
            OrderStatus::CANCELLED => 'Cancelled',
            OrderStatus::REFUNDED => 'Refunded',
            OrderStatus::COMPLETED => 'Completed',

        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::PENDING => 'indigo',
            self::PROCESSING => 'blue',
            self::SHIPPED, self::REFUNDED => 'yellow',
            self::DELIVERED,self::COMPLETED => 'green',
            self::CANCELLED => 'red',

        };

    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::PENDING => 'heroicon-m-sparkles',
            self::PROCESSING => 'heroicon-m-arrow-path',
            self::Shipped => 'heroicon-m-truck',
            self::SHIPPED => 'heroicon-m-check-badge',
            self::CANCELLED => 'heroicon-m-x-circle',
        };
    }
}
