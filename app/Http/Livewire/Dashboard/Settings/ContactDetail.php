<?php

namespace App\Http\Livewire\Dashboard\Settings;

use App\Models\Setting;
use App\Traits\ZoomMeet;
use Livewire\Component;

class ContactDetail extends Component
{
    use ZoomMeet;
    public $message, $setting, $zoom_meeting_link, $email, $contact, $address, $city, $state, $country, $about_us;

    protected $rules = [
        'email' => 'required|max:100',
        'contact' => 'required|max:100',
        'address' => 'required|max:255',
        'city' => 'required|max:100',
        'state' => 'required|max:100',
        'country' => 'required|max:100',
        'zoom_meeting_link' => 'required|url|max:500',
    ];

    public function mount()
    {
        $this->setting = $this->getSetting();
        $this->email = $this->setting->email;
        $this->email = $this->setting->mail_email;
        $this->contact = $this->setting->contact;
        $this->address = $this->setting->address;
        $this->city = $this->setting->city;
        $this->state = $this->setting->state;
        $this->country = $this->setting->country;
        $this->about_us = $this->setting->about_us;
        $this->zoom_meeting_link = $this->setting->zoom_meeting_link;
        $this->getUserInfo();
    }

    public function updateContactDetails()
    {
        $this->validate();
        if (!is_object($this->setting)) {
            $this->setting = $this->getSetting();
        }

        $this->setting->email = $this->email;
        $this->setting->mail_email = $this->email;
        $this->setting->contact = $this->contact;
        $this->setting->address = $this->address;
        $this->setting->city = $this->city;
        $this->setting->state = $this->state;
        $this->setting->country = $this->country;
        $this->setting->about_us = 'abc';
        $this->setting->zoom_meeting_link = $this->zoom_meeting_link;
        $this->setting->save();
        $this->message = "Contact Details has been updated";
    }

    public function render()
    {
        $msg = $this->message;
        $this->message = "";
        return view('livewire.dashboard.settings.contact-detail', compact('msg'));
    }

    public function getSetting()
    {
        $setting = Setting::first();
        if (!is_object($setting)) {
            return new Setting;
        }

        return $setting;
    }
}
