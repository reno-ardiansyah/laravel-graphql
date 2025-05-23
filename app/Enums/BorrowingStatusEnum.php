<?php

namespace App\Enums;

enum BorrowingStatusEnum: string
{
    case BORROWED = 'Borrowed';
    case RETURNED = 'Returned';
    case OVERDUE = 'Overdue';

    public static function options()
    {
        return collect(self::cases())->mapWithKeys(function ($case) {
            return [$case->value => $case->name];
        });
    }
}
