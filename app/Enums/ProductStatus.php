<?php

namespace App\Enums;

enum ProductStatus: string
{
    case INSTOCK = 'in-stock';
    case OUTOFSTOCK = 'out-of-stock';

    public function color(): string
    {
        return match ($this) {
            ProductStatus::INSTOCK => 'green',
            ProductStatus::OUTOFSTOCK => 'red',
        };

    }

    public function label(): string
    {
        return match ($this) {
            ProductStatus::INSTOCK => 'In Stock',
            ProductStatus::OUTOFSTOCK => 'Out Of Stock',
        };
    }
}
