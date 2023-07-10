<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Courier;

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
        
    }
}
