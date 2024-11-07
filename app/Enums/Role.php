<?php

namespace App\Enums;

enum Role: int
{
    case ADMIN = 1;
    case REGULAR = 2;

    public function slug(): string
    {
        return match ($this) {
            self::ADMIN => 'admin',
            self::REGULAR => 'regular',
        };
    }

    public function name(): string
    {
        return match ($this) {
            self::ADMIN => 'Administrator',
            self::REGULAR => 'Regular User',
        };
    }
}

