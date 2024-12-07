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
                    {{ __('Cetak-Tiket') }}
                </h2>
            </div>
        </header>
        <main>
            <div class="content mt-5">
                <div class="container flex-auto">
                    <div class="card p-3">
                        <div class="card">
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
                        </div>
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
                                    <div class="col-md-12">
                                        <canvas id="myCharrt"></canvas>
                                    </div>
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
                                                Transaksi tidak Ditemukan
                                            </div>
                                        </div>
                                    @else
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama Tiket</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Status Transaksi</th>
                                                <th scope="col">Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transaki as $transaction)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
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
        {{-- plot --}}
        <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
        {{-- plot --}}
        <script>
            const xArray = {!! json_encode($dates) !!};
            const yArray = {!! json_encode($totals) !!};
            // Define Data 
            const data = [{
                x: xArray,
                y: yArray,
                mode: "lines"
            }];
            // Define Layout 
            const layout = {
                xaxis: {
                    title: "Date"
                },
                yaxis: {
                    title: "Total Transaksi (juta rupiah)"
                },
                title: "Sales Over Time"
            };

            // Display using Plotly
            Plotly.newPlot("myPlot", data, layout);
        </script>
        {{-- chart --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

        <script>
            const xValues = {!! json_encode($dates) !!};
            const yValues = {!! json_encode($totals) !!};
            const barColors = ["red", "green", "blue", "orange", "brown"];

            new Chart("myCharrt", {
                type: "bar",
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
                        text: "World Wine Production 2018"
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
