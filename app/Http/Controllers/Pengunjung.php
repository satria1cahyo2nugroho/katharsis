<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Tiket;
use App\Models\Transaksi;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


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
            $transaction->product = Transaksi::find($transaction->id);
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

    // pdf

    // public function gen_pdf()
    // {

    //     $pdf = Pdf::loadView('pengunjung.cetak.pdf');
    //     return $pdf->download('Tikets.pdf');
    //     return $pdf->stream();
    // }

    // public function gen_pdf(Request $request, $id)
    // {
    //     $options = new Options();
    //     $options->set('isRemoteEnabled', true);

    //     $dompdf = new Dompdf($options);

    //     $userId = Auth::id();
    //     // Find all transactions for the logged-in user
    //     $tiket = Transaksi::where('user_id', $userId)->get();
    //     // Generate QR code based on the Tiket data 
    //     $qrCodeContent = $tiket->name . ' ' . $tiket->date . ' ' . $tiket->location; // Adjust the content as needed 
    //     $qrCode = base64_encode(QrCode::format('png')->size(250)->generate($qrCodeContent)); // Render the view with the QR code and Tiket data 
    //     $html = view('pengunjung.cetak.pdf', compact('tiket', 'qrCode'))->render();
    //     // Embed base64 encoded image
    //     $html = str_replace('{{ asset("landpage/assets/logo2.png") }}', 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('landpage/assets/logo2.png'))), $html);

    //     $dompdf->loadHtml($html);
    //     $dompdf->setPaper('A4', 'portrait');
    //     $dompdf->render();

    //     return $dompdf->stream('Tikets.pdf');
    // }


    public function gen_pdf(Request $request, $id)
    {
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        $userId = Auth::id();
        // Find the specific transaction for the logged-in user
        $transaksi = Transaksi::where('user_id', $userId)->where('id', $id)->firstOrFail();

        // $qrCodeContent = $transaksi->nama . ' ' . $transaksi->harga . ' ' . $transaksi->status;
        // $combinedString = $transaksi->id . $transaksi->name . $transaksi->harga;
        // $sha256Hash = hash('sha256', $combinedString);

        $qrCodeContent = json_encode([
            // 'nama' => $transaksi->nama,
            // 'harga' => $transaksi->harga,
            // 'code' => $transaksi->snap_token,
            'nay' => $transaksi->sha256,
            // 'key' => $sha256Hash,
        ]);
        //alter the svg to bas64 because simpleqrcode need imagick and it's quite annoying because there was no solution
        $qrCode = base64_encode(QrCode::format('svg')->size(250)->generate($qrCodeContent));

        // Render the view with the QR code and Transaksi data
        $html = view('pengunjung.cetak.pdf', compact('transaksi', 'qrCode'))->render();

        // Embed base64 encoded image
        $html = str_replace('{{ asset("landpage/assets/logo2.png") }}', 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('landpage/assets/logo2.png'))), $html);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream('Tikets.pdf');
    }
}
