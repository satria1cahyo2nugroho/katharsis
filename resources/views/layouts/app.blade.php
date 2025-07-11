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
    {{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@heroicons/vue@2.0.13/24/outline/index.js"></script>

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
<footer class="bg-white border-top shadow-sm mt-5">
    <div class="container py-4 d-flex flex-column flex-lg-row justify-content-between align-items-center">
        <!-- Branding -->
        <div class="d-flex align-items-center mb-3 mb-lg-0">
            <img src="{{ asset('landpage/assets/KH.png') }}" alt="Khatarsis Logo" width="50" height="50"
                class="me-2">
            <span class="text-muted fw-semibold">&copy; KHATARSIS 2024</span>
        </div>

        <!-- Social Media Icons -->
        <div class="d-flex gap-3">
            <a href="#" class="text-secondary fs-4 hover-opacity" aria-label="Instagram">
                <i class="bi bi-instagram"></i>
            </a>
            <a href="#" class="text-secondary fs-4 hover-opacity" aria-label="Twitter X">
                <i class="bi bi-twitter-x"></i>
            </a>
            <a href="#" class="text-secondary fs-4 hover-opacity" aria-label="Facebook">
                <i class="bi bi-facebook"></i>
            </a>
            <a href="#" class="text-secondary fs-4 hover-opacity" aria-label="WhatsApp">
                <i class="bi bi-whatsapp"></i>
            </a>
        </div>
    </div>
</footer>
<script src="{{ asset('landpage/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- jquery -->
<script src=" {{ asset('landpage/jquery/jquery3.7.1.min.js') }}"></script>

</html>
