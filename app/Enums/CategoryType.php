<?php

namespace App\Enums;

enum CategoryType: string
{
    case PRODUCT = 'product';
    case ESTABLISHMENT = 'establishment';

    public function description(): string
    {
        return match($this) {
            self::PRODUCT => 'Product',
            default => 'Establishment',
        };
    }
}
