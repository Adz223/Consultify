<?php

namespace App\Http\Livewire\Dashboard\Contact;

use App\Models\Contact;
use Livewire\Component;
use App\Models\ContactReply;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Mail;

class Show extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search, $pageLimit = 10;
    public $contact, $message;

    public function mount(Contact $contact){
        $this->contact = $contact;
    }

    public function render(){
        return view('livewire.dashboard.contact.show', ['replies' => $this->getData()]);
    }

    public function sendReply($reply){
        $this->message = $reply;
        $this->validate([
            'message' => 'required|max:1000'
        ]);
        $app_name = env('APP_NAME');
        $contact = $this->contact;
        $reply = $this->message;
        $contact->replies()->create([ 'reply' => $this->message ]);
        Mail::send('mail.reply', compact('contact', 'reply'), function ($message) use($app_name, $contact) {
            $message->to($contact->email, $contact->name);
            $message->subject('Reply From '.$app_name);
        });
        $this->dispatchBrowserEvent('closeReplyModal');
    }

    public function getData(){
        return ContactReply::search($this->search)
            ->paginate($this->pageLimit);
    }
}
