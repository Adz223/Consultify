<?php

namespace App\Http\Livewire\Dashboard\Calendar;

use Livewire\Component;
use App\Models\Calendar;
use Livewire\WithPagination;
use App\Models\Slot as SlotModel;

class Slot extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $message, $calendar, $search, $pageLimit = 10;

    public function mount(Calendar $calendar){
        $this->calendar = $calendar;
    }

    public function render(){
        $msg = $this->message;
        $this->message = "";
        return view('livewire.dashboard.calendar.slot', ['msg' => $msg, 'slots' => $this->getData()]);
    }

    public function getData(){
        return SlotModel::search($this->search)
            ->where('calendar_id', $this->calendar->id)
            ->orderBy('slot')
            ->paginate($this->pageLimit);
    }

    public function deleteSlot($calendarId){
        $slot = SlotModel::doesntHave('booking')->find($calendarId);
        if($slot) SlotModel::where('id', $calendarId)->delete();
        else $this->message = "Slot cannot be deleted. Slot has been booked.";
    }
}
