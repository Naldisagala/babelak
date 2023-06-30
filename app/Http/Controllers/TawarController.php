<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TawarController extends Controller
{
    public function sendChatTawar($user,$seller,$barang,$harga,Request $request)
    {

        $harga = ($harga == 'null') ? $request->tawar : $harga;

        $send = $this->sendTawar($user,$seller,$barang,$harga);

        if ($send) {
            return back()->withInput()->with('success', 'Data berhasil disimpan!');
        }else{
            return back()->withInput()->with('failed', 'Data tidak disimpan!');
        }

    }
}
