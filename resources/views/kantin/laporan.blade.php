@extends('layouts.kantin')
@section('content')

    <body>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="color:black">
                    <h3 class="font-weight-bold">Laporan Kantin</h3>
                </div>
                <div class="card-body">
                    <table class="table table-responsive-md table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <td>No</td>
                                <td>User Id</td>
                                <td>Invoice</td>
                                <td>Total Harga</td>
                                <td>Status</td>
                                <td>Tanggal</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan as $index => $pesanan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $pesanan->user_id}}</td>
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
                    {{ $laporan->links() }}
                </div>
            </div>
        </div>
    </body>
@endsection
