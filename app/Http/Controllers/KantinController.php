<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Menu;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KantinController extends Controller
{
    public function index()
    {
        $jumlahSiswa = User::where('role', 'user')->count();
        $menu = Menu::latest()->simplePaginate(10);
        $jumlahMenu = Menu::count();
        return view('kantin.index', compact('jumlahSiswa', 'menu', 'jumlahMenu'));
    }
    public function laporan()
    {
        $laporan = Pesanan::selectRaw('MAX(id) as id,MAX(user_id) as user_id, invoice, MAX(status) as status, SUM(total_price) as total_price, MAX(created_at) as created_at')
            ->where('status', 'Disetujui')
            ->groupBy('invoice')
            ->latest()
            ->simplePaginate(10);
        return view('kantin.laporan', compact('laporan'));
    }


    public function pesan(Request $request)
{
    // Pastikan pengguna sudah login
    if (!auth()->check()) {
        return redirect()->route('auth')->with('error', 'Silakan login terlebih dahulu untuk membuat pesanan.');
    }

    $request->validate([
        'menu_id' => 'required|exists:menus,id',
        'quantity' => 'required|integer|min:1',
    ]);

    $menu = Menu::find($request->menu_id);
    $pesananPending = Pesanan::where('user_id', auth()->id())
        ->where('status', 'pending')
        ->first();

    $invoice = $pesananPending ? $pesananPending->invoice : "TRS#" . auth()->id() . "_" . time();

    // Buat pesanan baru
    $pesanan = new Pesanan();
    $pesanan->menu_id = $menu->id;
    $pesanan->user_id = auth()->id();
    $pesanan->quantity = $request->quantity;
    $pesanan->total_price = $menu->harga * $request->quantity;
    $pesanan->invoice = $invoice;
    $pesanan->status = 'pending'; // Atur status menjadi "pending"
    $pesanan->save();

    return redirect()->route('account.show', auth()->id())->with('success', 'Pesanan berhasil ditambahkan');
}


    public function beli(Request $request)
    {
        $pesananIds = $request->input('pesanan_id');
        $user = Auth::user();
        $totalHarga = Pesanan::whereIn('id', $pesananIds)->sum('total_price');

        if ($user->balance < $totalHarga) {
            return redirect()->route('account.show', auth()->id())->with('error', 'Saldo tidak mencukupi');
        }

        // Mengurangi jumlah stok setiap menu yang dibeli
        foreach ($pesananIds as $pesananId) {
            $pesanan = Pesanan::find($pesananId);
            $menu = $pesanan->menu;

            if ($menu->stok >= $pesanan->quantity) {
                $menu->stok -= $pesanan->quantity;
                $menu->save();
            } else {
                return redirect()->route('keranjang')->with('error', 'Stok tidak mencukupi untuk ' . $menu->name);
            }
        }

        // Mengupdate status pesanan menjadi 'disetujui'
        Pesanan::whereIn('id', $pesananIds)->update(['status' => 'disetujui']);

        // Mengurangi saldo pengguna
        $user->balance -= $totalHarga;
        $user->save();

        return redirect()->route('keranjang')->with('success', 'Pembelian berhasil');
    }

    public function hapusPesanan($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->delete();

        return redirect()->route('keranjang')->with('success', 'Data berhasil dihapus');
    }
}
