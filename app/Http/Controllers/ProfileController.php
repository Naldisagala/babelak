<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\Alamat;
use App\Models\Seller;

class ProfileController extends Controller
{
    public function index()
    {
        $provinces = Province::all();
        $user = User::select(
            'ud.*', 
            'a.*', 
            'users.name', 
            'users.email', 
            'users.role', 
            'users.hp', 
            'users.username',
            'users.is_seller',
            'v.name as name_village',
            'd.name as name_district',
            'd.id as id_district',
            'r.name as name_regencie',
            'r.id as id_regencie',
            'p.name as name_province',
            'p.id as id_province',
            's.nama_toko',
            's.saldo',
            's.rekening',
            's.type as type_rekening',
        )->leftJoin('user_detail as ud', [
            ['ud.id_user', '=', 'users.id'],
        ])->leftJoin('alamats as a', [
            ['a.id_user', '=', 'users.id'],
        ])->leftJoin('villages as v', [
            ['v.id', '=', 'ud.id_village'],
        ])->leftJoin('districts as d', [
            ['d.id', '=', 'v.district_id'],
        ])->leftJoin('regencies as r', [
            ['r.id', '=', 'd.regency_id'],
        ])->leftJoin('provinces as p', [
            ['p.id', '=', 'r.province_id'],
        ])->leftJoin('sellers as s', [
            ['s.id_user', '=', 'users.id'],
        ])->where('users.id', '=',auth()->user()->id)
        ->first();

        $address   = null;
        $regencies = [];
        $districts = [];
        $villages  = [];
        if(!empty($user->id_village)){
            $regencies = Regency::where('province_id', '=', $user->id_province)->get();
            $districts = District::where('regency_id', '=', $user->id_regencie)->get();
            $villages  = Village::where('district_id', '=', $user->id_district)->get();
        }

        return view('pages.profile', [
            'user'      => $user,
            'provinces' => $provinces,
            'address'   => $address,
            'regencies' => $regencies,
            'districts' => $districts,
            'villages'  => $villages,
        ]);
    }

    public function changeProfile(Request $request)
    {
        $user        = auth()->user();
        $id          = $user->id;
        $photo       = $request->photo;
        $o_photo     = $request->get('old_photo');
        $is_seller   = $user->is_seller;
        $role_seller = ($user->role == 'seller' ? true : false);

        $valid   = [
            'name'          => 'required',
            'username'      => 'required',
            'email'         => 'required|email:dns',
            'hp'            => 'required',
            'nik'           => 'required',
            'address'       => 'required',
            'id_village'    => 'required',
            'province'      => 'required',
            'regency'       => 'required',
            'district'      => 'required',
            'postcode'      => 'required',
        ];


        if($role_seller){
            $valid['nama_toko']     = 'required';
            $valid['saldo']         = 'required';
            $valid['rekening']      = 'required';
            $valid['type_rekening'] = 'required';
        }

        if(!empty($photo)){
            $valid['photo'] = 'required|mimes:png,jpg,jpeg|max:2048';
        }

        
        try{
            $data = $request->validate($valid);
            $file = null;
            if(!empty($photo)){
                $file = 'file-' . date('Ymdms').'.'.$request->photo->extension();
                $request->photo->move(public_path('files/profile'), $file);
            }

            
            $dataUser   = array_slice($data, 0, 4);
            $dataDetail = array_slice($data, 4, 3);
            $dataDetail['id_user'] = $id;
            $dataDetail['photo']   = $file ?? $o_photo;
            $dataDetail['institute'] = $request->get('institute');

            User::where('id', '=', $id)->update($dataUser);
            $province = Province::where('id', '=', $data['province'])->first();
            $regency = Regency::where('id', '=', $data['regency'])->first();
            $district = District::where('id', '=', $data['district'])->first();
            $village  = Village::where('id', '=', $data['id_village'])->first();

            $detail = UserDetail::where('id_user', '=', $id);
            if (!empty($detail->first())) {
                $detail->update($dataDetail);
            } else {
                UserDetail:: create($dataDetail);
            }

            $dataAddress = [
                'id_user'  => $id,
                'provinsi' => ucwords(strtolower($province->name)),
                'kota'     => ucwords(strtolower($regency->name)),
                'kec'      => ucwords(strtolower($district->name)),
                'alamat'   => ucwords(strtolower($village->name)),
                'kode_pos' => $data['postcode'],
                'jenis'    => 'Home',
                'lat'      => '',
                'long'     => ''
            ];

            $address = Alamat::where('id_user','=',$id);
            if (!empty($address->first())) {
                $address->update($dataAddress);
            }else{
                Alamat::create($dataAddress);
            }

            if($is_seller == 1){
                $dataSeller = [
                    'id_user'   => $id,
                    'nama_toko' => $data['nama_toko'],
                    'saldo'     => $data['saldo'],
                    'rekening'  => $data['rekening'],
                    'type'      => $data['type_rekening'],
                ];
                $seller = Seller::where('id_user','=',$id);
                if (!empty($seller->first())) {
                    $seller->update($dataSeller);
                }else{
                    Seller::create($dataSeller);
                }
            }

            return redirect()->back()->with('success','Update Profile Successfully!!');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Update Profile Failed! '.$e->getMessage());
        }
    }
    
    public function changePassword(Request $request)
    {
        $id = auth()->user()->id;
        $validInput = [
            'password'         => 'required|min:5|max:100',
            'confirm_password' => 'required_with:password|same:password'
        ];

        $validator = \Validator::make($request->all(), $validInput);
        if ($validator->fails())
        {
            return redirect('/profile')->with('error', $validator->errors()->all());
        }
        $data = $request->all();
        $password = Hash::make($data['password']);

        $user = User::find($id);
        $user->password   = $password;
        $user->update();

        return redirect('/profile')->with('success', 'Change Password Successfully!');
    }
}
