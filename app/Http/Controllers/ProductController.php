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
use App\Models\Transaksi;
use App\Models\Notification;
use App\Models\User;

class ProductController extends Controller
{

    public function myProducts()
    {
        $products = Barang::where('id_seller', '=', auth()->user()->id)->get();
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
                'description' => 'required',
                'status'      => 'required',
                'usage'       => 'required',
                'method'      => 'required',
                'image'       => 'required',
                'image.*'     => 'mimes:jpeg,jpg,png,gif|max:100240'
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
                // 'stock'         => $data['stock'] ?? 1,
                // 'wight'         => $data['wight'] ?? null,
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

            $user = auth()->user();
            $admin = User::where('role','=','admin')->first();
            $description = "Terdapat barang masuk (". 
            $product->nama_barang. ") mohon untuk dicek";
            Notification::create([
                'from'        => $user->id,
                'to'          => $admin->id,
                'type'        => 'barang-masuk',
                'description' => $description,
                'is_read'     => 0,
                'link'        => '/'.env("URL_ADMIN", 'admin').'/items-enter'
            ]);

            return back()->with('success', 'Successfully add product');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Update Product Failed! '.$e->getMessage());
        }
    }

    public function update(Request $request)
    {
        try{
            $user = auth()->user();
            $valid   = [
                'name'        => 'required',
                'price'       => 'required',
                'description' => 'required',
                'status'      => 'required',
                'usage'       => 'required',
                'method'      => 'required',
            ];

            if(!empty($request->image)){
                $valid['image.*'] = 'mimes:jpeg,jpg,png,gif|max:100240';
            }

            if(!empty($request->video)){
                $valid['video.*'] = 'mimes:mp4|max:51200';
            }

            $request->validate($valid);
            $data = $request->all();
            $id_product = $request->get('id_product');
            $photo_old = $request->photo_old;

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
                'gambar'        => $gallery[0]['name'] ?? ($photo_old[0] ?? ''),
                'deskripsi'     => $data['description'],
                'harga'         => $data['price'],
                'status_tawar'  => !empty($data['is_tawar']) ? 'yes' : 'no',
                'status_barang' => $data['status'] ?? '',
                // 'stock'         => $data['stock'] ?? 1,
                // 'wight'         => $data['wight'] ?? null,
                'usage'         => $data['usage'],
                'method'        => join(',', $data['method']),
            ];

            $product = Barang::find($id_product);
            $product->update($dataProduct);
            Gallery::where('id_product', '=', $id_product)->delete();
            foreach($photo_old as $file){
                if(!empty($file)){
                    Gallery::create([
                        'id_product' => $id_product,
                        'name'       => $file,
                        'type'       => 'image',
                        'created_by' => $user->id
                    ]);
                }
            }

            if(!empty($gallery)){
                foreach($gallery as $file){
                    Gallery::create([
                        'id_product' => $id_product,
                        'name'       => $file['name'],
                        'type'       => $file['type'],
                        'created_by' => $user->id
                    ]);
                }
            }

            $user = auth()->user();
            $admin = User::where('role','=','admin')->first();
            $description = "Terdapat update barang masuk (". 
            $product->nama_barang. ") mohon untuk dicek";
            Notification::create([
                'from'        => $user->id,
                'to'          => $admin->id,
                'type'        => 'barang-masuk',
                'description' => $description,
                'is_read'     => 0,
                'link'        => '/'.env("URL_ADMIN", 'admin').'/items-enter'
            ]);

            return back()->with('success', 'Successfully add product');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Update Product Failed! '.$e->getMessage());
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
        )
        ->where('barangs.id', '=', $id)->first();

        $gallery = Gallery::where('id_product','=', $id)->get();

        return view('pages.product.update', [
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
            'barangs.*'
        )
        ->leftJoin('users as u', [
            ['u.id', '=', 'barangs.id_seller'],
        ])
        ->leftJoin('user_detail as ud', [
            ['ud.id_user', '=', 'u.id'],
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

        $user = auth()->user();
        $description = "Barang berhasil ".
        ($status == 'decline' ? 'ditolak' : 'diterima') ." (". 
        $product->nama_barang. ")";
        Notification::create([
            'from'        => $user->id,
            'to'          => $product->id_seller,
            'type'        => 'barang-masuk-'.($status == 'decline' ? 'tolak' : 'terima'),
            'description' => $description,
            'is_read'     => 0,
            'link'        => '/my-products'
        ]);

        return back()->with('success', 'Product Successfully '.ucfirst($status).'!');
    }

    public function booking()
    {
        $transaction   = Transaksi::where('status','!=','waiting')
        ->where('status','!=','process')->get();
        return view('pages.admin.booking', [
            'transaction' => $transaction
        ]);
    }
}
