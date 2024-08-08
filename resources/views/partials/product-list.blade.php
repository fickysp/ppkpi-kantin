<!-- resources/views/partials/product-list.blade.php -->
<div class="row g-4">
    @foreach ($menus as $menu)
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="rounded position-relative fruite-item">
                <div class="fruite-img">
                    <img src="{{ asset('/storage/menus/' . $menu->image) }}" class="img-fluid w-100 rounded-top"
                        alt="">
                </div>
                <div class="text-white bg-danger px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
                    {{ $menu->kategori }}
                </div>
                <div class="p-4 border border-primary border-top-0 rounded-bottom">
                    <h4>{{ $menu->name }}</h4>
                    <p>Stok : {{ $menu->stok }}</p>
                    <div class="d-flex justify-content-between flex-lg-wrap ">
                        <p class="text-dark fs-5 fw-bold mb-0">Rp. {{ number_format($menu->harga) }}</p>
                        <form action="{{ route('pesan') }}" method="post">
                            @csrf
                            <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                            <div class="form-group">
                                <input type="number" class="form-control" name="quantity" placeholder="Jumlah Pesanan"
                                    required>
                            </div>
                            <button type="submit" onclick="sweetalert()"
                                class="btn border border-secondary rounded-pill text-primary mt-2 align-items-right">
                                <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    function sweetalert() {
        Swal.fire({
            title: 'Success',
            text: 'Barang ditambahkan ke keranjang',
            icon: 'success',
            timer: 3000, // Mengatur waktu tayang popup
            timerProgressBar: true, // Menampilkan bar progres timer
            confirmButtonText: 'Done'
        })
    }
</script>
