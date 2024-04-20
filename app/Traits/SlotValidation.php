<?php
namespace App\Traits;

use Carbon\Carbon;

trait SlotValidation
{
    public function validateOldSlots() {
        $date = isset($this->calendar) ? $this->calendar->date : $this->date;
        foreach ($this->slots as $i => $slot) {
            foreach ($this->calendar->slots as $oldSlot) {
                $oldStart = Carbon::parse("{$date} {$oldSlot->time_start}");
                $oldEnd = Carbon::parse("{$date} {$oldSlot->time_end}");
                $newStart = Carbon::parse("{$date} {$slot['time_start']}");
                $newEnd = Carbon::parse("{$date} {$slot['time_end']}");
                if($oldStart < $newStart && $oldEnd > $newStart) $this->setError($newStart, $oldStart, $oldEnd, $i);
                if($oldStart < $newEnd && $oldEnd > $newEnd) $this->setError($newEnd, $oldStart, $oldEnd, $i);
            }
        }
        return empty($this->slotErrors);
    }

    public function validateSlots()
    {
        $date = isset($this->calendar) ? $this->calendar->date : $this->date;
        foreach ($this->slots as $i => $slot) {
            foreach ($this->slots as $j => $oldSlot) {
                if($i != $j){
                    $oldStart = Carbon::parse("{$date} {$oldSlot['time_start']}");
                    $oldEnd = Carbon::parse("{$date} {$oldSlot['time_end']}");
                    $newStart = Carbon::parse("{$date} {$slot['time_start']}");
                    $newEnd = Carbon::parse("{$date} {$slot['time_end']}");
                    if($oldStart < $newStart && $oldEnd > $newStart) $this->setError($newStart, $oldStart, $oldEnd, $i, $j);
                    if($oldStart < $newEnd && $oldEnd > $newEnd) $this->setError($newEnd, $oldStart, $oldEnd, $i, $j);
                }
            }
        }
        return empty($this->slotErrors);
    }

    public function setError($time, $startTime, $endTime, $i, $j = null){
        $i += 1;
        if(!$j) $this->slotErrors[] = "Slot {$i}: {$time->format('h:i a')} is between already existed {$startTime->format('h:i a')} - {$endTime->format('h:i a')}";
        else{
            $j += 1;
            $this->slotErrors[] = "Slot {$i}: {$time->format('h:i a')} is between Slot {$j}: {$startTime->format('h:i a')} - {$endTime->format('h:i a')}";
        }
    }

}
