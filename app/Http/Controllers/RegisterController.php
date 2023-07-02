<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use DB;
use Auth;

class RegisterController extends Controller
{
    public function RegisterUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'hp' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'password_confirm' => ['required', 'string', 'min:8', 'same:password'],
            ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();;
        }

        try {
            DB::beginTransaction();

            User::create([
                'name' => $request->name,
                'username' => $request->username,
                'hp' => $request->hp,
                'role' => 'user',
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);


            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                DB::commit();
                return redirect()->intended('/');
            }

        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
