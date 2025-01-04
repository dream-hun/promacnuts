<?php

namespace App\Enums;

enum OrderStatus: string
{
    case PENDING = 'pending';
    case PROCESSING = 'processing';
    case SHIPPED = 'shipped';
    case DELIVERED = 'delivered';
    case CANCELLED = 'cancelled';
    case REFUNDED = 'refunded';
    case COMPLETED = 'completed';

    public function label(): string
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

    public function color(): string
    {
        return match ($this) {
            OrderStatus::PENDING => 'indigo',
            OrderStatus::PROCESSING => 'blue',
            OrderStatus::SHIPPED, OrderStatus::REFUNDED => 'yellow',
            OrderStatus::DELIVERED,OrderStatus::COMPLETED => 'green',
            OrderStatus::CANCELLED => 'red',

        };
    }
}
