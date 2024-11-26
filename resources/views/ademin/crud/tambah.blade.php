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
                    {{ __('TAMBAH TIKET') }}
                </h2>
            </div>
        </header>
        <!-- Page Content -->
        <main>

            <div class="content mt-5">
                <div class="container flex-auto">
                    <div class="card">
                        <div class="card-header"> TAMBAH-TIKET </div>
                        <form action="{{ route('store-tiket') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="card-vody">
                                    <div class="container text-center">
                                        <div class="row justify-content-around">
                                            <div class="col">
                                                <div class="m-3">
                                                    <label for="exampleFormControlInput1" class="form-label">ID
                                                        Tiket</label>
                                                    <input id="string_randomer" maxlength="5" type="text" readonly
                                                        name="id_tiket" class="form-control-plaintext">
                                                    @error('id_tiket')
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="m-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Nama
                                                    </label>
                                                    <input type="text" name="name" class="form-control"
                                                        id="name" placeholder="............">
                                                    @error('name')
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-around">
                                            <div class="col">
                                                <div class="m-3">
                                                    <label for="exampleFormControlInput1"
                                                        class="form-label">HARGA</label>
                                                    <input type="number" name="harga" class="form-control"
                                                        placeholder="0" min="0">
                                                    @error('harga')
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="m-3">
                                                    <label for="formFile" class="form-label">IMAGE</label>
                                                    <input class="form-control" type="file" name="image"
                                                        id="formFile">
                                                </div>

                                                @error('image')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="row justify-content-around">
                                                <div class="col">
                                                    <div class="m-3">
                                                        <label for="user_id" class="form-label">NAMA CLIENT</label>
                                                        <select name="user_id" class="form-select"
                                                            aria-label="Default select example">
                                                            <option value="" disabled selected>Silahkan Pilih
                                                                Client
                                                            </option>
                                                            @foreach ($users as $us)
                                                                <option value="{{ $us->id }}">{{ $us->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('user_id')
                                                            <div class="alert alert-danger" role="alert">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1"
                                                    class="form-label">Deskripsi</label>
                                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                                                @error('deskripsi')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>


<script src="{{ asset('landpage/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- jquery -->
<script src=" {{ asset('landpage/jquery/jquery3.7.1.min.js') }}"></script>
{{-- random string for ID --}}
{{-- <script>
    document.getElementById('string_randomer').value = create_random(5)

    function create_random(string_length) {
        var random_string = '';
        var character = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789abcdefghijklmnopqrstuvwxyz'
        for (var i, i = 0; i < string_length; i++) {
            random_string += character.charAt(Math.floor(Math.random() * character.length))
        }
        return random_string
    }
</script> --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('string_randomer').value = create_random(5);
    });

    function create_random(string_length) {
        var random_string = '';
        var character = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789abcdefghijklmnopqrstuvwxyz';
        for (var i = 0; i < string_length; i++) {
            random_string += character.charAt(Math.floor(Math.random() * character.length));
        }
        return random_string;
    }
</script>


</html>
