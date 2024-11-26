<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;


class Pengunjung extends Controller
{
    public function tiket()
    {
        $tiket = Tiket::all();
        return view('pengunjung.tiket.tiket', compact('tiket'));
    }

    // public function detail_tiket(Request $request, $id)
    // {
    //     $tike = Tiket::find($id);
    //     return view('pengunjung.tiket.beli', compact('tike'));
    // }
    public function detail_tik(Request $request, $id)
    {
        $tikets = Tiket::find($id);
        $tikett = Tiket::all();

        return view('pengunjung.tiket.beli', compact('tikets', 'tikett'));
    }
}
