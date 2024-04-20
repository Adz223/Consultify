<?php

namespace App\Http\Livewire\Dashboard\Booking;

use Livewire\Component;
use App\Models\CardDetails;

class CreditCardDetail extends Component
{
    public $card_number, $expiry_month, $expiry_year, $cvc;

    protected $listeners = ['cardDetails'];

    public function cardDetails($booking_id){
        $card = CardDetails::where('booking_id', $booking_id)->first();
        $this->card_number = $card->card_number;
        $this->expiry_month = $card->expiry_month;
        $this->expiry_year = $card->expiry_year;
        $this->cvc = $card->cvc;
    }

    public function render() {
        return view('livewire.dashboard.booking.credit-card-detail');
    }
}
