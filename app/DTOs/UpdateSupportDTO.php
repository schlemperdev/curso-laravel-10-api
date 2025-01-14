<?php

namespace App\DTOs;

use App\Http\Requests\StoreUpdateSupport;

class UpdateSupportDTO
{
    public function __construct(
        public string $id,
        public string $subject,
        public string $message,
        public string $status,
    ) {}

    public static function fromRequest(StoreUpdateSupport $request): self
    {
        return new self(
            id: $request->id,
            subject: $request->subject,
            message: $request->message,
            status: 'open',
        );
    }
}
