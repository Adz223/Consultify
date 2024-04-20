<?php

namespace App\Http\Livewire\Dashboard\Calendar;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Livewire\Component;;
use App\Traits\SlotValidation;
use App\Models\{ Calendar, Slot };
use Illuminate\Support\Facades\DB;

class BulkCreate extends Component
{
    use SlotValidation;
    public $slotErrors = [], $start_date, $end_date, $slots = [], $defaultSlots, $days = [];

    protected function rules(){
        $rules = [
            "start_date" => "required|date|after:".now()->format('Y-m-d'),
        ];
        if(empty($this->start_date)) return $rules;
        $slots = collect($this->defaultSlots)->keys()->join(",");
        $condition = !empty($slots) ? "|in:{$slots}" : "";
        return array_merge($rules, [
            "end_date" => "required|date|after:".$this->start_date,
            "slots.*.slot" => "required".$condition
        ]);
    }

    protected $validationAttributes = [
        'date' => 'Date',
        'slots.*.slot' => 'Slot'
    ];

    public function mount(){
        $this->days = [
            'Monday' => true,
            'Tuesday' => true,
            'Wednesday' => true,
            'Thursday' => true,
            'Friday' => true,
            'Saturday' => false,
            'Sunday' => false
        ];
        $this->defaultSlots = Slot::$slots;
        $date = now();
        $this->start_date = $date->addDay()->format("Y-m-d");
        $this->end_date = $date->addYears(5)->format("Y-12-31");
        $this->addShiftSlot();
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
        // dd($this);
        $this->validate();
        $check = false;
        foreach ($this->days as $i => $value) {
            if($value) $check = true;
        }
        if(!$check) return $this->addError("days", "Please select days");
        try {
            $consultant = auth('consultant')->user();
            if ($consultant) {
                DB::beginTransaction();
                $period = CarbonPeriod::create($this->start_date, $this->end_date);
                foreach ($period as $date) {
                    $day = $date->format("l");
                    if(!isset($this->days[$day]) || !$this->days[$day]) continue;
                    $calendar = Calendar::where('consultant_id', $consultant->id)->where('date', $date->format("Y-m-d"))->first();
                    if (!$calendar) {
                        $calendar = new Calendar;
                        $calendar->date = $date->format("Y-m-d");
                        $calendar->consultant_id = $consultant->id;
                        $calendar->save();
                    }
                    foreach($this->slots as $slot){
                        $calendar->slots()->firstOrCreate([
                            'consultant_id' => $consultant->id,
                            'slot' => Carbon::parse($slot['slot'])->format("H:i"),
                            'service_slot_time' => $slot['service_slot_time'],
                            'consultation_slot_time' => $slot['consultation_slot_time'],
                            'another_consultation_slot_time' => $slot['another_consultation_slot_time']
                        ]);
                    }
                }
                DB::commit();
            }
            else $this->addError('days', 'Only Consultant can add slot(s).');
            return redirect()->route('admin.calendar');
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
            $this->addError('days', 'Slots not Added');
        }
    }

    public function render() {
        return view('livewire.dashboard.calendar.bulk-create');
    }

    public function addSlot(){
        $this->slots[] = [
            'slot' => '',
            'service_slot_time' => '',
            'consultation_slot_time' => '',
            'another_consultation_slot_time' => ''
        ];
    }

    public function addShiftSlot(){
        foreach ($this->defaultSlots as $slot => $slotDetail) {
            $slotHour = Carbon::parse($slot)->format("H");
            if($slotHour >= 8 && $slotHour < 18) $this->slots[] = [
                'slot' => $slot,
                'service_slot_time' => $slotDetail['service_slot'],
                'consultation_slot_time' => $slotDetail['consultation_slot'],
                'another_consultation_slot_time' => $slotDetail['another_consultation_slot']
            ];
        }
    }

    public function removeSlot($i){
        if(isset($this->slots[$i])){
            unset($this->slots[$i]);
            $this->slots = array_values($this->slots);
        }
    }
}
