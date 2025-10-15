<?php

namespace App\Http\Controllers;

use App\Models\banner;
use App\Models\Tiket;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function home_cnt()
    {
        $tiket = Tiket::all();
        $banner = banner::all();
        return view('welcome', compact('tiket', 'banner'));
    }
}
