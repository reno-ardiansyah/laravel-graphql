<?php

namespace App\Enums;

enum GlobalActiveStatusEnum: string
{
    case ACTIVE = 'Active';
    case INACTIVE = 'Inactive';
    case PENDING = 'Pending';

    public static function options()
    {
        return collect(self::cases())->mapWithKeys(function ($case) {
            return [$case->value => $case->name];
        });
    }
}
