<?php

namespace App\Livewire;

use App\Models\Message;
use Livewire\Component;
use App\Models\JadwalSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class ChatUser extends Component
{
    public $chat = [];
    public $pesan;
    public $jam;
    public $scroll=0;


    public function kirimPesan()
    {
        $pesan = $this->pesan;
        Message::create([
            'user_id' => Auth::user()->id,
            'operator_user_id' => NULL,
            'message_tema_id' => 1,
            'message' => $pesan,
            'repley' => 0,
        ]);
        $this->pesan = '';

        $this->dispatch('scrollToBottom');
    }
    public function pesanView()
    {
        if (isset(Auth::user()->id)) {
            $previousChat = $this->chat ;
            $previousChatCount = count($previousChat);



            $chat =  Message::select(['messages.*','users.name', 'users.email'])->leftJoin('users', 'messages.operator_user_id', '=', 'users.id')->where('user_id', Auth::user()->id)->orderby('created_at', 'ASC')->get();
            $this->chat = $chat;

            $currentChat = $this->chat;
            $currentChatCount = count($currentChat);
            // dd($previousChatCount   != $currentChatCount);
            if ($previousChatCount   != $currentChatCount) {
                $this->dispatch('scrollToBottom');
                $this->scroll = 1;
            }else {
                $this->scroll = 0;

            }
        }

    }

    public function mount(){

    }

    public function render()
    {
        $this->jam = Date::now()->format('H:i:s');

        $this->pesanView();
        return view('livewire.chat-user');
    }
}
