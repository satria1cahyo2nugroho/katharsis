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

        .message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            display: none;
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
                        <div class="card-header">
                            SCAN QR CODEs
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div id="reader" width="700px"></div>
                                </div>
                                <div class="col-8">
                                    <table class="table table-striped" id="myTable">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama Tiket</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Tanggal Cek</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Data will be populated by AJAX -->
                                        </tbody>
                                    </table>
                                    <div id="messageBox" class="message"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </main>

        <script src="{{ asset('landpage/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('landpage/jquery/jquery3.7.1.min.js') }}"></script>
        <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
        <script>
            function onScanSuccess(decodedText, decodedResult) {
                let jsonData;
                try {
                    jsonData = JSON.parse(decodedText);
                } catch (error) {
                    console.error('Invalid JSON', error);
                    return;
                }

                $.ajax({
                    url: '{{ route('validasi') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        data: jsonData
                    },
                    success: function(response) {
                        let messageBox = $('#messageBox');
                        messageBox.removeClass('alert-success alert-danger');
                        if (response.success) {
                            messageBox.addClass('alert alert-success');
                            messageBox.text(response.message);
                        } else {
                            messageBox.addClass('alert alert-danger');
                            messageBox.text(response.message);
                        }
                        messageBox.show();
                        loadData(); // Load updated data
                    },
                    error: function(error) {
                        console.error('AJAX error:', error);
                    }
                });
            }

            function onScanFailure(error) {
                console.warn(`Code scan error = ${error}`);
            }

            function loadData() {
                $.ajax({
                    url: '{{ route('getData') }}', // Route to fetch data
                    method: 'GET',
                    success: function(response) {
                        let tbody = $('#myTable tbody');
                        tbody.empty(); // Clear existing data
                        if (response.data.length) {
                            $.each(response.data, function(index, item) {
                                // Format the date
                                let date = new Date(item.updated_at).toLocaleDateString('id-ID');

                                tbody.append(`
                        <tr>
                            <th scope="row">${index + 1}</th>
                            <td>${item.nama}</td>
                            <td>Rp${item.harga.toLocaleString('id-ID')}</td>
                            <td>${date}</td>
                        </tr>
                    `);
                            });
                        } else {
                            tbody.append(`
                    <tr>
                        <td colspan="4" class="text-center">Transaksi tidak Ditemukan</td>
                    </tr>
                `);
                        }
                    },
                    error: function(error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }


            $(document).ready(function() {
                let html5QrcodeScanner = new Html5QrcodeScanner(
                    "reader", {
                        fps: 10,
                        qrbox: {
                            width: 250,
                            height: 250
                        }
                    },
                    false);

                $('#reader__dashboard_section_csr').remove();
                $('#reader__dashboard_section_swaplink').remove();

                html5QrcodeScanner.render(onScanSuccess, onScanFailure);
                loadData(); // Initial data load
            });
        </script>

</body>

</html>
