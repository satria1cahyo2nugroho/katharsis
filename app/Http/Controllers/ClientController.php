<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{

    public function index(Request $request)
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
                ->join('users', 'tiket_desc.user_id', '=', 'users.id')
                ->select(
                    'transaksis.*', // This will include the 'harga' field
                    DB::raw('DATE(transaksis.created_at) as date'),
                    DB::raw('SUM(transaksis.harga)/10 as total_sales'),
                    'tiket_desc.name as product_name',
                    'users.name as user_name'
                )
                ->where('tiket_desc.user_id', '=', $userId) // Filter by the logged-in user ID in tiket_desc
                ->groupBy(DB::raw('DATE(transaksis.created_at)'), 'product_name', 'users.name', 'transaksis.id')
                ->get();

            // Prepare data for plotting
            $dates = $transaki->pluck('date');
            $totals = $transaki->pluck('total_sales');

            // Return the view with the fetched data and plotting data
            return view('klien.dashbod', compact('transaki', 'dates', 'totals'));
        } else {
            // If the user does not have the 'client' role, redirect or show an error
            return redirect()->back()->with('error', 'You do not have the necessary permissions to access this data.');
        }
    }
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
                ->join('users', 'tiket_desc.user_id', '=', 'users.id')
                ->select(
                    'transaksis.*', // This will include the 'harga' field
                    DB::raw('DATE(transaksis.created_at) as date'),
                    DB::raw('SUM(transaksis.harga)/10 as total_sales'),
                    'tiket_desc.name as product_name',
                    'users.name as user_name'
                )
                ->where('tiket_desc.user_id', '=', $userId) // Filter by the logged-in user ID in tiket_desc
                ->groupBy(DB::raw('DATE(transaksis.created_at)'), 'product_name', 'users.name', 'transaksis.id')
                ->get();

            // Prepare data for plotting
            $dates = $transaki->pluck('date');
            $totals = $transaki->pluck('total_sales');

            // Return the view with the fetched data and plotting data
            return view('klien.sales', compact('transaki', 'dates', 'totals'));
        } else {
            // If the user does not have the 'client' role, redirect or show an error
            return redirect()->back()->with('error', 'You do not have the necessary permissions to access this data.');
        }
    }
}
