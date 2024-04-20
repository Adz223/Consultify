<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\{
    Booking, Contact, Service, User
};
use Livewire\Component;

class Statistic extends Component
{
    public $users, $bookings, $bookingsTotalAmount, $contactRequests, $services;

    public function render() {
        return view('livewire.dashboard.statistic');
    }

    public function mount(){
        $this->users = User::count();
        $this->bookings = Booking::count();
        $this->contactRequests = Contact::count();
        $this->services = Service::count();
        $this->bookingsTotalAmount = Booking::where('booking_status_id', 2)->sum('price');
    }
}
