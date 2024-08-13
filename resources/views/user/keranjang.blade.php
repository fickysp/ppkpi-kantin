@extends('layouts.user')
@section('content')

    <body>
        <div class="container py-5 mt-5">
            <div class="card">
                <div class="card-body" style="color: black;">
                    <div class="btn btn-secondary mb-1">
                        <a href="{{ route('account.show', ['id' => Auth::id()]) }}"
                            style="color: white; text-decoration: none;">Kembali</a>
                    </div>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <ul>
                                <li>{{ Session::get('success') }}</li>
                            </ul>
                        </div>
                    @endif
                    <h2 class="mt-3">Barang yang Dipilih</h2>
                    @if (isset($pesanan[0]))
                        <h5>Invoice: {{ $pesanan[0]->invoice }}</h5>
                    @endif
                    <table class="table table-bordered  table-sm">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Pesanan</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalHarga = 0;
                            @endphp

                            @forelse ($pesanan as $index => $pesan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $pesan->menu->name }}</td>
                                    <td>{{ $pesan->quantity }}</td>
                                    <td>Rp{{ number_format($pesan->total_price) }}</td>
                                    <td>
                                        <form action="{{ route('hapus.pesanan', ['id' => $pesan->id]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                    $totalHarga += $pesan->total_price;
                                @endphp
                            @empty
                                <tr>
                                    <td colspan="4">Tidak ada pesanan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <h5>Total Harga: Rp{{ number_format($totalHarga) }}</h5>

                    <form action="{{ route('beli') }}" method="post">
                        @csrf
                        @foreach ($pesanan as $pesan)
                            <input type="hidden" name="pesanan_id[]" value="{{ $pesan->id }}">
                        @endforeach
                        <button type="submit" class="btn btn-success">Beli</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
@endsection
