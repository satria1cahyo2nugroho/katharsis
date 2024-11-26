<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('landpage/bootstrap/css/bootstrap.min.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('landpage/summernote/summernote-bs5.css') }}" /> --}}
    {{-- <script src=" {{ asset('landpage/summernote/summernote-bs5.js') }}"></script> --}}
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
                                        <div class="col">
                                            <div class="card-body">
                                                <img src="{{ asset('storage/image-tiket/' . $tikets->image) }}"
                                                    class="img-thumbnail" alt="...">
                                            </div>

                                        </div>
                                        <div class="col">
                                            {{ $tikets->name }}
                                        </div>
                                        <div class="col">
                                            Column
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
