<?php

namespace App\Http\Livewire\Dashboard\Calendar;

use Carbon\Carbon;
use Livewire\Component;;
use App\Traits\SlotValidation;
use App\Models\{ Calendar, Slot };
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    use SlotValidation;
    public $slotErrors = [], $date, $slots = [], $defaultSlots;

    protected function rules(){
        $rules = [
            "date" => "required|date|unique:calendars|after:".now()->format('Y-m-d'),
        ];
        if(empty($this->date)) return $rules;
        $slots = collect($this->defaultSlots)->keys()->join(",");
        $condition = !empty($slots) ? "|in:{$slots}" : "";
        return array_merge($rules, [
            "slots.*.slot" => "required".$condition
        ]);
    }

    protected $validationAttributes = [
        'date' => 'Date',
        'slots.*.slot' => 'Slot'
    ];

    public function mount(){
        $this->defaultSlots = Slot::$slots;
        $this->addSlot();
    }

    public function updated($propName){
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
            $consultant = auth('consultant')->user();
            if ($consultant) {
                $calendar = new Calendar;
                $calendar->date = $this->date;
                $calendar->consultant_id = $consultant->id;
                if($calendar->save()){
                    foreach($this->slots as $slot) $calendar->slots()->create([
                        'consultant_id' => $consultant->id,
                        'slot' => Carbon::parse($slot['slot'])->format("H:i"),
                        'service_slot_time' => $slot['service_slot_time'],
                        'consultation_slot_time' => $slot['consultation_slot_time'],
                        'another_consultation_slot_time' => $slot['another_consultation_slot_time']
                    ]);
                    DB::commit();
                    return redirect()->route('admin.calendar');
                }
                else $this->addError('date', 'Slots not Added');
            }
            else $this->addError('date', 'Only Consultant can add slot(s).');
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
            $this->addError('date', 'Slots not Added');
        }
    }

    public function render() {
        return view('livewire.dashboard.calendar.create');
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
