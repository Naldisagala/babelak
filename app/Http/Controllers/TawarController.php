<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Chat;
use App\Models\Barang;
use App\Models\Tawar;

class TawarController extends Controller
{
    public function sendChatTawar($user,$seller,$barang,$harga,Request $request)
    {
        $harga = ($harga == 'null') ? $request->tawar : $harga;

        $dataTawar = [
            'id_user' => $user,
            'id_seller' => $seller,
            'id_barang' => $barang,
            'harga_tawar' => $harga,
            'status' => 'waiting',
        ];

        $checkTawar = Tawar::where(
            $dataTawar
        )->first();

        if($checkTawar){
            return back()->withInput()->with('error', 'Sudah melakukan penawaran harga yg sama pada barang ini');
        }

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

        $tawar = Tawar::create($dataTawar);

        Chat::create([
            'from' => $user,
            'to' => $seller,
            'id_tawar' => $tawar->id,
            'message' => 'Ada yang mengajukan penawaran harga Rp '.number_format($harga, 2, ',', '.').' pada barang '.$dataBarang->nama_barang.' ini!',
            'is_read' => 0,
        ]);

        if ($tawar) {
            return back()->withInput()->with('success', 'Data berhasil disimpan!');
        }else{
            return back()->withInput()->with('error', 'Data tidak disimpan!');
        }

    }
}
