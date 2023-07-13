<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Chat;
use App\Models\Tawar;
use App\Models\User;

class ChatController extends Controller
{
    public function index()
    {
        $chats = $this->getChat();

        return view('pages.chat', [
            'users_chat' => $chats['users_chat'],
            'list_chat'  => $chats['list_chat'],
            'current'    => $chats['current'],
            'user'       => auth()->user()
        ]);
    }

    public function personal($username)
    {
        $chats = $this->getChat($username);

        return view('pages.chat', [
            'users_chat' => $chats['users_chat'],
            'list_chat'  => $chats['list_chat'],
            'current'    => $chats['current']
        ]);
    }

    public function getChat($username = null)
    {
        $user = auth()->user();
        $users_chat = Chat::where('ke', '=', $user->id)
            ->orderBy('created_at', 'desc');

        $users_chat = $users_chat->get()->unique('dari');
        $user_chat  = $users_chat->first();

        $from_user = $user_chat->from ?? null;
        $to_user = $user->id;
        if(!empty($username)){
            $current = User::where('username', '=', $username)->first();
            if(empty($current))  return abort(404);
            $from_user = $current->id;
        }else{
            $current = User::where('id', '=', $from_user)->first();
        }

        $list_chat = Chat::where(function($query) use ($from_user, $to_user){
            $query->where('dari', '=', $from_user);
            $query->where('ke', '=', $to_user);
        })->orWhere(function($query) use ($from_user, $to_user){
            $query->where('dari', '=', $to_user);
            $query->where('ke', '=', $from_user);
        })->get();

        return [
            'users_chat' => $users_chat,
            'list_chat'  => $list_chat,
            'current'    => $current
        ];
    }
}
