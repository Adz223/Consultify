<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Slot;
use App\Models\Calendar;
use App\Models\Consultant;

class ConsultationController extends Controller
{
    public function services(Request $request) {
        $services = Service::get();
        return response()->json([
            'services' => $services
        ]);
    }

    public function service(Request $request, Service $service) {
        return response()->json([
            'service' => $service
        ]);
    }

    public function consultants(Request $request, Service $service) {
        $consultants = Consultant::where('service_id', $service->id)->get();
        return response()->json([
            'service' => $service,
            'consultants' => $consultants
        ]);
    }

    public function calendar(Request $request, Consultant $consultant) {
        $request->validate([
            'from' => "required|date",
            'to' => "required|date"
        ]);
        $calendar = Calendar::with('available_slots', 'slots')
            ->whereBetween('date', [$request->from, $request->to])
            ->where('consultant_id', $consultant->id)->orderBy('date')
            ->get()->map(fn($item) => [
                'id' => $item->id,
                'date' => $item->date,
                'slots' => $item->slots,
                'available_slots' => $item->available_slots
            ]);
        $wholeCalendar = Calendar::with('slots')
            ->whereBetween('date', [$request->from, $request->to])
            ->where('consultant_id', $consultant->id)->orderBy('date')
            ->get()->map(fn($item) => $item->slots);
        return response()->json([
            'consultant' => $consultant,
            'calendar' => $calendar,
            'wholeCalendar' => $wholeCalendar
        ]);
    }
}
