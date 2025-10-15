<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('landpage/bootstrap/css/bootstrap.min.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('landpage/costcss/style.css') }}" /> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Banner & Carousel</title>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')
        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                    {{ __('Banner & Carousel') }}
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
                                <div class="col"><a href="{{ route('tambah-banner') }}" class="btn btn-primary"
                                        type="button">Tambah
                                        Banner</a></div>
                                <div class="col"></div>
                                <div class="col"><input class="form-control" id="myInput" type="text"
                                        placeholder="Search.."></div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Judul</th>
                                            <th scope="col">Deskripsi</th>
                                            <th scope="col">Gambar</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        @foreach ($banner as $b)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td style="width:200px;">{{ $b->judul }}</td>
                                                <td style="width:450px;">
                                                    <div
                                                        style="max-height:150px; overflow:auto; text-align:justify; padding-right:5px;">
                                                        {{ $b->deskripsi }}
                                                    </div>
                                                </td>
                                                <td><img src="{{ asset('storage/banner/' . $b->image) }}"
                                                        style="height: 150px; width: 250px;">
                                                </td>
                                                <td style="width: 250px">
                                                    <div class="d-grid gap-2 d-md-block">
                                                        <button class="btn btn-info" data-bs-toggle="modal"
                                                            data-bs-target="#detailModal{{ $b->id }}">
                                                            Detail
                                                        </button>
                                                        <a href="{{ route('banner-edit', ['id' => $b->id]) }}"
                                                            class="btn btn-danger">Edit</a>
                                                        <button class="btn btn-warning" data-bs-toggle="modal"
                                                            data-bs-target="#modalDelete{{ $b->id }}">
                                                            Delete
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- delete modal --}}
                        @foreach ($banner as $b)
                            <div class="modal fade" id="modalDelete{{ $b->id }}" tabindex="-1"
                                aria-labelledby="modalLabel{{ $b->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel{{ $b->id }}">Konfirmasi Hapus
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus banner
                                            <strong>{{ $b->Judul }}</strong>?
                                        </div>

                                        <div class="modal-footer">
                                            <form action="{{ route('banner-delete', $b->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">
                                                    Tidak
                                                </button>
                                                <button type="submit" class="btn btn-danger">
                                                    Ya, hapus
                                                </button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- detail modal --}}
                        @foreach ($banner as $b)
                            <div class="modal fade" id="detailModal{{ $b->id }}" tabindex="-1"
                                aria-labelledby="detailModalLabel{{ $b->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h4 class="modal-title fw-bold text-dark"
                                                id="detailModalLabel{{ $b->id }}">
                                                Detail Banner
                                            </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body px-4">

                                            {{-- Judul --}}
                                            <h6 class="fw-bold text-dark mb-3">
                                                {{ $b->judul }}
                                            </h6>
                                            <hr>

                                            {{-- Deskripsi --}}
                                            <p class="fs-5 text-justify" style="text-align: justify;">
                                                {{ $b->deskripsi }}
                                            </p>
                                            <hr>

                                            {{-- Gambar --}}
                                            <div class="text-center">
                                                <img src="{{ asset('storage/banner/' . $b->image) }}"
                                                    alt="{{ $b->judul }}" class="img-fluid rounded shadow-sm"
                                                    style="max-height: 400px;">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
