@extends('layouts.user')
@section('content')

    <body>
        <div class="container py-5 mt-5">
        <div class="container-fluid ">
            <div class="card">
                <div class="card-header" style="color:black">
                    <h3 class="font-weight-bold">Laporan Transaksi - {{ $user->fullname }}</h3>
                </div>
                <div class="card-body">
                    <table class="table table-responsive-md table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <td>No</td>
                                <td>Jumlah</td>
                                <td>Tipe</td>
                                <td>Status</td>
                                <td>Jam</td>
                                <td>Tanggal</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksis as $index => $transaksi)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>Rp. {{ number_format($transaksi->amount) }}</td>
                                    <td>{{ $transaksi->type }}</td>
                                    <td>{{ $transaksi->status }}</td>
                                    <td>{{ $transaksi->updated_at->format('H:i:s') }}</td>
                                    <td>{{ $transaksi->updated_at->format('Y-m-d') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="pagination" style="font-size: 14px; margin-bottom: 20px;">
                    {{ $transaksis->links() }}
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection
