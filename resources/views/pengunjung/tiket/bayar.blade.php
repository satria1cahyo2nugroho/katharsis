<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('landpage/bootstrap/css/bootstrap.min.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('landpage/summernote/summernote-bs5.css') }}" /> --}}
    {{-- <script src=" {{ asset('landpage/summernote/summernote-bs5.js') }}"></script> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>CHECKOUT</title>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')
        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                    {{ __('CHECKOUT') }}
                </h2>
            </div>
        </header>
        <!-- Page Content -->
        <main>

            <div class="content mt-5">
                <div class="container flex-auto">
                    <div class="card">
                        <div class="card-header"> MEMBAYAR</div>
                        <div class="form-group">
                            <div class="card-vody">
                                <div class="container text-center">
                                    <div class="row">
                                        <div class="card-body">
                                            <div
                                                class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                                Anda akan melakukan pembelian produk
                                                <img src="{{ asset('storage/image-tiket/' . $produks['image']) }}"
                                                    class="img-thumbnail" style="height: 300px; width: 300px;"
                                                    alt="...">
                                                <strong>{{ $produks['name'] }}</strong> dengan harga
                                                <strong>Rp{{ number_format($produks['harga'], 0, ',', '.') }}</strong>
                                                <button type="button" class="btn btn-primary mt-3" id="pay-button">
                                                    Bayar Sekarang
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>


<script src="{{ asset('landpage/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- jquery -->
<script src=" {{ asset('landpage/jquery/jquery3.7.1.min.js') }}"></script>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function() {
        // SnapToken acquired from previous step
        snap.pay('{{ $transaksi->snap_token }}', {
            // Optional
            onSuccess: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                window.location.href = '{{ route('sukses-transaksi', $transaksi->id) }}';
            },
            // Optional
            onPending: function(result) {
                /* You may add your own js here, this is just example */
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            // Optional
            onError: function(result) {
                /* You may add your own js here, this is just example */
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            }
        });
    };
</script>
{{-- <script type="text/javascript">
    document.getElementById('pay-button').onclick = function() {
        snap.pay('{{ $transaksi->snap_token }}', {
            onSuccess: function(result) {
                console.log(result);
                alert('Payment Success');
                window.location.href = "/payment-success"; // Redirect to a success page
            },
            onPending: function(result) {
                console.log(result);
                alert('Payment Pending');
            },
            onError: function(result) {
                console.log(result);
                alert('Payment Error');
            }
        });
    };
</script> --}}


</html>
