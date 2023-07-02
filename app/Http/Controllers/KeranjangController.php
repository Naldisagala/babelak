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
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
