<?php

namespace App\Models;

use App\ENUM\SupportStatusEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Support extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'message',
        'status',
    ];

    public function status(): Attribute
    {
        return Attribute::make(
            set: fn (SupportStatusEnum $status) => $status->name,
        );
    }
}
