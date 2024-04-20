<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Calendar as CalendarModel;
use Livewire\Component;
use Livewire\WithPagination;

class Calendar extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search, $pageLimit = 10;

    public function render()
    {
        return view('livewire.dashboard.calendar', ['calendars' => $this->getData()]);
    }

    public function getData()
    {
        $consultant = auth('consultant')->user();
        return CalendarModel::search($this->search)
            ->with('lastSlot')
            ->withCount('slots')
            ->where('consultant_id', $consultant->id)
            ->orderBy('id', 'desc')
            ->paginate($this->pageLimit);
    }

    public function deleteCalendar($calendarId)
    {
        CalendarModel::where('id', $calendarId)->delete();
    }
}
