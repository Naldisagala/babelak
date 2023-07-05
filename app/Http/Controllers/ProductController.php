<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    public function myproducts()
    {
        return view('pages.order.myproducts', []);
    }
}
