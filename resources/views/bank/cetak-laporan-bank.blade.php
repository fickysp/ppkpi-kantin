<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Cetak Laporan Bank</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Laporan Transaksi Bank</b></p>
        <table class="table table-responsive-md table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>User Id</th>
                    <th>Nama User</th>
                    <th>Jumlah</th>
                    <th>Jenis Transaksi</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($acc as $index => $transaction)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $transaction->users_id }}</td>
                        <td>{{ $transaction->user->fullname }}</td>
                        <td> Rp.{{ number_format($transaction->amount) }}</td>
                        <td>{{ $transaction->type }}</td>
                        <td>{{ $transaction->status }}</td>
                        <td>{{ $transaction->created_at->format('d:m:Y') }}</td>
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
