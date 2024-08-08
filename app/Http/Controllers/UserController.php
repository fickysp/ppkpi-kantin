<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $menu = Menu::latest()->simplePaginate(10);
        $jumlahPesanan = Pesanan::where('status', 'pending')->count();
        return view('user.index', compact('menu', 'jumlahPesanan'));

    }
    public function home(){
        $menu = Menu::latest()->simplePaginate(10);
        return view('frontpage.index', compact('menu'));

    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        $menu = Menu::latest()->simplePaginate(4);
        $transaksis = $user->transaksi;
        $jumlahPesanan = Pesanan::where('status', 'pending')->count();

        return view('user.index', compact('user', 'menu', 'jumlahPesanan', 'transaksis'));
    }



    public function search(Request $request)
{
    $kategori = $request->input('category', 'semua'); // Ambil kategori dari request

    // Validasi kategori
    $allowedCategories = ['semua', 'makanan', 'minuman', 'peralatan'];

    if (!in_array($kategori, $allowedCategories)) {
        return response()->json(['error' => 'Kategori tidak valid.'], 400);
    }

    // Query produk berdasarkan kategori
    $query = Menu::query();
    if ($kategori != 'semua') {
        $query->where('kategori', $kategori);
    }
    $menus = $query->get();

    if ($request->ajax()) {
        // Kembalikan partial view jika permintaan AJAX
        return view('partials.product-list', compact('menus'))->render();
    }

    // Untuk permintaan non-AJAX, bisa menambahkan logika lain jika diperlukan
    $jumlahPesanan = Pesanan::where('status', 'pending')->count();
    $user = User::findOrFail(auth()->id());

    return view('partials.product-list', compact('user', 'menus', 'jumlahPesanan'));
}


    public function trans(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        $jumlahPesanan = Pesanan::where('status', 'pending')->count();

        return view('user.transaksi', compact('user', 'jumlahPesanan'));
    }

    public function laporanTransaksi($id)
    {
        $user = User::findOrFail($id);
        $jumlahPesanan = Pesanan::where('status', 'pending')->count();
        $transaksis = $user->transaksi()->where('status', 'Disetujui')->latest()->simplePaginate(10);

        return view('user.laporan_bank', compact('user', 'jumlahPesanan', 'transaksis'));
    }

    public function laporanPembelian($id)
    {
        $user = User::findOrFail($id);
        $jumlahPesanan = Pesanan::where('status', 'pending')->count();
        $historiPesanan = $user->pesanan()
            ->selectRaw('MAX(id) as id, invoice, MAX(status) as status, SUM(total_price) as total_price, MAX(created_at) as created_at')
            ->where('status', 'Disetujui')
            ->groupBy('invoice')
            ->latest()
            ->simplePaginate(10);

        return view('user.laporan_kantin', compact('user', 'historiPesanan', 'jumlahPesanan'));
    }

    public function keranjang()
    {
        $user = Auth::user();
        $pesanan = Pesanan::where('user_id', $user->id)->where('status', 'pending')->get();
        $jumlahPesanan = Pesanan::where('status', 'pending')->count();
        return view('user.keranjang', compact('user', 'pesanan', 'jumlahPesanan'));
    }
}
