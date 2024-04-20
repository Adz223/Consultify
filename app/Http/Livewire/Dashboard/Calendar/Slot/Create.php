<?php

namespace App\Http\Livewire\Dashboard\Calendar\Slot;

use Livewire\Component;
use App\Traits\SlotValidation;
use App\Models\{ Calendar, Slot };
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    use SlotValidation;
    public $slotErrors = [], $calendar, $slots = [], $defaultSlots;

    protected function rules(){
        // dd(collect($this->defaultSlots), $this->calendar->slots->pluck('id'), collect($this->defaultSlots)->whereNotIn($this->calendar->slots->pluck('id')));
        $slots = collect($this->defaultSlots)->whereNotIn('service_slot', $this->calendar->slots->pluck('service_slot'))->keys()->join(",");
        $condition = !empty($slots) ? "|in:{$slots}" : "";
        return [
            "slots.*.slot" => "required|unique:slots,slot,null,id,calendar_id,{$this->calendar->id}".$condition
        ];
    }

    protected $validationAttributes = [
        'date' => 'Date',
        'slots.*.slot' => 'Slot'
    ];

    public function mount(Calendar $calendar){
        $this->calendar = $calendar->load('slots');
        $this->defaultSlots = Slot::$slots;
        $this->addSlot();
    }

    public function updated($propName){
        $this->slotErrors = [];
        $prop = explode('.', $propName);
        if($prop[0] == "slots") {
            $this->resetErrorBag($propName);
            $i = $prop[1];
            $slot = $this->slots[$i]['slot'];
            $slots = collect($this->slots);
            if($slots->where('slot', $slot)->count() > 1){
                $this->slots[$i] = [
                    'slot' => '',
                    'service_slot_time' => '',
                    'consultation_slot_time' => '',
                    'another_consultation_slot_time' => ''
                ];
                $this->addError($propName, 'Slot already selected');
            }
            else{
                $this->slots[$i]['service_slot_time'] = $this->defaultSlots[$slot]['service_slot'];
                $this->slots[$i]['consultation_slot_time'] = $this->defaultSlots[$slot]['consultation_slot'];
                $this->slots[$i]['another_consultation_slot_time'] = $this->defaultSlots[$slot]['another_consultation_slot'];
            }
        }
    }

    public function addDate(){
        $this->slotErrors = [];
        $this->validate();
        try {
            DB::beginTransaction();
            foreach($this->slots as $slot) $this->calendar->slots()->create([
                'slot' => Carbon::parse($slot['slot'])->format("H:i"),
                'service_slot_time' => $slot['service_slot_time'],
                'consultation_slot_time' => $slot['consultation_slot_time'],
                'another_consultation_slot_time' => $slot['another_consultation_slot_time']
            ]);
            DB::commit();
            return redirect()->route('admin.slot', ['calendar' => $this->calendar->id]);
        } catch (\Throwable $th) {
            DB::rollback();
            // $this->addError('date', $th->getMessage());
            $this->addError('date', 'Slots not Added');
        }
    }

    public function render() {
        return view('livewire.dashboard.calendar.slot.create');
    }

    public function addSlot(){
        $this->slots[] = [
            'slot' => '',
            'service_slot_time' => '',
            'consultation_slot_time' => '',
            'another_consultation_slot_time' => ''
        ];
    }

    public function removeSlot($i){
        if(isset($this->slots[$i])){
            unset($this->slots[$i]);
            $this->slots = array_values($this->slots);
        }
    }
}
