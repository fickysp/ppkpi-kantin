@extends('layouts.kantin')
@section('content')

    <body>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="color:black">
                    <h3 class="font-weight-bold">Laporan Kantin</h3>
                    <div class="card-tools" align="right">
                        <a href="{{ route('cetak.laporan.kantin') }}" target="_blank" class="btn btn-primary"><i
                                class="fas fa-print"></i> Cetak Laporan
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-responsive-md table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <td>No</td>
                                <td>Nama Pembeli</td>
                                <td>Invoice</td>
                                <td>Total Harga</td>
                                <td>Status</td>
                                <td>Jam</td>
                                <td>Tanggal</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan as $index => $pesanan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $pesanan->user->fullname }}</td>
                                    <td>{{ $pesanan->invoice }}</td>
                                    <td>Rp. {{ number_format($pesanan->total_price) }}</td>
                                    <td>{{ $pesanan->status }}</td>
                                    <td>{{ $pesanan->created_at->format('H:i:s') }}</td>
                                    <td>{{ $pesanan->created_at->format('d-m-Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="pagination" style="font-size: 14px; margin-bottom: 20px;">
                    {{ $laporan->links() }}
                </div>
            </div>
        </div>
    </body>
@endsection
