<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\Gallery;
use App\Models\Barang;

class ProductController extends Controller
{

    public function myproducts()
    {
        $products = Barang::where('id_seller', '=', auth()->user()->id)
        ->where('status','=','accept')->get();
        return view('pages.product.index', [
            'products' => $products
        ]);
    }

    public function product()
    {
        $provinces = Province::all();
        return view('pages.product.add', [
            'provinces' => $provinces
        ]);
    }

    public function insert(Request $request)
    {
        try{
            $user = auth()->user();
            $valid   = [
                'name'        => 'required',
                'price'       => 'required',
                'stock'       => 'required',
                'description' => 'required',
                'status'      => 'required',
                'address'     => 'required',
                'village'     => 'required',
                'postcode'    => 'required',
                'usage'       => 'required',
                'method'      => 'required',
                'image'       => 'required',
                'image.*'     => 'mimes:jpeg,jpg,png,gif|max:2048'
            ];

            if(!empty($request->video)){
                $valid['video.*'] = 'mimes:mp4|max:51200';
            }

            $request->validate($valid);
            $data = $request->all();
            
            $gallery = [];
            if($request->hasfile('image')) {
                foreach($request->file('image') as $file)
                {
                    $name = 'image-' . date('Ymdms').'.'.$file->extension();
                    $file->move(public_path('files/product'), $name);  
                    $gallery[] = [
                        'name' => $name,
                        'type' => 'image'
                    ];
                }
            }
            if($request->hasfile('video')) {
                foreach($request->file('video') as $file)
                {
                    $name = 'video-' . date('Ymdms').'.'.$file->extension();
                    $file->move(public_path('files/product'), $name);  
                    $gallery[] = [
                        'name' => $name,
                        'type' => 'video'
                    ];
                }
            }

            $dataProduct = [
                'id_seller'     => $user->id,
                'nama_barang'   => $data['name'],
                'gambar'        => $gallery[0]['name'] ?? '',
                'deskripsi'     => $data['description'],
                'harga'         => $data['price'],
                'status_tawar'  => $data['is_tawar'] ? 'yes' : 'no',
                'status_barang' => $data['status'] ?? '',
                'stock'         => $data['stock'],
                'address'       => $data['address'],
                'id_village'    => $data['village'],
                'postcode'      => $data['postcode'],
                'usage'         => $data['usage'],
                'method'        => join(',', $data['method']),
            ];

            $product = Barang::create($dataProduct);
            if($product){
                foreach($gallery as $file){
                    Gallery::create([
                        'id_product' => $product['id'],
                        'name'       => $file['name'],
                        'type'       => $file['type'],
                        'created_by' => $user->id
                    ]);
                }
            }

            return back()->with('success', 'Successfully add product');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Update Profile Failed! '.$e->getMessage());
        }
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

    public function delete(Request $request)
    {
        $id = $request->get('id');
        Barang::where('id', $id)->delete();
        return redirect('/my-products')->with('success', 'Data is successfully deleted');
    }

    public function detail($id)
    {
        $product = Barang::select(
            'barangs.*',
            'v.name as village',
            'd.name as district',
            'r.name as regencie',
            'p.name as province',
        )
        ->leftJoin('villages as v', [
            ['v.id', '=', 'barangs.id_village'],
        ])
        ->leftJoin('districts as d', [
            ['d.id', '=', 'v.district_id'],
        ])
        ->leftJoin('regencies as r', [
            ['r.id', '=', 'd.regency_id'],
        ])
        ->leftJoin('provinces as p', [
            ['p.id', '=', 'r.province_id'],
        ])
        ->where('barangs.id', '=', $id)->first();

        $gallery = Gallery::where('id_product','=', $id)->get();

        return view('pages.product.view', [
            'product' => $product,
            'gallery' => $gallery,
        ]);
    }

    public function productValidation($id)
    {
        $product = Barang::select(
            'u.username',
            'u.name as name_user',
            'ud.address as address_user',
            'v.name as village',
            'd.name as district',
            'r.name as regencie',
            'p.name as province',
            'barangs.*'
        )
        ->leftJoin('users as u', [
            ['u.id', '=', 'barangs.id_seller'],
        ])
        ->leftJoin('user_detail as ud', [
            ['ud.id_user', '=', 'u.id'],
        ])
        ->leftJoin('villages as v', [
            ['v.id', '=', 'barangs.id_village'],
        ])
        ->leftJoin('districts as d', [
            ['d.id', '=', 'v.district_id'],
        ])
        ->leftJoin('regencies as r', [
            ['r.id', '=', 'd.regency_id'],
        ])
        ->leftJoin('provinces as p', [
            ['p.id', '=', 'r.province_id'],
        ])
        ->where('barangs.id', '=', $id)->first();

        $gallery = Gallery::where('id_product','=', $id)->get();

        return view('pages.admin.item_validation', [
            'product' => $product,
            'gallery' => $gallery,
        ]);
    }

    public function itemsEnter()
    {
        $products = Barang::select(
            'u.*',
            'barangs.*',
        )
        ->leftJoin('users as u', [
            ['u.id', '=', 'barangs.id_seller'],
        ])->get();
        return view('pages.admin.items_enter', [
            'products' => $products
        ]);
    }

    public function productValidationAction(Request $request)
    {
        $status = $request->get('type');
        $id   = $request->get('id');

        $product = Barang::find($id);
        $product->status   = $status;
        $product->update();

        return back()->with('success', 'Product Successfully '.ucfirst($status).'!');
    }

    public function booking()
    {
        return view('pages.admin.booking', []);
    }
}
