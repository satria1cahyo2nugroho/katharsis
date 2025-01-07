<?php

namespace App\Http\Controllers;

use Exception;
use Midtrans\Snap;
use App\Models\Tiket;
use App\Models\Transaksi;
use Midtrans\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\DumpHandler;

class Payment_Controller extends Controller
{

    public function Checkout(Request $request)
    {
        $product = Tiket::find($request->input('produk_id'));

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $uniqueOrderId = Auth::user()->id . '_' . time();
        $params = array(
            'transaction_details' => array(
                'order_id' => $uniqueOrderId,
                'gross_amount' => $product->harga,
            ),
            'customer_details' => array(
                'first_name'       => Auth::user()->name,
                'last_name'        => "",
                'email' => Auth::user()->email,
            ),
        );


        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // $combinedString = Auth::user()->id . $product->id . $product->harga;
        // $sha256Hash = hash('sha256', $combinedString);

        $combinedString = Auth::user()->id . $product->id . $product->harga;
        $salt = bin2hex(random_bytes(16)); // Generates a 16-byte salt and converts it to a hexadecimal string.
        $saltedString = $combinedString . $salt; // Combine the original string with the salt.
        $sha256Hash = hash('sha256', $saltedString); // Hash the salted string.

        echo 'Salt: ' . $salt . PHP_EOL;
        echo 'Salted String: ' . $saltedString . PHP_EOL;
        echo 'SHA-256 Hash: ' . $sha256Hash . PHP_EOL;

        $transaksi = Transaksi::create([
            'user_id' => Auth::user()->id,
            'produk_id' => $product->id,
            'nama' => $product->name,
            'tiket_id' => $product->id_tiket,
            'harga' => $product->harga,
            'status' => 'pending',
            'sha256' => $sha256Hash,
        ]);
        $transaksi->snap_token = $snapToken;

        $transaksi->save();

        return redirect()->route('bayar', $transaksi->id);
    }

    // public function Checkout(Request $request)
    // {
    //     $product = Tiket::find($request->input('produk_id'));

    //     if (!$product) {
    //         return redirect()->back()->with('error', 'Product not found');
    //     }

    //     $transaksi = Transaksi::create([
    //         'user_id' => Auth::user()->id,
    //         'produk_id' => $product->id,
    //         'harga' => $product->harga,
    //         'status' => 'pending',
    //     ]);

    //     \Midtrans\Config::$serverKey = config('midtrans.serverKey');
    //     \Midtrans\Config::$isProduction = false;
    //     \Midtrans\Config::$isSanitized = true;
    //     \Midtrans\Config::$is3ds = true;

    //     // Ensure a unique order_id
    //     $uniqueOrderId = Auth::user()->id . '_' . time();

    //     $user = Auth::user();
    //     if ($user) {
    //         Log::info('User name: ' . $user->name);
    //         Log::info('User email: ' . $user->email);
    //     } else {
    //         Log::info('No authenticated user found.');
    //     }
    //     // $params = array(
    //     //     'transaction_details' => array(
    //     //         'order_id' => $uniqueOrderId,
    //     //         'gross_amount' => $product->harga,
    //     //     ),
    //     //     'customer_details' => array(
    //     //         'name' => Auth::user()->name,
    //     //         'email' => Auth::user()->email,
    //     //     ),
    //     // );
    //     $params = array(
    //         'transaction_details' => array(
    //             'order_id' => $uniqueOrderId,
    //             'gross_amount' => $product->harga,
    //         ),
    //         'customer_details' => array(
    //             'first_name'       => $user->name,
    //             'last_name'        => "",
    //             'email' => $user->email,
    //         ),
    //     );
    //     Log::info('Midtrans Params: ' . json_encode($params));

    //     try {
    //         $snapToken = \Midtrans\Snap::getSnapToken($params);
    //         $transaksi->snap_token = $snapToken;
    //         $transaksi->save();
    //         return redirect()->route('bayar', $transaksi->id);
    //     } catch (Exception $e) {
    //         return redirect()->back()->with('error', 'Failed to generate Snap token: ' . $e->getMessage());
    //     }
    // }


    // In your controller
    public function setTiketConfig()
    {
        $tikets = Tiket::all()->toArray();
        config(['tiket.desc' => $tikets]);
    }


    public function bayar(Transaksi $transaksi)
    {
        // Set the config with Tiket data
        $this->setTiketConfig();

        $produk = config('tiket.desc');
        $produks = collect($produk)->firstWhere('id', $transaksi->produk_id);

        return view('pengunjung.tiket.bayar', compact('transaksi', 'produks'));
    }


    // public function bayar(Transaksi $transaksi)
    // {

    //     $produk = config('tiket_desc');

    //     $produks = collect($produk)->firstWhere('id', $transaksi->produk_id);

    //     return view('pengunjung.tiket.bayar', compact('transaksi', 'produks'));
    // }

    public function sukses(Transaksi $transaksi)
    {
        $transaksi->status = 'success';
        $transaksi->save();

        return view('pengunjung.suckes');
    }
    public function sukses_2(Transaksi $transaksi)
    {
        $transaksi->status = 'success';
        $transaksi->save();

        return view('pengunjung.suckes');
    }
}
