<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingReschedule extends Model
{
    use HasFactory;

    public function booking(){
        return $this->belongsTo(Booking::class);
    }

    public function slotDetail(){
        return $this->belongsTo(Slot::class, 'old_slot_id');
    }
}
