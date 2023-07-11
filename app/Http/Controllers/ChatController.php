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
        $users_chat = Chat::select(
            'from', 
            DB::raw('count(*) as total')
        )
        ->where('to', '=', $user->id)
        ->groupBy('from');

        $user_chat = $users_chat->first();
        $users_chat = $users_chat->get();
        
        $id_user = $user_chat->from;
        if(!empty($username)){
            $current = User::where('username', '=', $username)->first();
            if(empty($current))  return abort(404);
            $id_user = $current->id;
        }else{
            $current = User::where('id', '=', $id_user)->first();
        }
        $list_chat = Chat::where('from', '=', $id_user)
        ->orWhere('from', '=', $user->id)
        ->get();
        return [
            'users_chat' => $users_chat,
            'list_chat'  => $list_chat,
            'current'    => $current
        ];
    }
}
