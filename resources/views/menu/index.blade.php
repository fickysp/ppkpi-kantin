@extends('layouts.kantin')
@section('content')

    <body style="background: lightgray;">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <hr>
                    </div>
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <a href="{{ route('menu.create') }}" class="btn btn-md btn-success mb-3">Tambah Barang</a>
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">GAMBAR</th>
                                        <th scope="col">NAMA</th>
                                        <th scope="col">HARGA</th>
                                        <th scope="col">STOK</th>
                                        <th scope="col">KATEGORI</th>
                                        <th scope="col">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($menus as $menu)
                                        <tr>
                                            <td class="text-center">
                                                <img src="{{ asset('/storage/menus/' . $menu->image) }}" class="rounded"
                                                    style="width: 150px;">
                                            </td>
                                            <td>{{ $menu->name }}</td>
                                            <td>Rp. {{ number_format($menu->harga) }}</td>
                                            <td>{{ $menu->stok }}</td>
                                            <td>{{ $menu->kategori }}</td>
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?')"
                                                    action="{{ route('menu.destroy', $menu->id) }}" method="POST">
                                                    <a href="{{ route('menu.edit', $menu->id) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="alert alert-danger">
                                            Data Post Belum Tersedia
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $menus->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    </body>

    </html>
@endsection
