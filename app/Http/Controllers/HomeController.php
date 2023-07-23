<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Barang;
use App\Models\User;
use App\Models\Seller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {   
        
        return view('pages.home',['barang'=> $this->getAllBarang($request['search'], "accept")]);
    }

    public function barang_detail($id)
    {
        $barang = $this->getBarangById($id);
        $gallery = Gallery::where('id_product', '=', $id)->get();

        return view('pages.barang',[
            'barang'  => $barang,
            'gallery' => $gallery,
        ]);
    }

    public function store($id, Request $request)
    {
        $user = User::find($id);
        $seller = Seller::where('id_user', '=', $id)->first();
        return view('pages.store',[
            'barang' => $this->getAllBarang($request['search'], "accept", $user->id),
            'user'   => $user,
            'seller' => $seller,
        ]);
    }
}
