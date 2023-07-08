<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class ProductController extends Controller
{
    public $region = [
        ['key' => 'province', 'foreign' => null,],
        ['key' => 'regency',  'foreign' => 'province_id'],
        ['key' => 'district', 'foreign' => 'regency_id'],
        ['key' => 'village',  'foreign' => 'district_id']
    ];

    public function myproducts()
    {
        return view('pages.product.index', []);
    }

    public function product()
    {
        $provinces = Province::all();
        return view('pages.product.add', [
            'provinces' => $provinces
        ]);
    }

    public function ajaxRegion(Request $request)
    {
        $type      = $request->get('type');
        $id        = $request->get('id');

        $data = [];
        if ($type == 'province') {
            $data = Province::where('id', '=', $id)->first();
        } elseif ($type == 'regency') {
            $data = Regency::where('province_id', '=', $id)->get();
        } elseif ($type == 'district') {
            $data = District::where('regency_id', '=', $id)->get();
        } elseif ($type == 'village') {
            $data = Village::where('district_id', '=', $id)->get();
        }
        
        return response()->json([
            'data'     => $data,
        ], 200);
    }

    public function productValidation($id)
    {
        return view('pages.admin.item_validation', []);
    }

    public function itemsEnter()
    {
        return view('pages.admin.items_enter', []);
    }

    public function booking()
    {
        return view('pages.admin.booking', []);
    }
}
