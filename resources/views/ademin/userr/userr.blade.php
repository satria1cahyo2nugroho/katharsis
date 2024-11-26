<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('landpage/bootstrap/css/bootstrap.min.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('landpage/costcss/style.css') }}" /> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>USER</title>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')
        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                    {{ __('TIKET') }}
                </h2>
            </div>
        </header>
        <!-- Page Content -->
        <main>
            <div class="content mt-5">
                <div class="container flex-auto">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <a href="{{ route('tambah-user') }}" class="btn btn-primary" type="button">Tambah
                                        user</a>
                                </div>
                                <div class="col"></div>
                                <div class="col"><input class="form-control" id="myInput" type="text"
                                        placeholder="Search.."></div>
                            </div>
                        </div>

                        <div class="card-body">
                            @include('ademin.userr.table')
                        </div>

                    </div>
                </div>
            </div>



        </main>
    </div>
</body>

<script src="{{ asset('landpage/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- <script src="bootstrap/js/bootstrap.js"></script> -->
<!-- jquery -->
<script src=" {{ asset('landpage/jquery/jquery3.7.1.min.js') }}"></script>
{{-- table search --}}
<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

</html>
