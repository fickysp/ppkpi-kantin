@extends('layouts.user')

@section('content')
<div class="container-fluid" style="color: black">
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <ul>
            <li>{{ Session::get('success') }}</li>
        </ul>
    </div>
    @endif
    <h2 class="font-weight-bold mb-4">MENU KANTIN</h2>
    <div class="row mt-2">
        @foreach ($menus as $menu)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card shadow-sm">
                <img src="{{ asset('/storage/menus/' . $menu->image) }}" class="card-img-top" alt="{{ $menu->name }}" style="height: 200px; padding: 5px;">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">{{ $menu->name }}</h5>
                    <p class="card-text">Harga: Rp. {{ number_format($menu->harga) }}</p>
                    <p class="card-text">Stok: {{ $menu->stok }}</p>

                    <form action="{{ route('pesan') }}" method="post">
                        @csrf
                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                        <div class="form-group">
                            <input type="number" class="form-control" name="quantity" placeholder="Jumlah Pesanan" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-cart-plus"></i> Pesan</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection