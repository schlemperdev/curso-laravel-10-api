<?php

namespace App\DTOs;

use App\Http\Requests\StoreUpdateSupport;

class CreateSupportDTO
{
    public function __construct(
        public string $subject,
        public string $message,
        public string $status,
    ) {}

    public static function fromRequest(StoreUpdateSupport $request): self
    {
        return new self(
            subject: $request->subject,
            message: $request->message,
            status: 'open',
        );
    }
}
