<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Barang;

class TawarController extends Controller
{
    public function sendChatTawar($user,$seller,$barang,$harga,Request $request)
    {
        $harga = ($harga == 'null') ? $request->tawar : $harga;
        
        $dataBarang = Barang::find($barang);
        $description = "Penawaran harga Rp. ".
            number_format($harga, 0, ',', '.')
            ." untuk barang ". $dataBarang->nama_barang;

        Notification::create([
            'from'        => $user,
            'to'          => $seller,
            'type'        => 'tawar',
            'description' => $description,
            'is_read'     => 0,
            'link'        => '/chat'
        ]);
        $send = $this->sendTawar($user,$seller,$barang,$harga);

        if ($send) {
            return back()->withInput()->with('success', 'Data berhasil disimpan!');
        }else{
            return back()->withInput()->with('failed', 'Data tidak disimpan!');
        }

    }
}
