<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Keranjang;
use App\Models\Transaksi;
use App\Models\Notification;

class OrderController extends Controller
{
    public function myOrders()
    {
        $id_user = auth()->user()->id;
        $productWaiting   = Transaksi::where('id_user', '=', $id_user)
        ->where('status','=','waiting')
        ->orWhere('status','=','process')
        ->get();
        
        $productPackaging = Transaksi::where('id_user', '=', $id_user)
        ->where('status','=','packaging')
        ->get();
        
        $productDelivery  = Transaksi::where('id_user', '=', $id_user)
        ->where('status','=','delivery')
        ->get();
        
        $productDone      = Transaksi::where('id_user', '=', $id_user)
        ->where('status','=','done')
        ->get();

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

        $admin = User::where('role','=','admin')->first();
        $description = "Menunggu konfirmasi bukti pembayaran dari produk ". 
        $transaksi->keranjang->barang->nama_barang;
        Notification::create([
            'from'        => $user->id,
            'to'          => $admin->id,
            'type'        => 'bukti-pembayaran',
            'description' => $description,
            'is_read'     => 0,
            'link'        => '/'.env("URL_ADMIN", 'admin').'/payment-confirmation'
        ]);

        return redirect()->back()->with('success','Proof Payment Successfully!!');
    }

    public function soldOrders()
    {
        $id_user = auth()->user()->id;
        $productPackaging = Transaksi::select(
            'k.*', 'transaksis.*'
        )
        ->leftJoin('keranjangs as k', [
            ['k.id', '=', 'transaksis.id_cart'],
        ])
        ->where('id_seller','=',$id_user)
        ->where('transaksis.status','=','packaging')
        ->get();

        $productDelivery  = Transaksi::select(
            'k.*', 'transaksis.*'
        )
        ->leftJoin('keranjangs as k', [
            ['k.id', '=', 'transaksis.id_cart'],
        ])
        ->where('id_seller','=',$id_user)
        ->where('transaksis.status','=','delivery')
        ->get();

        $productDone      = Transaksi::select(
            'k.*', 'transaksis.*'
        )
        ->leftJoin('keranjangs as k', [
            ['k.id', '=', 'transaksis.id_cart'],
        ])
        ->where('id_seller','=',$id_user)
        ->where('transaksis.status','=','done')
        ->get();

        return view('pages.order.soldorders', [
            'productPackaging' => $productPackaging,
            'productDelivery'  => $productDelivery,
            'productDone'      => $productDone,
        ]);
    }

    public function resi(Request $request)
    {
        $id      = $request->get('id_data');
        $no_resi = $request->get('no_resi');

        $transaksi = Transaksi::find($id);
        $transaksi->resi  = $no_resi;
        $transaksi->status = 'delivery';
        $transaksi->update();

        $user = auth()->user();
        $description = "Pesanan dari produk ". 
        $transaksi->keranjang->barang->nama_barang. " sudah dikirim dengan No. Resi :" . $no_resi;
        Notification::create([
            'from'        => $user->id,
            'to'          => $transaksi->id_user,
            'type'        => 'pengiriman',
            'description' => $description,
            'is_read'     => 0,
            'link'        => '/my-orders'
        ]);

        return redirect()->back()->with('success','Add Receipt Number Successfully!!');
    }

    public function doneOrder(Request $request)
    {
        $id = $request->get('id');
        $transaksi = Transaksi::find($id);
        $transaksi->status = 'done';
        $transaksi->update();

        $user = auth()->user();
        $description = "Pesanan dari produk ". 
        $transaksi->keranjang->barang->nama_barang. " sudah diterima";
        Notification::create([
            'from'        => $user->id,
            'to'          => $transaksi->keranjang->user_seller->id,
            'type'        => 'penyelesaian-pesanan',
            'description' => $description,
            'is_read'     => 0,
            'link'        => '/sold-orders'
        ]);

        return redirect()->back()->with('success','Order received Successfully!!');
    }

    public function salesRevenue()
    {
        $id_user = auth()->user()->id;
        $transaction = Transaksi::select(
            'k.*', 'transaksis.*'
        )
        ->leftJoin('keranjangs as k', [
            ['k.id', '=', 'transaksis.id_cart'],
        ])
        ->where('id_seller','=',$id_user)
        ->where('transaksis.status', '=', 'done')->get();
        
        return view('pages.order.salesrevenue', [
            'transaction' => $transaction
        ]);
    }
}
