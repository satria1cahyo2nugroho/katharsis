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
                                        <div class="card card-body">
                                            <div
                                                class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <img src="{{ asset('storage/image-tiket/' . $tikets->image) }}"
                                                        class="img-thumbnail" style="height: 500px; width: 600px;"
                                                        alt="...">
                                                </div>


                                                <div class="media-body mt-3">
                                                    <h5 class="font-semibold text-lg text-gray-800 leading-tight mb-1 ">
                                                        {{ __($tikets->name) }}
                                                    </h5>

                                                    <p class="mb-3">{{ __($tikets->deskripsi) }}</p>
                                                </div>

                                                <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                                                    <h5 class="font-semibold text-lg text-gray-800 leading-tight mb-1 ">
                                                        {{ __('RP.') }} {{ __($tikets->harga) }}
                                                    </h5>
                                                    <a type="button" class="btn btn-primary mt-4 text-white"><span><i
                                                                class="bi bi-bag"></span></i> BELI</a>
                                                </div>
                                            </div>
                                        </div>
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
                                                                {{ __('KHATARSIS') }}
                                                            </h5>
                                                            <footer class="blockquote-footer mt-2">Range <cite
                                                                    title="Source Title">54Hz+</cite></footer>
                                                        </blockquote>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container p-2 mb-3">
                                                <div class="row row-cols-4">
                                                    @foreach ($tikett as $item)
                                                        <div class="col mb-2">
                                                            <div class="card" style="width: 18rem;">
                                                                <img src="{{ asset('storage/image-tiket/' . $item->image) }}"
                                                                    class="card-img-top"
                                                                    style="height: 200px; width: 200px;">
                                                                <div class="card-body">
                                                                    <h2
                                                                        class="font-semibold text-xl text-gray-800 leading-tight ">
                                                                        {{ __($item->name) }}
                                                                    </h2>
                                                                    <h5
                                                                        class="font-semibold text-lg text-gray-800 leading-tight mb-1 ">
                                                                        {{ __('RP.') }} {{ __($item->harga) }}
                                                                    </h5>
                                                                    {{-- <p class="card-text mb-1">{{ $item->deskripsi }}</p> --}}
                                                                    <a href="{{ route('tiket-beli', ['id' => $item->id]) }}"
                                                                        class="btn btn-primary">BELI TIKET
                                                                        <span><i class="bi bi-bag"></span></i></a>
                                                                    <a href="#" type="button"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#Modal{{ $item->id }}"
                                                                        class="btn btn-primary">Deskripsi <span><i
                                                                                class="bi bi-receipt-cutoff"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="Modal{{ $item->id }}"
                                                            tabindex="-1" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5"
                                                                            id="exampleModalLabel">Deskripsi Tiket</h1>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p><b>{{ $item->deskripsi }}</b></p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
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
