<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Keranjang;
use App\Models\Transaksi;
use App\Models\Notification;

class PaymentController extends Controller
{
    public function confirmation()
    {
        $transaction = Transaksi::where('status','=','process')->get();
        return view('pages.admin.payment_confirmation', [
            'transaction' => $transaction
        ]);
    }

    public function proof(Request $request)
    {
        $user = auth()->user();
        $id   = $request->get('id');

        $transaksi = Transaksi::find($id);
        $transaksi->status = 'packaging';
        $transaksi->update();

        $description = "Konfirmasi bukti pembayaran diterima dari produk ". 
        $transaksi->keranjang->barang->nama_barang. ', produk sedang di proses pengiriman';
        Notification::create([
            'from'        => $user->id,
            'to'          => $transaksi->id_user,
            'type'        => 'konfirmasi-pembayaran',
            'description' => $description,
            'is_read'     => 0,
            'link'        => '/my-orders'
        ]);

        return redirect()->back()->with('success','Proof Accept Payment Successfully!!');
    }
}
