<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserDetail;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::select(
            'ud.*', 
            'users.name', 
            'users.email', 
            'users.role', 
            'users.hp', 
            'users.username'
        )->leftJoin('user_detail as ud', [
            ['ud.id_user', '=', 'users.id'],
        ])
        ->where('users.id', '=',auth()->user()->id)
        ->first();

        return view('pages.profile', [
            'user' => $user
        ]);
    }

    public function change(Request $request)
    {
        $id      = auth()->user()->id;
        $photo   = $request->photo;
        $o_photo = $request->get('old_photo');

        $valid   = [
            'name'      => 'required',
            'username'  => 'required',
            'email'     => 'required|email:dns',
            'hp'        => 'required',
            'nik'       => 'required',
            'institute' => 'required',
            'address'   => 'required'
        ];

        if(!empty($photo)){
            $valid['photo'] = 'required|mimes:png,jpg,jpeg|max:2048';
        }

        $data = $request->validate($valid);

        try{
            $file = null;
            if(!empty($photo)){
                $file = 'file-' . date('Ymdms').'.'.$request->photo->extension();
                $request->photo->move(public_path('files/profile'), $file);
            }

            $data['id_user'] = $id;
            $data['photo']   = $file;

            $dataUser   = array_slice($data, 0, 4);
            $dataDetail = array_slice($data, 4, 5);

            User::where('id', '=', $id)->update($dataUser);
            $detail = UserDetail::where('id_user', '=', $id);
            if (!empty($detail->first())) {
                $detail->update($dataDetail);
            } else {
                UserDetail:: create($dataDetail);
            }

            return redirect()->back()->with('success','Update profile Successfully!!');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Update Profile Failed! '.$e->getMessage());
        }
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
