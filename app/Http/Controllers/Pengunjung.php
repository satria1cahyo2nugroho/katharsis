<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Pengunjung extends Controller
{
    public function tiket()
    {
        $tiket = Tiket::all();
        return view('pengunjung.tiket.tiket', compact('tiket'));
    }
    public function detail_tik(Request $request, $id)
    {
        $tikets = Tiket::find($id);
        $tikett = Tiket::all();

        return view('pengunjung.tiket.beli', compact('tikets', 'tikett'));
    }


    // public function detail_transaksi()
    // {

    //     $transactions = Transaksi::where('user_id', Auth::user()->id)->get();
    //     $transactions->transform(function ($transaction, $key) {
    //         $transaction->product = Tiket::find($transaction->produk_id);
    //         return $transaction;
    //     });

    //     return view('pengunjung.transaksi', compact('transactions'));
    // }

    public function detail_transaksi()
    {
        $transactions = Transaksi::where('user_id', Auth::user()->id)->get();

        if ($transactions->isEmpty()) {
            // Optionally, you can set a flag or a variable to indicate no transactions found
            $noTransactions = true;
            return view('pengunjung.transaksi', compact('transactions', 'noTransactions'));
        }

        $transactions->transform(function ($transaction) {
            $transaction->product = Tiket::find($transaction->produk_id);
            return $transaction;
        });

        return view('pengunjung.transaksi', compact('transactions'));
    }



    public function lihat_tiket(Request $request)
    {
        // Get the logged-in user's ID
        $userId = Auth::id();

        // Find all transactions for the logged-in user
        $tiket_lihat = Transaksi::where('user_id', $userId)->get();

        return view('pengunjung.lihat', compact('tiket_lihat'));
    }
}
