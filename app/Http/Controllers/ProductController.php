<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    public function myproducts()
    {
        return view('pages.product.index', []);
    }

    public function product()
    {
        return view('pages.product.add', []);
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
