<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {

        return view('pages.profile', []);
    }
    
    public function changeBiodata(Request $request)
    {
        $id = auth()->user()->id;
        $data = $request->validate([
            'name'             => 'required|max:100',
            'nip'              => ['required', 'min:3', 'max:30'],
            'email'            => 'required|email:dns',
            'sector'           => 'required',
        ]);

        $user = User::find($id);
        $user->name   = $data['name'];
        $user->nip    = $data['nip'];
        $user->email  = $data['email'];
        $user->sector = $data['sector'];
        $user->update();

        return redirect('/profile')->with('sukses', 'Change Biodata successfull!');
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
