<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Barang;
use App\Models\User;

class AdminController extends Controller
{
    public function login()
    {
        return view('pages.admin.login', []);
    }

    public function index()
    {
        return view('pages.admin.index', []);
    }

    public function users()
    {
        $users = User::select(
            'ud.*',
            'users.*',
        )
        ->leftJoin('user_detail as ud', [
            ['ud.id_user', '=', 'users.id'],
        ])->where('users.role', '!=', 'admin')->get();
        return view('pages.admin.users', [
            'users' => $users
        ]);
    }

    public function userDetail($id)
    {
        $user = User::select(
            'ud.*',
            'users.*',
        )
        ->leftJoin('user_detail as ud', [
            ['ud.id_user', '=', 'users.id'],
        ])->where('users.id', '=', $id)->first();
        return view('pages.admin.user_detail', [
            'user' => $user
        ]);
    }
}
