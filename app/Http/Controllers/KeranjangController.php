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
        )->leftJoin('user_detail as ud', [
            ['ud.id_user', '=', 'users.id'],
        ])->leftJoin('alamats as a', [
            ['a.id_user', '=', 'users.id'],
        ])->where('users.id', '=',auth()->user()->id)
        ->first();

        return view('pages.checkout',[
            'keranjang'=> $this->getCart($id_user, true),
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
            'id_barang'   => $id_barang,
            'id_user'     => $id_user,
            'gambar'      => '',
            'id_tawar'    => '',
            'aktif'       => 1,
            'id_seller'   => $id_seller,
            'is_checkout' => 1
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

    public function ajaxCartToCheckout(Request $request)
    {
        $id    = $request->get('id');
        $check = $request->get('check');
        $type  = $request->get('type');
        $total = 0;
        $barang_count = 0;
        $keranjang = [];
        if($type == "all"){
            $keranjangs = Keranjang::with('barang')
            ->where('aktif', '=', 1)
            ->where('id_user','=', auth()->user()->id)
            ->where('status','=','process')->get();
            foreach($keranjangs as $k){
                $keranjang = Keranjang::find($k->id);
                $keranjang->is_checkout   = $check;
                $keranjang->update();
            }
            $keranjang = $keranjangs;
        }else{
            $keranjang = Keranjang::find($id);
            $keranjang->is_checkout   = $check;
            $keranjang->update();
        }

        $keranjangs = Keranjang::with('barang')
            ->where('aktif', '=', 1)
            ->where('id_user','=', auth()->user()->id)
            ->where('status','=','process')->get();
        foreach($keranjangs as $k){
            if($k->is_checkout == 1){
                $total += $k->barang->harga;
                $barang_count++;
            }
        }

        return response()->json([
            'data'  => $keranjang,
            'total' => $total,
            'count' => $barang_count,
        ], 200);
    }
}
