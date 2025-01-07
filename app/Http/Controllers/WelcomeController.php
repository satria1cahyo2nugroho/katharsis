<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function home_cnt()
    {
        $tiket = Tiket::all();
        return view('welcome', compact('tiket'));
    }
}
