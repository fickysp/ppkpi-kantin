@extends('layouts.kantin')
@section('content')

    <body style="background: lightgray;">

        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <form action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label class="font-weight-bold">GAMBAR</label></br>
                                    <img src="{{ asset('/storage/menus/' . $menu->image) }}" alt=""
                                        style="width: 150px;">
                                    <input type="file" class="form-control" name="image">
                                </div>

                                <div class="form-group mt-2">
                                    <label class="font-weight-bold">NAMA</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name', $menu->name) }}"
                                        placeholder="Masukkan Nama menu">
                                    <!-- error message untuk title -->

                                    @error('name')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group mt-2">
                                    <label class="font-weight-bold">HARGA</label>
                                    <input type="text" class="form-control @error('harga') is-invalid @enderror"
                                        name="harga" rows="5"
                                        placeholder="Masukkan Harga">{{ old('harga') }}</input>
                                    <!-- error message untuk harga -->
                                    @error('harga')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <label class="font-weight-bold">STOK</label>
                                    <input type="text" class="form-control @error('stok') is-invalid @enderror"
                                        name="stok" rows="5"
                                        placeholder="Masukkan stok">{{ old('stok') }}</input>
                                    <!-- error message untuk stok -->
                                    @error('stok')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <label class="font-weight-bold">KATEGORI</label>
                                    <select class="form-control @error('kategori') is-invalid @enderror" name="kategori"
                                        id="kategori">
                                        <option value="makanan">Makanan</option>
                                        <option value="makanan">Minuman</option>
                                        <option value="peralatan">Peralatan</option>
                                    </select>
                                    <!-- error message untuk harga -->
                                    @error('desc')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="button mt-2">
                                    <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                                    <button type="reset" class="btn btn-md btn-warning">RESET</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    </body>
@endsection
