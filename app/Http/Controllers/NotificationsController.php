<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('notifications',[
            'user' => auth()->user()
        ]);
    }
}
