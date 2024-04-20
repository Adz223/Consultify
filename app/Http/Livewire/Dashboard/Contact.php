<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact as ContactModel;

class Contact extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search, $pageLimit = 10;
    public $contactId, $message;

    public function render(){
        return view('livewire.dashboard.contact', ['contacts' => $this->getData()]);
    }

    public function sendReply($contactId, $reply){
        $this->contactId = $contactId;
        $this->message = $reply;
        $this->validate([
            'contactId' => 'required|exists:contacts,id',
            'message' => 'required|max:1000'
        ], [
            'contactId.exists' => 'Invalid contact request'
        ]);
        $app_name = env('APP_NAME');
        $contact = ContactModel::find($this->contactId);
        $reply = $this->message;
        $contact->replies()->create([ 'reply' => $this->message ]);
        Mail::send('mail.reply', compact('contact', 'reply'), function ($message) use($app_name, $contact) {
            $message->to($contact->email, $contact->firstname." ".$contact->lastname);
            $message->subject('Reply From '.$app_name);
        });
        $this->dispatchBrowserEvent('closeReplyModal');
    }

    public function getData(){
        return ContactModel::search($this->search)->with('lastReply')
            ->orderBy('id', 'desc')
            ->paginate($this->pageLimit);
    }

    public function deleteContact($contactId){
        ContactModel::where('id', $contactId)->delete();
    }
}
