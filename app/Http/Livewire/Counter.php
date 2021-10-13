<?php

namespace App\Http\Livewire;

use App\Models\Message;

use Livewire\Component;

class Counter extends Component
{
  
    public $messageText;

    public function render()
    {
        $messages = Message::with('user')->latest()->take(10)->get()->sortBy('id');

        return view('livewire.Counter', compact('messages'));
    }

    public function sendMessage()
    {
        Message::create([
            'user_id' => auth()->user()->id,
            'message_text' => $this->messageText,
        ]);

        $this->reset('messageText');
    }
}
