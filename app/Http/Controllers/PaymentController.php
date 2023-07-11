<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Keranjang;
use App\Models\Transaksi;

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
        $id = $request->get('id');
        $transaksi = Transaksi::find($id);
        $transaksi->status = 'packaging';
        $transaksi->update();

        return redirect()->back()->with('success','Proof Accept Payment Successfully!!');
    }
}
