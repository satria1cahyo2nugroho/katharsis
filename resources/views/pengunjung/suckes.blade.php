<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Detail Transaksi</title>

    <!-- Bootstrap & Icons -->
    <link rel="stylesheet" href="{{ asset('landpage/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    <!-- App CSS via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-light">
    <div class="min-vh-100">
        @include('layouts.navigation')

        <!-- Page Header -->
        <header class="bg-white shadow-sm mb-4">
            <div class="container py-4">
                <h2 class="text-xl fw-semibold text-dark">{{ __('Transaksi') }}</h2>
            </div>
        </header>

        <!-- Main Content -->
        <main>
            <div class="container">
                <div class="card mx-auto shadow-sm mb-5" style="max-width: 600px;">
                    <div class="card-header text-center fw-bold bg-white">Status Pembayaran</div>
                    <div class="card-body text-center">
                        <h3 class="text-success mb-2">Pembayaran Berhasil</h3>
                        <p class="text-muted">Terima kasih telah melakukan pembayaran</p>
                        <a href="{{ route('transaksi') }}" class="btn btn-primary mt-3">
                            <i class="bi bi-card-checklist me-1"></i> Lihat Transaksi
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('landpage/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landpage/jquery/jquery3.7.1.min.js') }}"></script>
</body>

</html>
