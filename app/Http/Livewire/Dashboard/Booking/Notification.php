<?php

namespace App\Http\Livewire\Dashboard\Booking;

use App\Models\Booking;
use Livewire\Component;

class Notification extends Component
{
    public $notifications = [], $skip, $length = 6, $isShowMore = true;

    protected $listeners = [ 'checkNotification', 'showNotifications' ];

    public function mount(){
        $this->showNotifications();
    }

    public function checkNotification(){
        if(Booking::where('is_seen', false)->exists()) $this->dispatchBrowserEvent('new-booking-notification');
    }

    public function showNotifications(){
        $this->skip = 0;
        $this->isShowMore = true;
        $this->notifications = [];
        $this->showMore();
    }

    public function render() {
        return view('livewire.dashboard.booking.notification');
    }

    public function showMore(){
        $notifications = Booking::latest();
        if($this->skip) $notifications->skip($this->skip);
        $count = count($this->notifications);
        $notifications = $notifications->take($this->length)->get();
        $this->notifications = array_merge($this->notifications, $notifications->toArray());
        if(count($this->notifications) == $count) $this->isShowMore = false;
        else $this->skip += $this->length;
        Booking::where('is_seen', false)->update(['is_seen' => true]);
        $this->dispatchBrowserEvent('booking-notification-seen');
    }
}
