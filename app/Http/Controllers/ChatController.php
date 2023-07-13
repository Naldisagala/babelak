<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Notification;
use App\Models\Chat;
use App\Models\Tawar;
use App\Models\Barang;
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

        $from_user = $user_chat->dari ?? null;
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
        })
        ->orderBy('created_at', 'asc')
        ->get();

        return [
            'users_chat' => $users_chat,
            'list_chat'  => $list_chat,
            'current'    => $current
        ];
    }

    public function send(Request $request)
    {
        $dari = $request->get('id_from');
        $ke   = $request->get('id_to');
        $send = $request->get('send');
        $id_barang = $request->get('id_barang');

        $userFrom = User::find($dari);

        Chat::create([
            'dari'      => $dari,
            'ke'        => $ke,
            'id_tawar'  => null,
            'message'   => $send,
            'is_read'   => 0,
            'id_barang' => $id_barang ?? null
        ]);

        $usernameFrom = $userFrom->username;
        $description = "Ada pemberitahuan chat masuk";
        Notification::create([
            'from'        => $dari,
            'to'          => $ke,
            'type'        => 'chat',
            'description' => $description,
            'is_read'     => 0,
            'link'        => "/chat/$usernameFrom"
        ]);

        return back()->withInput()->with('success', 'Pesan berhasil dikirim!');
    }

    public function product($username, $id_product)
    {
        $chats = $this->getChat($username);
        $barang = Barang::find($id_product);

        return view('pages.chat', [
            'users_chat' => $chats['users_chat'],
            'list_chat'  => $chats['list_chat'],
            'current'    => $chats['current'],
            'barang'     => $barang
        ]);
    }
}
