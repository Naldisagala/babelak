<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    public function myorders()
    {
        return view('pages.order.myorders', []);
    }

    public function soldOrders()
    {
        return view('pages.order.soldorders', []);
    }

    public function salesRevenue()
    {
        return view('pages.order.salesrevenue', []);
    }
}
