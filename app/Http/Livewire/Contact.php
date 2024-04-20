<?php

namespace App\Http\Livewire;

use App\Models\Contact as ContactModel;
use App\Models\Setting;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Contact extends Component
{
    public $settings, $firstname, $lastname, $email, $country, $contact, $subject, $message, $successMsg, $allowMap;

    protected $rules = [
        'firstname' => 'required',
        'lastname' => 'required',
        'country' => 'required',
        'email' => 'required|email',
        'contact' => 'required',
        'subject' => 'required|max:255',
        'message' => 'required|max:1000',
    ];

    public function mount()
    {
        $this->settings = Setting::first();
        $this->allowMap = request()->route()->getName() == "contact";
    }

    public function sendContactDetails()
    {
        $this->successMsg = "";
        $this->validate();
        $contact = new ContactModel;
        $contact->firstname = $this->firstname;
        $contact->lastname = $this->lastname;
        $contact->country = $this->country;
        $contact->email = $this->email;
        $contact->contact = $this->contact;
        $contact->subject = $this->subject;
        $contact->message = $this->message;
        $subject = $this->subject;
        if ($contact->save()) {
            $email = $this->settings->mail_email;
            Mail::send('mail.contact', compact('contact'), function ($message) use ($subject, $email) {
                $message->to($email);
                $message->subject("Contact Details - {$subject}");
            });
            $this->successMsg = "Contact Details has been received.";
            $this->firstname = "";
            $this->lastname = "";
            $this->country = "";
            $this->contact = "";
            $this->subject = "";
            $this->email = "";
            $this->message = "";
        } else {
            $this->addError('name', 'Contact Details not send. Error Accured');
        }

    }

    public function render()
    {
        $msg = "";
        if($this->successMsg) {
            $msg = $this->successMsg;
            $this->successMsg = "";
            $this->emit("reInitFields");
        }
        return view('livewire.contact', compact('msg'))->layout('layouts.web')->layoutData([
            'imageUrl' => "web2assets/images/Contact.png",
            'heading' => "Contact Us",
        ]);
    }
}
