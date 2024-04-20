<?php

namespace App\Models;

use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['is_seen'];
    protected $appends = ['meeting_time', 'notification_time'];

    public function slotDetail()
    {
        return $this->belongsTo(Slot::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function reschedule()
    {
        return $this->hasOne(BookingReschedule::class);
    }

    public function price(): Attribute
    {
        return new Attribute(
            get:fn($price) => round($price / 100, 2),
            set:fn($price) => round($price * 100),
        );
    }

    public function meetingTime(): Attribute
    {
        return new Attribute(
            get:fn() => $this->getMeetingTime($this->slot)
        );
    }

    public function notificationTime(): Attribute
    {
        return new Attribute(
            get:function () {
                $diff = now()->diffInDays($this->created_at);
                // dd($diff);
                if ($diff > 1) {
                    return $this->created_at->format("h:i a d M, Y");
                }

                // dd($this->created_at->format("h:i A ").($diff ? 'Yesterday' : 'Today'));
                return $this->created_at->format("h:i A ") . ($diff ? 'Yesterday' : 'Today');
            }
        );
    }

    public function getMeetingTime($slot)
    {
        $time = Carbon::parse($slot);
        // if ($this->is_consultation) {
        //     return $time->format("H:i") . " - " . $time->addMinutes(30)->format("H:i");
        // }

        return $time->format("H:i") . " - " . $time->addMinutes(30)->format("H:i");
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('firstname', 'LIKE', "%{$search}%")
            ->orWhere('lastname', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->orWhere('contact', 'LIKE', "%{$search}%")
            ->orWhere('price', 'LIKE', "%{$search}%");
    }

    public function scopeConsultationAvailable($query)
    {
        return $query->where(function ($query) {
            return $query->where('is_consultation', false);
        })->orWhere();
    }
}
