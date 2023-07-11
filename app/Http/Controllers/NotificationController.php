<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $notification = Notification::where('to','=', $user->id)->get();
        return view('pages.notification', [
            'notification' => $notification
        ]);
    }
}
