<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;
    protected $fillable = ['date'];

    public function slots(){
        return $this->hasMany(Slot::class);
    }

    public function lastSlot(){
        return $this->hasOne(Slot::class)->latest();
    }

    public function scopeSearch($query, $search){
        return $query->where('date', 'LIKE', "%{$search}%");
    }

    public function available_slots(){
        return $this->slots()->doesntHave('booking');
    }

    public function available_consultation_slots(){
        return $this->slots()->whereHas('booking', function($q){ return $q->where('is_consultation', true); });
    }

}
