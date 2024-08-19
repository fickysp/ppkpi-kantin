@extends('layouts.bank')
@section('content')

    <body>
        <div class="card m-3">
            <div class="card-body">
                <h2>Dashboard Bank - Transaksi</h2>
                @if (count($acc) > 0)
                    <p>Permintaan persetujuan transaksi</p>

                    <table class="table table-sm">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Id User</th>
                                <th>Nama User</th>
                                <th>Jumlah</th>
                                <th>Jenis Transaksi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($acc as $index => $transaksi)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $transaksi->users_id }}</td>
                                    <td>{{ $transaksi->user->fullname }}</td>
                                    <td> Rp. {{ number_format($transaksi->amount) }}</td>
                                    <td> {{ $transaksi->type }}</td>
                                    <td> {{ $transaksi->status }}</td>
                                    <td>
                                        <form action="{{ route('acc.transaksi', ['id' => $transaksi->id]) }}" method="post"
                                            style="display: inline;">
                                            @csrf
                                            <button class="btn btn-primary" type="submit">Konfirmasi</button>
                                        </form>


                                        <form action="{{ route('hapus.transaksi', ['id' => $transaksi->id]) }}"
                                            method="post" style="display: inline;">
                                            @csrf
                                            <button class="btn btn-danger" type="submit"
                                                onclick="return confirm('Yakin Ingin Menolak?')">Tolak</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination" style="font-size: 14px; margin-bottom: 20px;">
                        {{ $acc->links() }}
                    </div>
                @else
                    <p>Tidak ada permintaan top-up yang menunggu persetujuan.</p>
                @endif
            </div>
        </div>
    </body>
@endsection
