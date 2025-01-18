<?php

namespace App\DTOs\Supports;

use App\ENUM\SupportStatusEnum;
use App\Http\Requests\StoreUpdateSupport;

class UpdateSupportDTO
{
    public function __construct(
        public string $id,
        public string $subject,
        public string $message,
        public SupportStatusEnum $status,
    ) {}

    public static function fromRequest(StoreUpdateSupport $request): self
    {
        return new self(
            $request->id,
            $request->subject,
            $request->message,
            SupportStatusEnum::OPEN,
        );
    }
}
