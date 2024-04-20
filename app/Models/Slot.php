<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slot extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static $slots = [
        '12:00 AM' => ['service_slot' => '12:00 AM - 12:30 AM', 'consultation_slot' => '12:00 AM - 12:30 AM', 'another_consultation_slot' => '12:30 AM - 01:00 AM'],
        '12:30 AM' => ['service_slot' => '12:30 AM - 01:00 AM', 'consultation_slot' => '12:00 AM - 12:30 AM', 'another_consultation_slot' => '12:30 AM - 01:00 AM'],
        '01:00 AM' => ['service_slot' => '01:00 AM - 01:30 AM', 'consultation_slot' => '01:00 AM - 01:30 AM', 'another_consultation_slot' => '01:30 AM - 02:00 AM'],
        '01:30 AM' => ['service_slot' => '01:30 AM - 02:00 AM', 'consultation_slot' => '01:00 AM - 01:30 AM', 'another_consultation_slot' => '01:30 AM - 02:00 AM'],
        '02:00 AM' => ['service_slot' => '02:00 AM - 02:30 AM', 'consultation_slot' => '02:00 AM - 02:30 AM', 'another_consultation_slot' => '02:30 AM - 03:00 AM'],
        '02:30 AM' => ['service_slot' => '02:30 AM - 03:00 AM', 'consultation_slot' => '02:00 AM - 02:30 AM', 'another_consultation_slot' => '02:30 AM - 03:00 AM'],
        '03:00 AM' => ['service_slot' => '03:00 AM - 03:30 AM', 'consultation_slot' => '03:00 AM - 03:30 AM', 'another_consultation_slot' => '03:30 AM - 04:00 AM'],
        '03:30 AM' => ['service_slot' => '03:30 AM - 04:00 AM', 'consultation_slot' => '03:00 AM - 03:30 AM', 'another_consultation_slot' => '03:30 AM - 04:00 AM'],
        '04:00 AM' => ['service_slot' => '04:00 AM - 04:30 AM', 'consultation_slot' => '04:00 AM - 04:30 AM', 'another_consultation_slot' => '04:30 AM - 05:00 AM'],
        '04:30 AM' => ['service_slot' => '04:30 AM - 05:00 AM', 'consultation_slot' => '04:00 AM - 04:30 AM', 'another_consultation_slot' => '04:30 AM - 05:00 AM'],
        '05:00 AM' => ['service_slot' => '05:00 AM - 05:30 AM', 'consultation_slot' => '05:00 AM - 05:30 AM', 'another_consultation_slot' => '05:30 AM - 06:00 AM'],
        '05:30 AM' => ['service_slot' => '05:30 AM - 06:00 AM', 'consultation_slot' => '05:00 AM - 05:30 AM', 'another_consultation_slot' => '05:30 AM - 06:00 AM'],
        '06:00 AM' => ['service_slot' => '06:00 AM - 06:30 AM', 'consultation_slot' => '06:00 AM - 06:30 AM', 'another_consultation_slot' => '06:30 AM - 07:00 AM'],
        '06:30 AM' => ['service_slot' => '06:30 AM - 07:00 AM', 'consultation_slot' => '06:00 AM - 06:30 AM', 'another_consultation_slot' => '06:30 AM - 07:00 AM'],
        '07:00 AM' => ['service_slot' => '07:00 AM - 07:30 AM', 'consultation_slot' => '07:00 AM - 07:30 AM', 'another_consultation_slot' => '07:30 AM - 08:00 AM'],
        '07:30 AM' => ['service_slot' => '07:30 AM - 08:00 AM', 'consultation_slot' => '07:00 AM - 07:30 AM', 'another_consultation_slot' => '07:30 AM - 08:00 AM'],
        '08:00 AM' => ['service_slot' => '08:00 AM - 08:30 AM', 'consultation_slot' => '08:00 AM - 08:30 AM', 'another_consultation_slot' => '08:30 AM - 09:00 AM'],
        '08:30 AM' => ['service_slot' => '08:30 AM - 09:00 AM', 'consultation_slot' => '08:00 AM - 08:30 AM', 'another_consultation_slot' => '08:30 AM - 09:00 AM'],
        '09:00 AM' => ['service_slot' => '09:00 AM - 09:30 AM', 'consultation_slot' => '09:00 AM - 09:30 AM', 'another_consultation_slot' => '09:30 AM - 10:00 AM'],
        '09:30 AM' => ['service_slot' => '09:30 AM - 10:00 AM', 'consultation_slot' => '09:00 AM - 09:30 AM', 'another_consultation_slot' => '09:30 AM - 10:00 AM'],
        '10:00 AM' => ['service_slot' => '10:00 AM - 10:30 AM', 'consultation_slot' => '10:00 AM - 10:30 AM', 'another_consultation_slot' => '10:30 AM - 11:00 AM'],
        '10:30 AM' => ['service_slot' => '10:30 AM - 11:00 AM', 'consultation_slot' => '10:00 AM - 10:30 AM', 'another_consultation_slot' => '10:30 AM - 11:00 AM'],
        '11:00 AM' => ['service_slot' => '11:00 AM - 11:30 PM', 'consultation_slot' => '11:00 AM - 11:30 AM', 'another_consultation_slot' => '11:30 AM - 12:00 PM'],
        '11:30 AM' => ['service_slot' => '11:30 AM - 12:00 PM', 'consultation_slot' => '11:00 AM - 11:30 AM', 'another_consultation_slot' => '11:30 AM - 12:00 PM'],
        '12:00 PM' => ['service_slot' => '12:00 PM - 12:30 PM', 'consultation_slot' => '12:00 PM - 12:30 PM', 'another_consultation_slot' => '12:30 PM - 01:00 PM'],
        '12:30 PM' => ['service_slot' => '12:30 PM - 01:00 PM', 'consultation_slot' => '12:00 PM - 12:30 PM', 'another_consultation_slot' => '12:30 PM - 01:00 PM'],
        '01:00 PM' => ['service_slot' => '01:00 PM - 01:30 PM', 'consultation_slot' => '01:00 PM - 01:30 PM', 'another_consultation_slot' => '01:30 PM - 02:00 PM'],
        '01:30 PM' => ['service_slot' => '01:30 PM - 02:00 PM', 'consultation_slot' => '01:00 PM - 01:30 PM', 'another_consultation_slot' => '01:30 PM - 02:00 PM'],
        '02:00 PM' => ['service_slot' => '02:00 PM - 02:30 PM', 'consultation_slot' => '02:00 PM - 02:30 PM', 'another_consultation_slot' => '02:30 PM - 03:00 PM'],
        '02:30 PM' => ['service_slot' => '02:30 PM - 03:00 PM', 'consultation_slot' => '02:00 PM - 02:30 PM', 'another_consultation_slot' => '02:30 PM - 03:00 PM'],
        '03:00 PM' => ['service_slot' => '03:00 PM - 03:30 PM', 'consultation_slot' => '03:00 PM - 03:30 PM', 'another_consultation_slot' => '03:30 PM - 04:00 PM'],
        '03:30 PM' => ['service_slot' => '03:30 PM - 04:00 PM', 'consultation_slot' => '03:00 PM - 03:30 PM', 'another_consultation_slot' => '03:30 PM - 04:00 PM'],
        '04:00 PM' => ['service_slot' => '04:00 PM - 04:30 PM', 'consultation_slot' => '04:00 PM - 04:30 PM', 'another_consultation_slot' => '04:30 PM - 05:00 PM'],
        '04:30 PM' => ['service_slot' => '04:30 PM - 05:00 PM', 'consultation_slot' => '04:00 PM - 04:30 PM', 'another_consultation_slot' => '04:30 PM - 05:00 PM'],
        '05:00 PM' => ['service_slot' => '05:00 PM - 05:30 PM', 'consultation_slot' => '05:00 PM - 05:30 PM', 'another_consultation_slot' => '05:30 PM - 06:00 PM'],
        '05:30 PM' => ['service_slot' => '05:30 PM - 06:00 PM', 'consultation_slot' => '05:00 PM - 05:30 PM', 'another_consultation_slot' => '05:30 PM - 06:00 PM'],
        '06:00 PM' => ['service_slot' => '06:00 PM - 06:30 PM', 'consultation_slot' => '06:00 PM - 06:30 PM', 'another_consultation_slot' => '06:30 PM - 07:00 PM'],
        '06:30 PM' => ['service_slot' => '06:30 PM - 07:00 PM', 'consultation_slot' => '06:00 PM - 06:30 PM', 'another_consultation_slot' => '06:30 PM - 07:00 PM'],
        '07:00 PM' => ['service_slot' => '07:00 PM - 07:30 PM', 'consultation_slot' => '07:00 PM - 07:30 PM', 'another_consultation_slot' => '07:30 PM - 08:00 PM'],
        '07:30 PM' => ['service_slot' => '07:30 PM - 08:00 PM', 'consultation_slot' => '07:00 PM - 07:30 PM', 'another_consultation_slot' => '07:30 PM - 08:00 PM'],
        '08:00 PM' => ['service_slot' => '08:00 PM - 08:30 PM', 'consultation_slot' => '08:00 PM - 08:30 PM', 'another_consultation_slot' => '08:30 PM - 09:00 PM'],
        '08:30 PM' => ['service_slot' => '08:30 PM - 09:00 PM', 'consultation_slot' => '08:00 PM - 08:30 PM', 'another_consultation_slot' => '08:30 PM - 09:00 PM'],
        '09:00 PM' => ['service_slot' => '09:00 PM - 09:30 PM', 'consultation_slot' => '09:00 PM - 09:30 PM', 'another_consultation_slot' => '09:30 PM - 10:00 PM'],
        '09:30 PM' => ['service_slot' => '09:30 PM - 10:00 PM', 'consultation_slot' => '09:00 PM - 09:30 PM', 'another_consultation_slot' => '09:30 PM - 10:00 PM'],
        '10:00 PM' => ['service_slot' => '10:00 PM - 10:30 PM', 'consultation_slot' => '10:00 PM - 10:30 PM', 'another_consultation_slot' => '10:30 PM - 11:00 PM'],
        '10:30 PM' => ['service_slot' => '10:30 PM - 11:00 PM', 'consultation_slot' => '10:00 PM - 10:30 PM', 'another_consultation_slot' => '10:30 PM - 11:00 PM'],
        '11:00 PM' => ['service_slot' => '11:00 PM - 11:30 AM', 'consultation_slot' => '11:00 PM - 11:30 PM', 'another_consultation_slot' => '11:30 PM - 12:00 AM'],
        '11:30 PM' => ['service_slot' => '11:30 PM - 12:00 AM', 'consultation_slot' => '11:00 PM - 11:30 PM', 'another_consultation_slot' => '11:30 PM - 12:00 AM']
    ];

    public function date(){
        return $this->belongsTo(Calendar::class, 'calendar_id');
    }

    public function booking(){
        return $this->hasOne(Booking::class);
    }

    public function bookings(){
        return $this->hasMany(Booking::class)->where('is_consultation', true);
    }

    public function slot(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Carbon::parse($value)->format("H:i"),
            set: fn ($value) => Carbon::parse($value)->format("h:i A"),
        );
    }

    public function scopeSearch($query, $search){
        if(!$search) return $query;
        $time = \Carbon\Carbon::parse($search);
        if($time->diffInMinutes("12:00 AM") % 60 > 0){
            $time->addMinutes(-30);
        }
        return $query->where('slot', $time->format('H:i'));
    }
}
