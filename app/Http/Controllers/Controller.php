<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use App\Models\Tawar;
use App\Models\Notification;
use App\Models\Keranjang;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getAllBarang($cari = null, $status = null)
    {
        $barang = Barang::with('user', 'alamat', 'seller')
        ->when($cari, function ($query) use ($cari) {
            return $query->where('nama_barang', 'LIKE', '%' . $cari . '%');
        });
        if($status){
            $barang->where('status', '=', $status);
        }

        return $barang->paginate(10);
    }

    public function getBarangById($id)
    {
        $barang = Barang::with('alamat','seller','tawar.user')->find($id);
        // dd($barang);
        return $barang;
    }

    public function sendTawar($user,$seller,$barang,$harga)
    {
        try {
            DB::transaction(function () use ($user, $seller, $barang, $harga) {
                // Lakukan operasi transaksi di sini
                $tawar = new Tawar();
                $tawar->id_user = $user;
                $tawar->id_seller = $seller;
                $tawar->id_barang = $barang;
                $tawar->harga_tawar = $harga;
                $tawar->status = 'waiting';
                $tawar->save();

            });

            return true;
        } catch (\Exception $e) {
            // Tangani jika terjadi kesalahan dalam transaksi
            return $e;
        }
    }

    // Fitur Keranjang
    public function cartCount()
    {
        return Keranjang::with('user', 'tawar','barang')
        ->where('id_user','=',auth()->user()->id ?? null)
        ->where('aktif','=',1)
        ->where('status','=','process')
        ->count();
    }
    public function getCart($user = null)
    {
        $seller = Keranjang::select('id_seller', DB::raw('COUNT(id_seller) as total_barang'))
        ->where('id_user', $user)
        ->where('aktif','=',1)
        ->where('status','=','process')
        ->groupBy('id_seller')
        ->get();
        

        foreach ($seller as $key) {
            $cart = Keranjang::with('user', 'tawar', 'barang', 'seller','alamatSeller')
            ->where('id_seller', $key->id_seller)
            ->where('aktif','=',1)
            ->where('status','=','process')
            ->get();  
            foreach ($cart as $keys) {
                $keys->harga_akhir = ($keys->tawar != null) ? $keys->tawar->harga_tawar :( $keys->barang->harga ?? 0);
            }
            $key->nama_toko = $cart[0]->seller->nama_toko;
            $key->kota = $cart[0]->alamatSeller->kota;
            $key->list_barang = $cart;
        }
        
        return $seller;
    }

    public function cartHapus($id)
    {
        $keranjang = Keranjang::find($id);
    
        if ($keranjang) {
            $keranjang->aktif = 0;
            $keranjang->save();
            // $keranjang->delete();
    
            return true;
        }
    
        return false;
    }

    public function countNotif()
    {
        $notif = 0;
        if(!empty(auth()->user())){
        $notif = Notification::where('to', '=', auth()->user()->id)
            ->where('is_read','=','0')
            ->count();
        }
        return $notif;
    }

    public function showNotifHeader()
    {
        $notif = [];
        if(!empty(auth()->user())){
            $notif = Notification::where('to', '=', auth()->user()->id)
            ->where('is_read','=','0')
            ->orderBy('id', 'DESC')
            ->skip(0)->take(10)
            ->get();
        }
        return $notif;
    }
}
