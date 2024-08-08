@extends('layouts.home')

@section('content')
    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords"
                            aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->
    <!-- Hero Start -->
    <div class="container-fluid py-5 mb-5 hero-header"
        style="background-image: url('{{ asset('img/Desain tanpa judul.png') }}');">
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
        <div class="container py-5">
            <img src="" alt="">
            <div class="row g-5 align-items-center">
                <div class="col-md-12 col-lg-7">
                    <h4 class="mb-3 text-secondary">100% Harga Terjangkau</h4>
                    <h1 class="mb-5 display-3">Solusi <strong>Transaksi</strong> Tanpa Ngantri Hanya Di Kantin Digital</h1>
                    <div class="position-relative mx-auto">
                        <a class="btn btn-primary py-3 px-5 display-3 text-white" href="#menu">Belanja</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5" id="menu">
        <div class="text-center mx-auto mb-5" style="max-width: 700px;">
            <h1 class="display-4">Daftar Produk</h1>
            <p>Kantin Digital menyediakan berbagai macam kebutuhan mulai dari makanan, minuman, hingga perlengkapan.</p>
        </div>
        <div class="container py-5">
            <div class="tab-class text-center">
                <div class="row g-4">
                    <div class="col-lg-4 text-start">
                        <h1>Pilih Kategori</h1>
                    </div>
                    <div class="col-lg-8 text-end">
                        <ul class="nav nav-pills d-inline-flex text-center mb-5" id="category-tabs">
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-category="semua"
                                    href="#">
                                    <span class="text-dark" style="width: 130px;">All Products</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex py-2 m-2 bg-light rounded-pill" data-category="makanan" href="#">
                                    <span class="text-dark" style="width: 130px;">Makanan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill" data-category="minuman" href="#">
                                    <span class="text-dark" style="width: 130px;">Minuman</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill" data-category="peralatan" href="#">
                                    <span class="text-dark" style="width: 130px;">Peralatan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content" id="product-list">
                    <!-- Produk akan dimuat di sini oleh AJAX -->
                    @include('partials.product-list', ['menus' => $menu])
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->


    <!-- Banner Section Start-->
    <div class="container-fluid banner bg-secondary my-5">
        <div class="container py-5">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    <div class="py-4">
                        <h1 class="display-3 text-white">Mau Jajan Gapunya Saldo?</h1>
                        <p class="fw-normal display-3 text-dark mb-4">Top Up Disini Aja.</p>
                        <p class="mb-4 text-dark">Kantin Digital memiliki fitur menarik yaitu Top Up dan Tarik Tunai, untuk
                            mempermudah memenuhi kebutuhan kalian</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative">
                        <img src="{{ asset('img/woman.png') }}" class="img-fluid w-100 h-100 rounded" alt="">
                        <div class="d-flex align-items-center justify-content-center bg-white rounded-circle position-absolute"
                            style="width: 180px; height: 180px; top: 0; left: 0;">
                            <a href="{{ route('auth')}}" class="display-3 text-dark">
                                <h3>Klik Disini</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Banner Section End -->


    <!-- Bestsaler Product Start -->
    {{-- <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                <h1 class="display-4">Bestseller Products</h1>
                <p>Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks
                    reasonable.</p>
            </div>
        </div>
    </div> --}}
    <!-- Bestsaler Product End -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to load products based on selected category
            function loadProducts(category) {
                $.ajax({
                    url: '{{ route('search') }}', // Route to handle AJAX request
                    method: 'GET',
                    data: {
                        category: category
                    },
                    success: function(response) {
                        $('#product-list').html(response);
                    }
                });
            }

            // Event handler for tab click
            $('#category-tabs a').on('click', function(e) {
                e.preventDefault();
                $('#category-tabs a').removeClass('active');
                $(this).addClass('active');

                const category = $(this).data('category');
                loadProducts(category);
            });

            // Load all products initially
            loadProducts('semua');
        });
    </script>
@endsection
