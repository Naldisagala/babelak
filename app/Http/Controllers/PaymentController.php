<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PaymentController extends Controller
{
    public function confirmation()
    {
        return view('pages.admin.payment_confirmation', []);
    }
}
