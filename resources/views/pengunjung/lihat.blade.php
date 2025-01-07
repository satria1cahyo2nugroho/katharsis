<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('landpage/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('landpage/costcss/style.css') }}" /> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>DETAIL TRANSAKI</title>
    <style>
        .table-container {
            min-height: 500px;
            /* Adjust this value based on your design */
        }

        .pagination-container {
            margin-top: 20px;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')
        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                    {{ __('Cetak-Tiket') }}
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
                                <div class="col-md-12">
                                    <h1>CETAK-TIKET</h1>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="table-container">
                                        <div class="table-responsive" id="myTable">

                                            @if ($tiket_lihat->isEmpty())
                                                <p>Tidak ada transaksi ditemukan.</p>
                                            @else
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>NO</th>
                                                            <th>Produk</th>
                                                            <th>Harga</th>
                                                            <th>Status</th>
                                                            <th>Cetak Tiket</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($tiket_lihat as $index => $transaction)
                                                            <tr>
                                                                <th scope="row">{{ $index + 1 }}</th>
                                                                <td>{{ $transaction->nama }}</td>
                                                                <td>Rp{{ number_format($transaction->harga, 0, ',', '.') }}
                                                                </td>
                                                                <td>
                                                                    @if ($transaction->status == 'pending')
                                                                        <span
                                                                            class="badge bg-warning text-dark">{{ $transaction->status }}</span>
                                                                    @elseif($transaction->status == 'success')
                                                                        <span
                                                                            class="badge bg-success">{{ $transaction->status }}</span>
                                                                    @else
                                                                        <span
                                                                            class="badge bg-danger">{{ $transaction->status }}</span>
                                                                    @endif
                                                                </td>
                                                                <td> <a href="{{ route('pdf', ['id' => $transaction->id]) }}"
                                                                        class="btn btn-primary">CETAK-TIKET</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination justify-content-center" id="pagination">
                                            </ul>
                                        </nav>
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
{{-- pagination --}}
<script>
    $(document).ready(function() {
        const rowsPerPage = 12;
        const $table = $('#myTable');
        const $pagination = $('#pagination');
        const $rows = $table.find('tbody tr');
        const rowCount = $rows.length;
        const pageCount = Math.ceil(rowCount / rowsPerPage);
        $pagination.empty();
        for (let i = 1; i <= pageCount; i++) {
            $pagination.append(`<li class="page-item"><a class="page-link" href="#">${i}</a></li>`);
        }
        $pagination.on('click', 'a', function(e) {
            e.preventDefault();
            const pageNum = parseInt($(this).text(), 10);
            showPage(pageNum);
        });

        function showPage(pageNum) {
            $rows.hide();
            const start = (pageNum - 1) * rowsPerPage;
            const end = start + rowsPerPage;
            $rows.slice(start, end).show();
            $pagination.find('li').removeClass('active');
            $pagination.find(`a:contains(${pageNum})`).parent().addClass('active');
        }
        showPage(1);
    });
</script>

</html>
