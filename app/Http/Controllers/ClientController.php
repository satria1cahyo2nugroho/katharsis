<?php

namespace App\Http\Controllers;


use App\Models\Tiket;
use App\Models\tiket_cek;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


class ClientController extends Controller
{

    // public function index(Request $request)
    // {
    //     // Get the logged-in user ID
    //     $userId = Auth::id();
    //     // Check if the logged-in user has the role 'client'
    //     $userHasClientRole = DB::table('model_has_roles')
    //         ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
    //         ->where('model_has_roles.model_id', '=', $userId)
    //         ->where('roles.name', '=', 'client')
    //         ->exists();

    //     if ($userHasClientRole) {
    //         // Fetch data from the database filtered by user ID in tiket_desc
    //         $transaki = DB::table('transaksis')
    //             ->join('tiket_desc', 'transaksis.produk_id', '=', 'tiket_desc.id')
    //             ->join('users', 'tiket_desc.user_id', '=', 'users.id')
    //             ->select(
    //                 'transaksis.*', // This will include the 'harga' field
    //                 DB::raw('DATE(transaksis.created_at) as date'),
    //                 DB::raw('SUM(transaksis.harga)/10 as total_sales'),
    //                 'tiket_desc.name as product_name',
    //                 'users.name as user_name'
    //             )
    //             ->where('tiket_desc.user_id', '=', $userId) // Filter by the logged-in user ID in tiket_desc
    //             ->groupBy(DB::raw('DATE(transaksis.created_at)'), 'product_name', 'users.name', 'transaksis.id')
    //             ->get();

    //         // Prepare data for plotting
    //         $dates = $transaki->pluck('date');
    //         $totals = $transaki->pluck('total_sales');

    //         // Return the view with the fetched data and plotting data
    //         return view('klien.dashbod', compact('transaki', 'dates', 'totals'));
    //     } else {
    //         // If the user does not have the 'client' role, redirect or show an error
    //         return redirect()->back()->with('error', 'You do not have the necessary permissions to access this data.');
    //     }
    // }
    // ver 3.0 with copilot
    // public function plotsales(Request $request)
    // {
    //     // Get the logged-in user ID
    //     $userId = Auth::id();
    //     // Fetch data from the database filtered by user ID in tiket_desc and ensure role is 'client'
    //     $transaki = DB::table('transaksis')
    //         ->join('tiket_desc', 'transaksis.produk_id', '=', 'tiket_desc.id')
    //         ->join('users', 'tiket_desc.user_id', '=', 'users.id')
    //         ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id') // Assuming you have a pivot table for roles
    //         ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
    //         ->select('transaksis.*', 'tiket_desc.name as product_name', 'users.name as user_name')
    //         ->where('users.id', '=', $userId) // Filter by the logged-in user ID in tiket_desc
    //         ->where('roles.name', '=', 'client') // Ensure the user's role is 'client'
    //         ->get();

    //     // Return the view with the fetched data
    //     return view('klien.sales', compact('transaki'));
    // }

    // ver 2.0 with copilto
    // public function plotsales(Request $request)
    // {
    //     // Get the logged-in user ID
    //     $userId = Auth::id();

    //     // Check if the logged-in user has the role 'client'
    //     $userHasClientRole = DB::table('model_has_roles')
    //         ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
    //         ->where('model_has_roles.model_id', '=', $userId)
    //         ->where('roles.name', '=', 'client')
    //         ->exists();

    //     if ($userHasClientRole) {
    //         // Fetch data from the database filtered by user ID in tiket_desc
    //         $transaki = DB::table('transaksis')
    //             ->join('tiket_desc', 'transaksis.produk_id', '=', 'tiket_desc.id')
    //             ->join('users', 'tiket_desc.user_id', '=', 'users.id')
    //             ->select('transaksis.*', 'tiket_desc.name as product_name', 'users.name as user_name')
    //             ->where('tiket_desc.user_id', '=', $userId) // Filter by the logged-in user ID in tiket_desc
    //             ->get();

    //         // Return the view with the fetched data
    //         return view('klien.sales', compact('transaki'));
    //     } else {
    //         // If the user does not have the 'client' role, redirect or show an error
    //         return redirect()->back()->with('error', 'You do not have the necessary permissions to access this data.');
    //     }
    // }

