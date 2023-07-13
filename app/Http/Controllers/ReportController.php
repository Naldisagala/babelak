<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Transaksi;
class ReportController extends Controller
{
    public function finance()
    {
        $transaction = Transaksi::where('status', '=', 'done')->get();
        return view('pages.admin.report_finance', [
            'transaction' => $transaction
        ]);
    }

    public function transfer($id)
    {
        $transaction = Transaksi::find($id);
        $transaction->is_transfer = 1;
        $transaction->update();

        return back()->with('success', 'Successfully Transfer');
    }
}
