<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    public function consultationPrice(): Attribute
    {
        return new Attribute(
            get: fn ($consultation_price) => round($consultation_price / 100, 2),
            set: fn ($consultation_price) => round($consultation_price * 100),
        );
    }
}
