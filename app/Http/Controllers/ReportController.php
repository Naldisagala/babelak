<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ReportController extends Controller
{
    public function finance()
    {
        return view('pages.admin.report_finance', []);
    }
}
