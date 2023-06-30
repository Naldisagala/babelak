<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        
        return view('pages.home',['barang'=> $this->getAllBarang($request['search'])]);
    }

    public function barang_detail($id)
    {
        $this->getBarangById($id);
        return view('pages.barang',['barang'=> $this->getBarangById($id)]);
    }
}
