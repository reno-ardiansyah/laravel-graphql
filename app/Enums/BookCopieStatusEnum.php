<?php

namespace App\Enums;

enum BookCopieStatusEnum: string
{
    case AVAILABLE = 'Available';
    case BORROWED = 'Borrowed';
    case LOST = 'Lost';

    public static function options()
    {
        return collect(self::cases())->mapWithKeys(function ($case) {
            return [$case->value => $case->name];
        });
    }
}
