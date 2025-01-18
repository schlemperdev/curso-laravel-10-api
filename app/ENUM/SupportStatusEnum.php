<?php

namespace App\ENUM;

enum SupportStatusEnum: string {
    case OPEN = 'open';
    case CLOSED = 'closed';
    case PENDING = 'pending';

    public static function fromName (string $name): string {
        foreach (self::cases() as $status) {
            if ($name === $status->name) {
                return $status->value;
            }
        }

        throw new \ValueError("$name is not a valid status");
    }
}
