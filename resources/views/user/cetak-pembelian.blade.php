<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Cetak Laporan Transaksi</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Laporan Transaksi Pembelian Kantin</b></p>
        <ul style="list-style: none">
            <li><b>Username :</b> {{ $user->fullname }}</li>
            <li><b>Email :</b> {{ $user->email }}</li>
            <li><b>Phone Number :</b> {{ $user->no_hp }}</li>
        </ul>
        <table class="table table-responsive-md table-bordered">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Invoice</td>
                    <td>Total Harga</td>
                    <td>Status</td>
                    <td>Jam</td>
                    <td>Tanggal</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($historiPesanan as $index => $pesanan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $pesanan->invoice }}</td>
                        <td>Rp. {{ number_format($pesanan->total_price) }}</td>
                        <td>{{ $pesanan->status }}</td>
                        <td>{{ $pesanan->created_at->format('H:i:s') }}</td>
                        <td>{{ $pesanan->created_at->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
