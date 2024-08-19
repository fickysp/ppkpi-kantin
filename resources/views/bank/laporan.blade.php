@extends('layouts.bank')
@section('content')

    <body>
        <div class="card m-3">
            <div class="card-body table-responsive">
                <h1>Laporan Transaksi</h1>
                <div class="card-tools mb-2">
                    <div class="col-md-12 d-flex justify-content-between">
                        <a href="{{ route('bank') }}" class="btn btn-success"
                            style="color: white; text-decoration: none;">Kembali</a>
                        <a href="{{ route('cetak.laporan.bank') }}" target="_blank" class="btn btn-primary"><i
                                class="fas fa-print"></i> Cetak Laporan</a>
                    </div>
                </div>


                <table class="table table-sm table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>User Id</th>
                            <th>Nama User</th>
                            <th>Jumlah</th>
                            <th>Jenis Transaksi</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($acc as $index => $transaction)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $transaction->users_id }}</td>
                                <td>{{ $transaction->user->fullname }}</td>
                                <td> Rp. {{ number_format($transaction->amount) }}</td>
                                <td>{{ $transaction->type }}</td>
                                <td>{{ $transaction->created_at->format('d-m-Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination" style="font-size: 14px; margin-bottom: 20px;">
                {{ $acc->links() }}
            </div>
        </div>

    </body>
@endsection
