<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Transaksi</title>
    <link rel="stylesheet" href="{{ asset('landpage/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>TRANSAKI</title>
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
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1>Transaksi</h1>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="table-container">
                                        <div class="table-responsive" id="myTable">
                                            @if ($transactions->isEmpty())
                                                <p>Tidak ada transaksi ditemukan.</p>
                                            @else
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>NO</th>
                                                            <th>Produk</th>
                                                            <th>Harga</th>
                                                            <th>Status</th>
                                                            <th>Tanggal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($transactions as $transaction)
                                                            <tr>
                                                                <th scope="row">{{ $loop->iteration }}</th>
                                                                <td>{{ $transaction['product']['nama'] }}</td>
                                                                <td>Rp{{ number_format($transaction['product']['harga'], 0, ',', '.') }}
                                                                </td>
                                                                <td>
                                                                    @if ($transaction['status'] == 'pending')
                                                                        <span
                                                                            class="badge bg-warning text-dark">{{ $transaction['status'] }}</span>
                                                                    @elseif ($transaction['status'] == 'success')
                                                                        <span
                                                                            class="badge bg-success">{{ $transaction['status'] }}</span>
                                                                    @else
                                                                        <span
                                                                            class="badge bg-danger">{{ $transaction['status'] }}</span>
                                                                    @endif
                                                                </td>
                                                                <td>{{ $transaction['created_at'] }}</td>
                                                                <td>
                                                                    @if ($transaction['status'] == 'pending')
                                                                        <form action="{{ route('proses_bayar') }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $transaction['id'] }}">
                                                                            <input type="hidden" name="product_id"
                                                                                value="{{ $transaction['product']['id'] }}">
                                                                            <input type="hidden" name="harga"
                                                                                value="{{ $transaction['product']['harga'] }}">
                                                                        </form>
                                                                        <button class="btn btn-primary"
                                                                            onclick="resumePayment('{{ $transaction['snap_token'] }}', '{{ $transaction['id'] }}')">Bayar</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="6" class="text-center">Tidak ada
                                                                    transaksi</td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination justify-content-center" id="pagination"></ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script src="{{ asset('landpage/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('landpage/jquery/jquery3.7.1.min.js') }}"></script>
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}">
        </script>

        <script type="text/javascript">
            function resumePayment(snapToken, transactionId) {
                if (!snapToken) {
                    alert('No snapToken available. Please try again later.');
                    return;
                }

                snap.pay(snapToken, {
                    onSuccess: function(result) {
                        window.location.href = '{{ route('sukses-transaksi2', ':id') }}'.replace(':id',
                            transactionId);
                    },
                    onPending: function(result) {
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    },
                    onError: function(result) {
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    }
                });
            }
        </script>


        <script>
            $(document).ready(function() {
                const rowsPerPage = 15;
                const $table = $('#myTable');
                const $pagination = $('#pagination');
                const $rows = $table.find('tbody tr');
                const rowCount = $rows.length;
                const pageCount = Math.ceil(rowCount / rowsPerPage);

                if (rowCount === 0) {
                    $table.after('<p>Anda belum melakukan Transaksi.</p>');
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
