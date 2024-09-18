<?php

namespace App;

enum RolesEnum: string
{
    case SuperAdmin = 'Super Admin';
    case Admin = 'admin';
    case User = 'user';
    public static function getRoles(): array
    {
        return [
            self::SuperAdmin,
            self::Admin,
            self::User,
        ];
    }
}
