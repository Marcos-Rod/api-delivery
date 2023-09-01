<?php

namespace App\Business;

use App\Models\User;

class AbilitiesResolve
{
    public static function resolve(User $user, $device)
    {
        if ($user->role == 'client') {
            return static::resolveForClient($device);
        }
        if ($user->role == 'delivery') {
            return static::resolveForDelivery($device);
        }

        return [];
    }

    public static function resolveForClient($device)
    {
        return match ($device) {
            'watch' => [
                'establishment:show',
            ],
            default => [
                'establishments:show',
                'product:show',
                'orders:create',
                'orders:show',
                'cart:manage',
            ]
        };
    }

    public static function resolveForDelivery($device)
    {
        return [
            'availability:update',
            'coordinates:update',
            'orders:update',
            'orders:show',
        ];
    }
}
