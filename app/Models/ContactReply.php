<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactReply extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopeSearch($query, $search){
        return $query->where('reply', 'LIKE', "%{$search}%");
    }
}
