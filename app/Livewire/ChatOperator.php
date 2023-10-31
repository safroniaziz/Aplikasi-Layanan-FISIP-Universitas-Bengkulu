<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ChatOperator extends Component
{
    public $id;
    public $user;
    public $listPesan;
    public $listNew;
    public $pesan;
    public $pesanKonseling;
    public $chat = [];
    public $jam;
    public $scroll = 0;

    public function kirimPesan($id = 0)
    {
        $pesan = $this->pesan;
        Message::create([
            'user_id' => $id,
            'operator_user_id' => Auth::user()->id,
            // 'message_tema_id' => 1,
            'message' => $pesan,
            'repley' => 1,
            'read' => 1,
        ]);

        Message::where('user_id', $id)->update(['read' => 1]);
        $this->pesan = '';

        $this->dispatch('scrollToBottom');
    }

    public function listchat(){
        $list =  Message::select(['users.id', 'users.name','users.email', DB::raw('(Select count(*) from messages as a WHERE a.user_id=messages.user_id and a.read=0 ) as pesan_masuk') ])->join('users', 'messages.user_id', '=', 'users.id')->where('read', 1)->where('read', '!=', 0)->groupby('user_id')->get();


        $listNew =  Message::select(['users.id', 'users.name', 'users.email', DB::raw('COUNT(user_id) as pesan_masuk')])->join('users', 'messages.user_id', '=', 'users.id')->where('read', 0)->groupby('user_id')->get();


        $this->listNew = $listNew;
        $this->listPesan = $list;
    }

    public function fetchpesan($id = 0)
    {
        $previousChat = $this->chat;
        $previousChatCount = count($previousChat);
        $pesanKonseling = Message::select(['messages.*', 'users.name', 'a.name as operator_name', 'a.email'])->leftJoin('users', 'messages.user_id', '=', 'users.id')->leftJoin('users as a', 'messages.operator_user_id', '=', 'a.id')->where('user_id', $id)->orderby('created_at', 'ASC')->get();

        $user = User::where('id',$id)->first();
        $this->user= $user;
        $this->id = $id;
        $this->pesanKonseling = $pesanKonseling;
        $currentChat = $this->chat;
        $currentChatCount = count($currentChat);
        // dd($previousChatCount   != $currentChatCount);
        if ($previousChatCount   != $currentChatCount) {
            $this->dispatch('scrollToBottom');
            $this->scroll = 1;
        } else {
            $this->scroll = 0;
        }
    }


    public function render()
    {

        $this->listchat();
        return view('livewire.chat-operator')->layout('Layouts.chat');
    }
}
