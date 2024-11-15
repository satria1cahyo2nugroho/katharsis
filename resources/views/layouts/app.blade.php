<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'ADMIN') }}</title> --}}
    <title>Khatarsis</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('landpage/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>
<footer class="bg-white">
    <div class="container-fluid bg-body-tertiary">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('landpage/assets/KH.png') }}" alt="khatarsis" width="50" height="50" />
                    <span class="text">&copy; KHATARSIS 2024</span>
                </a>

                <span class="navbar-text">
                    <div class="hstack gap-2">
                        <button class="btn">
                            <i class="bi bi-instagram"></i>
                        </button>
                        <div class="vr"></div>
                        <button class="btn">
                            <i class="bi bi-twitter-x"></i>
                        </button>
                        <div class="vr"></div>
                        <button class="btn">
                            <i class="bi bi-facebook"></i>
                        </button>
                        <div class="vr"></div>
                        <button class="btn">
                            <i class="bi bi-whatsapp"></i>
                        </button>
                    </div>
                </span>
            </div>
    </div>
</footer>
<script src="{{ asset('landpage/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- jquery -->
<script src=" {{ asset('landpage/jquery/jquery3.7.1.min.js') }}"></script>

</html>