    // ver 4.0 with copilot take date and sum 
    public function plotsales(Request $request)
    {
        // Get the logged-in user ID
        $userId = Auth::id();

        // Check if the logged-in user has the role 'client'
        $userHasClientRole = DB::table('model_has_roles')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('model_has_roles.model_id', '=', $userId)
            ->where('roles.name', '=', 'client')
            ->exists();

        if ($userHasClientRole) {
            // Fetch data from the database filtered by user ID in tiket_desc
            $transaki = DB::table('transaksis')
                ->join('tiket_desc', 'transaksis.produk_id', '=', 'tiket_desc.id')
                ->join('users as penjual', 'tiket_desc.user_id', '=', 'penjual.id')
                ->join('users as pembeli', 'transaksis.user_id', '=', 'pembeli.id')
                ->select(
                    'transaksis.*', // This will include the 'harga' field
                    DB::raw('DATE_FORMAT(transaksis.created_at, "%Y-%m-%d") as date'),
                    DB::raw('SUM(transaksis.harga) as total_sales'),
                    'tiket_desc.name as product_name',
                    'penjual.name as user_name',
                    'pembeli.name as buyer_name'
                )
                ->where('tiket_desc.user_id', '=', $userId)
                ->groupBy(DB::raw('DATE(transaksis.created_at)'), 'product_name', 'penjual.name', 'pembeli.name', 'transaksis.id')
                ->get();

            $isClient = DB::table('model_has_roles')
                ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
                ->where('model_id', $userId)
                ->where('roles.name', 'client')
                ->exists();

            if (!$isClient) {
                return redirect()->back()->with('error', 'Bukan client.');
            }

            // Ambil tiket milik client dan histori pembelian
            $tiketSa = Tiket::with(['transaksis.user']) // ambil pembeli juga
                ->where('user_id', $userId)
                ->get();


            // Prepare data for plotting
            $dates = $transaki->pluck('date');
            $totals = $transaki->pluck('harga')->map(fn($val) => (int)$val)->toArray();
            $jumlah = $transaki->sum('harga');

            // Return the view with the fetched data and plotting data
            return view('klien.sales', compact('transaki', 'tiketSa', 'dates', 'totals', 'jumlah'));
        } else {
            // If the user does not have the 'client' role, redirect or show an error
            return redirect()->back()->with('error', 'You do not have the necessary permissions to access this data.');
        }
    }

    public function check_qr()
    {

        return view('klien.qrcode');
    }


    // validasi QR lama
    // public function validasi(Request $request)
    // {
    //     $data = $request->input('data');
    //     $nama = $data['nama'] ?? null;
    //     $harga = $data['harga'] ?? null;
    //     $code = $data['code'] ?? null;
    //     $key = $data['key'] ?? null;

    //     // Debugging: Log the data being checked
    //     Log::info('Validating QR code with data:', compact('nama', 'harga', 'code', 'key'));

    //     $record = Transaksi::where('nama', $nama)
    //         ->where('harga', $harga)
    //         ->where('snap_token', $code)
    //         ->where('sha256', $key)
    //         ->first();
    //     // hanya perlu key
    //     if ($record) {
    //         //data cek jika data 
    //         $existingRecord = tiket_cek::where('nama', $nama)
    //             ->where('harga', $harga)
    //             ->where('code', $code)
    //             ->where('key', $key)
    //             ->first();

    //         if (!$existingRecord) {
    //             // Save data to tiket_cek table only if it doesn't exist
    //             tiket_cek::create([
    //                 'nama' => $nama,
    //                 'harga' => $harga,
    //                 'code' => $code,
    //                 'key' => $key
    //             ]);
    //         }

    //         return response()->json(['success' => true, 'message' => 'Ticket code is Valid', 'data' => $record]);
    //     } else {
    //         return response()->json(['success' => false, 'message' => 'Ticket code is invalid']);
    //     }
    // }

    // validasi qr baru
    public function validasi(Request $request)
    {
        $data = $request->input('data');
        $key = $data['nay'] ?? null;

        Log::info('Validating QR code with key:', compact('key'));
        // Cari data transaksi berdasarkan key
        $record = Transaksi::where('sha256', $key)->first();

        if ($record) {
            // Cek apakah data sudah ada di tiket_cek
            $existingRecord = tiket_cek::where('key', $key)->first();

            if (!$existingRecord) {
                // Ambil data dari $record yang sudah ditemukan
                tiket_cek::create([
                    'nama' => $record->nama,
                    'harga' => $record->harga,
                    'code' => $record->snap_token,
                    'key' => $record->sha256
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Tiket telah berhasil di pindai dan valid',
                    'data' => $record
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Tiket yang dipindah sudah tersimpan',
                    'data' => $existingRecord
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Ticket code is invalid'
            ]);
        }
    }
    public function getData()
    {
        $data = tiket_cek::all(); // Fetch all records
        return response()->json(['data' => $data]);
    }
}
