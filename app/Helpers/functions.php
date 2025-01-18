<?php

use App\ENUM\SupportStatusEnum;

if (!function_exists('getSupportStatus')) {
    function getSupportStatus(string $status): string {
        return SupportStatusEnum::fromName($status);
    }
}
