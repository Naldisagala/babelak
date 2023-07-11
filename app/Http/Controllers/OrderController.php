<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Keranjang;
use App\Models\Transaksi;

class OrderController extends Controller
{
    public function myOrders()
    {
        $productWaiting   = Transaksi::where('status','=','waiting')
        ->orWhere('status','=','process')->get();
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

    public function proofPayment(Request $request)
    {
        $user        = auth()->user();
        $bukti       = $request->bukti;
        $id          = $request->get('id_data');
        $description = $request->get('description');

        $validInput = [
            'bukti' => 'required|mimes:png,jpg,jpeg|max:2048'
        ];
        $validator = \Validator::make($request->all(), $validInput);
        if ($validator->fails())
        {
            return redirect('/my-orders')->with('error', $validator->errors()->all());
        }
        $file = 'file-' . date('Ymdms').'.'.$bukti->extension();
        $bukti->move(public_path('files/order/proof'), $file);

        $transaksi = Transaksi::find($id);
        $transaksi->description  = $description;
        $transaksi->bukti  = $file;
        $transaksi->status = 'process';
        $transaksi->update();

        return redirect()->back()->with('success','Proof Payment Successfully!!');
    }

    public function soldOrders()
    {
        $productPackaging = Transaksi::where('status','=','packaging')->get();
        $productDelivery  = Transaksi::where('status','=','delivery')->get();
        $productDone      = Transaksi::where('status','=','done')->get();

        return view('pages.order.soldorders', [
            'productPackaging' => $productPackaging,
            'productDelivery'  => $productDelivery,
            'productDone'      => $productDone,
        ]);
    }

    public function salesRevenue()
    {
        return view('pages.order.salesrevenue', []);
    }
}
