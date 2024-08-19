@extends('layouts.kantin')
@section('content')

    <body>
        <div class="container-fluid">
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
            <div class="row mb-2">
                <div class="col-xl-3 col-md-6">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Jumlah Menu</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahMenu }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Jumlah Siswa</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahSiswa }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr> {{-- batas --}}

            <h2 class="font-weight-bold mt-4" style="color:black">Daftar Menu</h2>
            <div class="row mt-2">
                @foreach ($menu as $menus)
                    <div class="card col-md-3 m-2 mb-4 shadow">
                        <div class="card card-img mt-3">
                            <img src="{{ asset('/storage/menus/' . $menus->image) }}" height="150px">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">{{ $menus->name }}</h5>
                            <p class="card-text">Harga : Rp.{{ number_format($menus->harga) }}</p>
                            <p class="card-text">Stok : {{ $menus->stok }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
@endsection
