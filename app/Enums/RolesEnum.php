<?php

namespace App\Enums;

enum RolesEnum: string
{
    case Admin = 'admin';
    case User = 'user';
    case Commenter = 'commenter';

    public function label(): string
    {
        return match ($this) {
            self::Admin => 'Administrator',
            self::User => 'user',
            self::Commenter => 'Commenter',
        };
    }

}
