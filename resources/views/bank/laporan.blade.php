@extends('layouts.bank')
@section('content')

    <body>
        <div class="card m-3">
            <div class="card-body table-responsive">
                <h1>Laporan Transaksi</h1>
                <div class="btn btn-primary mb-3">
                    <a href="{{ route('bank') }}" style="color: white; text-decoration: none;">Kembali</a>
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
                                <td>{{ $transaction->amount }}</td>
                                <td>{{ $transaction->type }}</td>
                                <td>{{ $transaction->created_at->format('d:m:Y') }}</td>
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
