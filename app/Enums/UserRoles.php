<?php

namespace App\Enums;

enum UserRoles
{
    case ADMIN;
    case USER;

    public function allowed()
    {
        return match ($this) {
            UserRoles::ADMIN => [
                'create' => false,
                'read' => true,
                'update' => false,
                'delete' => true
            ],
            UserRoles::USER => [
                'create' => true,
                'read' => true,
                'update' => true,
                'delete' => true,
            ],
        };
    }

    public static function from(string $value): ?self
    {
        return match ($value) {
            'ADMIN' => self::ADMIN,
            'USER' => self::USER,
        };
    }
}
