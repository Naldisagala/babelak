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
        $products = Barang::all();
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
        // dd($request->all());
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
                $valid['video.*'] = 'mimes:mp4|max:5120';
            }

            $request->validate($valid);
            $data = $request->all();

            dd($data);
            
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

            // dd($data);

            $dataProduct = [
                'id_seller'     => $user->id,
                'nama_barang'   => $data['name'],
                'gambar'        => $gallery[0]['name'] ?? '',
                'deskripsi'     => $data['description'],
                'harga'         => $data['price'],
                'status_tawar'  => $data['is_tawar'] ?? 0,
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
