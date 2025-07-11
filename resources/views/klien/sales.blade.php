<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Transaksi</title>
    <link rel="stylesheet" href="{{ asset('landpage/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>new menu</title>
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

<body>
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')
        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                    {{ __('SALES') }}
                </h2>
            </div>
        </header>
        <main>
            <div class="content mt-5">
                <div class="container flex-auto">
                    <div class="card p-3">
                        {{-- <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1>Graph</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div id="myPlot" style="width:100%"></div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="card p-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h1>CHART</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="font-semibold text-lg text-gray-800 leading-tight mb-1 ">
                                        Jumlah Pemasukan: Rp{{ number_format($jumlah, 0, ',', '.') }}
                                    </h5>
                                    {{-- <div class="col-md-12">
                                        <canvas id="myCharrt"></canvas>
                                    </div> --}}
                                    <div id="chartContainer" style="overflow-x: auto;">
                                        <canvas id="myCharrt"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card p-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h1>Tiket</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    {{-- @foreach ($tiketSa as $tiket)
                                            <div style="border:1px solid #ccc; padding:10px; margin-bottom:15px;">
                                                <h4>{{ $tiket->name }}</h4>
                                                <p>{{ $tiket->deskripsi }}</p>
                                                <p>Harga: Rp{{ number_format($tiket->harga, 0, ',', '.') }}</p>
                                                <img src="{{ asset('storage/image-tiket/' . $tiket->image) }}"
                                                    style="max-width:200px;">

                                                <h5>Riwayat Pembeli:</h5>
                                                @forelse ($tiket->transaksis as $trx)
                                                    <p>- {{ $trx->user->name ?? 'User tidak ditemukan' }} |
                                                        Rp{{ number_format($trx->harga, 0, ',', '.') }} |
                                                        {{ $trx->created_at->format('Y-m-d') }}</p>
                                                @empty
                                                    <p><em>Belum ada pembelian</em></p>
                                                @endforelse
                                            </div>
                                        @endforeach --}}
                                    @include('klien.tiket')

                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1>Histori Transaksi</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-striped" id="myTable">
                                    @if ($transaki->isEmpty())
                                        <div class="p-3">
                                            <div class="alert alert-danger" role="alert">
                                                Tidak ada data yang tersedia
                                            </div>
                                        </div>
                                    @else
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Pengunjung</th>
                                                <th scope="col">Nama Tiket</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Status Transaksi</th>
                                                <th scope="col">Tanggal Pembelian</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transaki as $transaction)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $transaction->buyer_name }}</td>
                                                    <td>{{ $transaction->product_name }}</td>
                                                    <td>Rp{{ number_format($transaction->harga, 0, ',', '.') }}</td>
                                                    <td>
                                                        @if ($transaction->status == 'pending')
                                                            <span
                                                                class="badge bg-warning text-dark">{{ $transaction->status }}</span>
                                                        @elseif ($transaction->status == 'success')
                                                            <span
                                                                class="badge bg-success">{{ $transaction->status }}</span>
                                                        @else
                                                            <span
                                                                class="badge bg-danger">{{ $transaction->status }}</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $transaction->created_at }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    @endif
                                </table>
                            </div>

                        </div>
                        <div class="text-center mt-3">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center" id="pagination"></ul>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <script src="{{ asset('landpage/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('landpage/jquery/jquery3.7.1.min.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            // Fungsi untuk menghasilkan warna acak HEX
            function getRandomColor() {
                const letters = "0123456789ABCDEF";
                let color = "#";
                for (let i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }

            // Fungsi untuk membuat array warna sebanyak jumlah data
            function generateRandomColors(count) {
                const colors = [];
                for (let i = 0; i < count; i++) {
                    colors.push(getRandomColor());
                }
                return colors;
            }

            const xValues = {!! json_encode($dates) !!};
            const yValues = {!! json_encode($totals) !!}; //total harga
            const barColors = generateRandomColors(yValues.length);
            document.getElementById("myCharrt").style.width = `${yValues.length * 60}px`;

            new Chart("myCharrt", {
                type: "line",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: "HARGA"
                    },
                    animation: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            min: 0,
                            max: 20000, // nilai maksimum tetap
                            ticks: {
                                stepSize: 5000 // jarak antar nilai
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: true
                        }
                    }
                }
            });
        </script>



        {{-- pagination --}}
        <script>
            $(document).ready(function() {
                const rowsPerPage = 15;
                const $table = $('#myTable');
                const $pagination = $('#pagination');
                const $rows = $table.find('tbody tr');
                const rowCount = $rows.length;
                const pageCount = Math.ceil(rowCount / rowsPerPage);

                if (rowCount === 0) {
                    $table.after(
                        '<div class="p-3"><div class="alert alert-warning" role="alert"> Silahkan Cek Kembali!</div></div>'
                    );

                    return;

                }

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
</body>

</html>
