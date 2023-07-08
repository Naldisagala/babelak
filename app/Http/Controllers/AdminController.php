<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        return view('pages.admin.users', []);
    }

    public function userDetail($id)
    {
        return view('pages.admin.user_detail', []);
    }
}
