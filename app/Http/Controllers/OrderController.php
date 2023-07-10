<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Transaksi;

class OrderController extends Controller
{
    public function myorders()
    {
        $productWaiting   = Transaksi::where('status','=','waiting')->get();
        $productPackaging = Transaksi::where('status','=','packaging')->get();
        $productDelivery  = Transaksi::where('status','=','delivery')->get();
        $productDone      = Transaksi::where('status','=','done')->get();

        return view('pages.order.myorders', [
            'productWaiting'   => $productWaiting,
            'productPackaging' => $productPackaging,
            'productDelivery'  => $productDelivery,
            'productDone'      => $productDone,
        ]);
    }

    public function soldOrders()
    {
        return view('pages.order.soldorders', []);
    }

    public function salesRevenue()
    {
        return view('pages.order.salesrevenue', []);
    }
}
