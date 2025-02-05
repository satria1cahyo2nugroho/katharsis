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
    <title>EDIT-TIKET</title>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')
        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                    {{ __('EDIT TIKET') }}
                </h2>
            </div>
        </header>
        <!-- Page Content -->
        <main>

            <div class="content mt-5">
                <div class="container flex-auto">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('tiket-view') }}" class="btn btn-primary" type="button">Kembali</a>
                        </div>
                        <form action="{{ route('tiket-update', ['id' => $tiket->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="card-body">
                                    <div class="container text-center">
                                        <div class="row justify-content-around">
                                            <div class="col">
                                                <div class="m-3">
                                                    <label for="exampleFormControlInput1" class="form-label">ID
                                                        Tiket</label>
                                                    <input value="{{ $tiket->id_tiket }}" maxlength="5" type="text"
                                                        readonly name="id_tiket" class="form-control-plaintext">
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
                                                    <input value="{{ $tiket->name }}" type="text" name="name"
                                                        class="form-control" id="name" placeholder="............">
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
                                                    <input type="number" value="{{ $tiket->harga }}" name="harga"
                                                        class="form-control" placeholder="0" min="0">
                                                    @error('harga')
                                                        <<div class="alert alert-danger" role="alert">
                                                            {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="m-3">
                                                <label for="formFile" class="form-label">IMAGE</label>
                                                <input class="form-control" value="{{ $tiket->image }}" type="file"
                                                    name="image" id="formFile" onchange="previewImage(event)">
                                                @error('image')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="container text-center">
                                            <div class="row">
                                                <div class="col">
                                                    <label class="form-label">IMAGE</label>
                                                    <img src="{{ asset('storage/image-tiket/' . $tiket->image) }}"
                                                        class="rounded img-thumbnail mx-auto d-block " width="320"
                                                        alt="...">
                                                </div>
                                                <div class="col">
                                                    <label class="form-label">PREVIEW IMAGE</label>
                                                    <div class="text-center mt-3" id="imagePreviewContainer"
                                                        style="display: none;"> <img id="imagePreview"
                                                            class="rounded img-thumbnail mx-auto d-block" width="320"
                                                            height="320" alt="Image Preview"> </div>
                                                </div>

                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1"
                                                    class="form-label">Deskripsi</label>
                                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ $tiket->deskripsi }}</textarea>
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
                                    <button type="submit" class="btn btn-primary">Update tiket</button>
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
{{-- image  preview --}}
<script>
    function previewImage(event) {
        var file = event.target.files[0];
        var reader = new FileReader();

        reader.onload = function() {
            var output = document.getElementById('imagePreview');
            output.src = reader.result;
            document.getElementById('imagePreviewContainer').style.display =
                'block';
            output.style.width =
                '320px';
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>


</html>
