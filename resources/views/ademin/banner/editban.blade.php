<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('landpage/bootstrap/css/bootstrap.min.css') }}" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>EDIT-BANNER</title>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')
        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                    {{ __('EDIT Banner') }}
                </h2>
            </div>
        </header>
        <!-- Page Content -->
        <main>
            <div class="content mt-5">
                <div class="container flex-auto">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('banner-view') }}" class="btn btn-primary" type="button">Kembali</a>
                        </div>
                        <form action="{{ route('banner-update', ['id' => $bannerr->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="card-body">
                                    <div class="container text-center">
                                        <div class="row justify-content-around">
                                            <div class="col">
                                                <div class="m-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Judul
                                                    </label>
                                                    <input value="{{ $bannerr->judul }}" type="text" name="judul"
                                                        class="form-control" id="judul" placeholder="............">
                                                    @error('judul')
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="m-3">
                                                <label for="formFile" class="form-label">IMAGE</label>
                                                <input class="form-control" value="{{ $bannerr->image }}" type="file"
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
                                                    <img src="{{ asset('storage/banner/' . $bannerr->image) }}"
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
                                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ $bannerr->deskripsi }}</textarea>
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
                                    <button type="submit" class="btn btn-primary">Update banner</button>
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
