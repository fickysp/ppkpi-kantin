@extends('layouts.user')
@section('content')

    <body>
        <div class="container py-5 mt-5">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="color:black">
                    <h3 class="font-weight-bold">Laporan Kantin - {{ $user->fullname }}</h3>
                </div>
                <div class="card-body">
                    <table class="table table-responsive-md table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <td>No</td>
                                <td>Invoice</td>
                                <td>Total Harga</td>
                                <td>Status</td>
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
                                    <td>{{ $pesanan->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="pagination" style="font-size: 14px; margin-bottom: 20px;">
                    {{ $historiPesanan->links() }}
                </div>
            </div>
        </div>
        </div>
    </body>
@endsection
