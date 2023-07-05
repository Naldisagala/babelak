<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.profile', []);
    }
    
    public function changePassword(Request $request)
    {
        $id = auth()->user()->id;
        $data = $request->validate([
            'password'         => 'required|min:5|max:100',
            'confirm_password' => 'required_with:password|same:password'
        ]);

        $password = Hash::make($data['password']);

        $user = User::find($id);
        $user->password   = $password;
        $user->update();

        return redirect('/profile')->with('sukses', 'Change Biodata successfull!');
    }
}
