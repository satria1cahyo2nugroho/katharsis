<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Concert Ticket</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .ticket {
            border: 2px dashed #ccc;
            padding: 20px;
            border-radius: 15px;
            background: #f9f9f9;
            max-width: 800px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            page-break-inside: avoid;
        }

        .ticket-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #ccc;
            padding-bottom: 10px;
        }

        .ticket-logo img {
            max-height: 50px;
        }

        .event {
            font-size: 1.75em;
            font-weight: bold;
            color: #333;
            text-align: center;
            width: 100%;
        }

        .details {
            font-size: 1.2em;
            color: #555;
            text-align: center;
        }

        .ticket-info {
            margin-top: 15px;
            text-align: center;
        }

        .qr-code-container img {
            max-width: 250px;
            height: auto;
            display: block;
            margin: auto;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="ticket mx-auto p-3">
            <div class="ticket-header row">
                <div class="ticket-logo col-md-4 text-center">
                    <img
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('landpage/assets/logo2.png'))) }}">
                </div>
                <div class="event col-md-4">{{ $transaksi->nama }}</div>
                <div class="ticket-id col-md-4 text-right">
                    <small>Ticket ID: {{ $transaksi->tiket_id }}</small>
                </div>
            </div>
            <div class="details mt-3">Price: Rp {{ number_format($transaksi->harga, 0, ',', '.') }}</div>
            <div class="details">Status: {{ $transaksi->status }}</div>
            <div class="qr-code-container row mt-3 justify-content-center">
                <div class="col-md-4 text-center">
                    <img src="data:image/png;base64, {{ $qrCode }}">
                </div>
            </div>
            <div class="ticket-info mt-3">
                <div class="details">Issued on: {{ $transaksi->created_at }}</div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
