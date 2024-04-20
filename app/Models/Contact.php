<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public function replies()
    {
        return $this->hasMany(ContactReply::class);
    }

    public function lastReply()
    {
        return $this->hasOne(ContactReply::class)->latest();
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('firstname', 'LIKE', "%{$search}%")
            ->orWhere('lastname', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->orWhere('contact', 'LIKE', "%{$search}%")
            ->orWhere('message', 'LIKE', "%{$search}%");
    }
}
