<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Courier;
use App\Models\Transaksi;
use App\Models\Keranjang;

class CheckoutController extends Controller
{
    public function getOngkir($origin, $destination, $weight, $courier){
        $ongkir = Courier::getOngkir($origin, $destination, $weight, $courier);
        return response()->json($ongkir['data'], 200);
    }

    public function getProvince($id = null)
    {
        $province = Courier::getProvince($id);
        return response()->json($province['data'], 200);
    }

    public function getCity($id_province, $id_city = null)
    {
        $city = Courier::getCity($id_province, $id_city);
        return response()->json($city['data'], 200);
    }
    
    public function getListCourier($province, $city, $weight)
    {
        $courier = Courier::getListCourier($province, $city, $weight);
        return response()->json($courier, 200);
    }

    public function checkout(Request $request)
    {
        $id_user    = auth()->user()->id;
        $id_serller = $request->get('id_serller');
        $bank       = $request->get('bank');

        foreach($id_serller as $idslr){
            $cart_ids       = $request->get('cart_id_'.$idslr);
            $totals         = $request->get('total_'.$idslr);
            $note           = $request->get('note_'.$idslr);
            $number_payment = $request->get('number_payment_'.$idslr);

            for($i = 0; $i < count($totals); $i++){
                $cart_id = $cart_ids[$i];
                $total   = $totals[$i];

                $data = [
                    'id_cart' => $cart_id,
                    'id_user' => $id_user,
                    'code_payment' => $bank,
                    'number_payment' => $number_payment,
                    'total' => $total,
                    'status' => 'waiting',
                    'active' => 1,
                    'note' => $note,
                ];
                Transaksi::create($data);

                $keranjang = Keranjang::find($cart_id);
                $keranjang->status   = 'done';
                $keranjang->update();
            }
        }

        return redirect('/')->with('success', 'Checkout Successfully!');
    }
}
