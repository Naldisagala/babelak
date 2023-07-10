<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Barang;
use App\Models\Keranjang;

class KeranjangController extends Controller
{
    public function index(Request $request)
    {   
        $id_user = auth()->user()->id;
        return view('pages.keranjang',['keranjang'=> $this->getCart($id_user)]);
    }

    public function checkout(Request $request)
    {
        $id_user = auth()->user()->id;
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

        return view('pages.checkout',[
            'keranjang'=> $this->getCart($id_user),
            'user' => $user
        ]);
    }

    public function hapus($id)
    {   
        $hapus = $this->cartHapus($id);
        if ($hapus) {
            return redirect()->back()->with('success','Remove Cart Successfully!!');
        } else {
            return redirect()->back();
        }
    }

    public function hapusChecked(Request $request)
    {   
        $id_carts = $request->get('id_carts');
        $ids = explode(',', $id_carts);
        foreach($ids as $id){
            $this->cartHapus($id);
        }
        return redirect()->back()->with('success','Remove Cart Successfully!!');
    }

    public function addCart(Request $request)
    {
        $id_barang = $request->get('id_barang');
        $id_user   = $request->get('id_user');
        $id_seller = $request->get('id_seller');

        $data = [
            'id_barang' => $id_barang,
            'id_user'   => $id_user,
            'gambar'    => '',
            'id_tawar'  => '',
            'aktif'     => 1,
            'id_seller' => $id_seller,
        ];

        $cart = Keranjang::where('id_barang', '=', $id_barang)
        ->where('id_user', '=', $id_user)
        ->where('status','=','process')
        ->first();
        if(!empty($cart)){
            if($cart->aktif == 1){
                return redirect()->back()->with('error','The product is already in the cart!!');
            }else{
                $keranjang = Keranjang::find($cart->id);
                $keranjang->aktif   = 1;
                $keranjang->update();
                return redirect()->back()->with('success','Product add to Cart Successfully!!');
            }
        }else{
            Keranjang::create($data);
            return redirect()->back()->with('success','Product add to Cart Successfully!!');
        }
    }

    public function addCartToCheckout(Request $request)
    {
        $id_barang = $request->get('id_barang');
        $id_user   = $request->get('id_user');
        $id_seller = $request->get('id_seller');

        $data = [
            'id_barang' => $id_barang,
            'id_user'   => $id_user,
            'gambar'    => '',
            'id_tawar'  => '',
            'aktif'     => 1,
            'id_seller' => $id_seller,
        ];

        $cart = Keranjang::where('id_barang', '=', $id_barang)
        ->where('id_user', '=', $id_user)
        ->where('status','=','process')
        ->first();
        if(!empty($cart)){
            if($cart->aktif == 1){
                return redirect()->back()->with('error','The product is already in the cart!!');
            }else{
                $keranjang = Keranjang::find($cart->id);
                $keranjang->aktif   = 1;
                $keranjang->update();
                return redirect('/checkout')->with('success', 'Product add to Cart Successfully!');
            }
        }else{
            Keranjang::create($data);
            return redirect('/checkout')->with('success', 'Product add to Cart Successfully!');
        }
    }
}
