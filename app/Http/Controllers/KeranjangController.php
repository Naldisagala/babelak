<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index(Request $request)
    {   
        // dd($this->getCart(1));
        return view('pages.keranjang',['keranjang'=> $this->getCart(1)]);
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
}
