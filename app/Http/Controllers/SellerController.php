<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SellerController extends Controller
{
    public function register()
    {
        $id              = auth()->user()->id;
        $data            = User::find($id);
        $data->role      = "seller";
        $data->is_seller = 1;
        $data->update();

        return redirect('/')->with('success', 'Berhasil menjadi sebagai seller');
    }
}
