<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Booking as BookingModel;
use App\Models\Setting;
use App\Traits\ZoomMeet;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class BookingNew extends Component
{
    use ZoomMeet, WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search, $singleBooking, $pageLimit = 10;
    public $bookingId, $rescheduleModal, $message, $errorMessage, $zoomTopic = "", $zoomMeetingLink = "";

    protected $listeners = ['displayMessage'];

    public function mount($booking = null)
    {
        $this->singleBooking = $booking;
        $this->rescheduleModal = false;

        $clientId = env('ZOOM_CLIENT_ID');
        $zoomKey = env('ZOOM_KEY');
        $this->redirect_uri = route('zoom.redirect');
        $this->zoomLink = "https://zoom.us/oauth/authorize?response_type=code&client_id={$clientId}&redirect_uri={$this->redirect_uri}";
        $this->headers = [
            'Authorization' => "Basic {$zoomKey}",
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];
    }

    public function render()
    {
        $msg = $this->message;
        $errorMsg = $this->errorMessage;
        // $this->message = "";
        // $this->errorMessage = "";
        return view('livewire.dashboard.booking-new', compact('msg', 'errorMsg'))->with(['bookings' => $this->getData()]);
    }

    public function displayMessage($message, $bool = true)
    {
        $this->rescheduleModal = false;
        if ($bool) {
            $this->message = $message;
        } else {
            $this->errorMessage = $message;
        }

    }

    public function sendMeetingLink($bookingId)
    {
        try {
            $booking = BookingModel::find($bookingId);
            if (!$booking) {
                return $this->errorMessage = "Booking not found.";
            }

            $title = ((!$booking?->is_consultation) ? "Service" : "Service") . " Meeting with " . $booking->name;
            $email = $booking->email;
            $meetingTime = $booking?->is_consultation ? 30 : 30;
            $setting = Setting::first();
            $zoomMeeting = $this->meeting($title, $email, $setting->email, $meetingTime);
            if (!$zoomMeeting['status']) {
                return $this->errorMessage = $zoomMeeting['error'];
            }
            $this->zoomMeetingLink = $zoomMeeting['data']['start_url'];
            $join_url = $zoomMeeting['data']['join_url'];
            $subject = $zoomMeeting['data']['topic'];
            $this->zoomTopic = $subject;
            Mail::send('mail.meeting-link', [
                'booking' => $booking,
                'zoom_meeting_link' => $join_url,
                'date' => ['date' => $booking->date],
            ], function ($message) use ($booking, $subject) {
                $message->to($booking->email, $booking->name);
                $message->subject($subject);
            });
        } catch (Throwable $th) {
            $this->errorMessage = $th->getMessage();
        }
    }

    public function getData()
    {
        $consultant = auth('consultant')->user();
        $bookings = BookingModel::where('consultant_id', $consultant->id)->search($this->search)->doesnthave('reschedule');
        if ($this->singleBooking) {
            $bookings->where('id', $this->singleBooking);
        }

        return $bookings->latest()->paginate($this->pageLimit);
    }

    // public function acceptBooking($bookingId){
    //     BookingModel::where('id', $bookingId)->update(['booking_status_id' => 2]);
    // }

    // public function rejectBooking($bookingId){
    //     BookingModel::where('id', $bookingId)->update(['booking_status_id' => 3]);
    // }
}
