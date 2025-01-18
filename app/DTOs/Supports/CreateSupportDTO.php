<?php

namespace App\DTOs\Supports;

use App\ENUM\SupportStatusEnum;
use App\Http\Requests\StoreUpdateSupport;

class CreateSupportDTO
{
    public function __construct(
        public string $subject,
        public string $message,
        public SupportStatusEnum $status,
    ) {}

    public static function fromRequest(StoreUpdateSupport $request): self
    {
        return new self(
            $request->subject,
            $request->message,
            SupportStatusEnum::OPEN,
        );
    }
}
