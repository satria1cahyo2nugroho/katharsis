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
    <title>TIKET</title>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')
        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                    {{ __('DETAIL TIKET') }}
                </h2>
            </div>
        </header>
        <!-- Page Content -->
        <main>
            <div class="content mt-5">
                <div class="container flex-auto">
                    <div class="card">
                        <div class="card-header"> DETAIL TIKET </div>
                        <div class="form-group">
                            <div class="card-vody">
                                <div class="container text-center">
                                    <div class="row">
                                        <form action="{{ route('proses_bayar') }}" method="POST" class="my-5">
                                            @csrf
                                            <div class="card shadow-sm border-0">
                                                <div class="card-body">
                                                    <div class="row align-items-center g-4">
                                                        <!-- Gambar Tiket -->
                                                        <div class="col-lg-6 text-center">
                                                            <img src="{{ asset('storage/image-tiket/' . $tikets->image) }}"
                                                                alt="{{ $tikets->name }}"
                                                                class="img-fluid rounded shadow-sm"
                                                                style="max-height: 400px; object-fit: cover;">
                                                        </div>

                                                        <!-- Informasi Tiket -->
                                                        <div class="col-lg-6">
                                                            <h3 class="fw-bold mb-3 text-primary">{{ $tikets->name }}
                                                            </h3>
                                                            <p class="text-muted mb-4">{{ $tikets->deskripsi }}</p>

                                                            <h4 class="text-success mb-3">
                                                                Rp {{ number_format($tikets->harga, 0, ',', '.') }}
                                                            </h4>

                                                            <button type="submit"
                                                                class="btn btn-primary btn-lg rounded-pill w-100">
                                                                <i class="bi bi-bag me-2"></i> Beli Tiket
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Hidden Data -->
                                            <input type="hidden" name="produk_id" value="{{ $tikets->id }}">
                                            <input type="hidden" name="harga" value="{{ $tikets->harga }}">
                                        </form>




                                        <div class="card-body">
                                            <div class="container p-3">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5
                                                            class="font-semibold text-lg text-gray-800 leading-tight mb-1 ">
                                                            {{ __('Khatarsis') }}
                                                        </h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <blockquote class="blockquote m-2">
                                                            <h5
                                                                class="font-semibold text-lg text-gray-800 leading-tight mb-1 ">
                                                                {{ __('TIKET LAINNYA') }}
                                                            </h5>
                                                            <footer class="blockquote-footer mt-2">Range <cite
                                                                    title="Source Title">54Hz+</cite></footer>
                                                        </blockquote>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container my-5">
                                                <div
                                                    class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                                                    @foreach ($tikett as $item)
                                                        <div class="col">
                                                            <div class="card h-100 shadow-sm border-0">
                                                                <img src="{{ asset('storage/image-tiket/' . $item->image) }}"
                                                                    alt="{{ $item->name }}"
                                                                    class="card-img-top img-fluid rounded-top"
                                                                    style="object-fit: cover; height: 220px;">
                                                                <div class="card-body text-center">
                                                                    <h5 class="fw-bold mb-2">{{ $item->name }}</h5>
                                                                    <h6 class="text-muted mb-3">Rp
                                                                        {{ number_format($item->harga, 0, ',', '.') }}
                                                                    </h6>
                                                                    <div class="d-grid gap-2">
                                                                        <a href="{{ route('tiket-beli', ['id' => $item->id]) }}"
                                                                            class="btn btn-primary">
                                                                            <i class="bi bi-bag me-1"></i> Beli Tiket
                                                                        </a>
                                                                        <button type="button"
                                                                            class="btn btn-outline-secondary"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#Modal{{ $item->id }}">
                                                                            <i class="bi bi-receipt-cutoff me-1"></i>
                                                                            Deskripsi
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Modal Deskripsi -->
                                                        <div class="modal fade" id="Modal{{ $item->id }}"
                                                            tabindex="-1" aria-labelledby="Label{{ $item->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="Label{{ $item->id }}">Deskripsi
                                                                            Tiket</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Tutup"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>{{ $item->deskripsi }}</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Tutup</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
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

</html>
