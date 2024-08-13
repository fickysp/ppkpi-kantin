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
            return redirect()->route('auth')->withErrors(['error' => 'Silakan login terlebih dahulu untuk membuat pesanan.']);
        }

        // Validasi input
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $menu = Menu::find($request->menu_id);
        $userId = auth()->id();

        // Temukan pesanan pending yang sama
        $pesananPending = Pesanan::where('user_id', $userId)
            ->where('status', 'pending')
            ->where('menu_id', $menu->id)
            ->first();

        if ($pesananPending) {
            // Jika pesanan sudah ada, tambahkan kuantitas dan update harga total
            $pesananPending->quantity += $request->quantity;
            $pesananPending->total_price = $pesananPending->quantity * $menu->harga;
            $pesananPending->save();

            return redirect()->route('account.show', $userId)->with('success', 'Jumlah pesanan berhasil diperbarui');
        } else {
            // Jika pesanan belum ada, buat pesanan baru
            $invoice = Pesanan::where('user_id', $userId)
                ->where('status', 'pending')
                ->exists() ? Pesanan::where('user_id', $userId)->where('status', 'pending')->first()->invoice : "TRS#" . $userId . "_" . time();

            $pesanan = new Pesanan();
            $pesanan->menu_id = $menu->id;
            $pesanan->user_id = $userId;
            $pesanan->quantity = $request->quantity;
            $pesanan->total_price = $menu->harga * $request->quantity;
            $pesanan->invoice = $invoice;
            $pesanan->status = 'pending'; // Atur status menjadi "pending"
            $pesanan->save();

            return redirect()->route('account.show', $userId)->with('success', 'Pesanan berhasil ditambahkan');
        }
    }




    public function beli(Request $request)
    {
        $pesananIds = $request->input('pesanan_id');
        $user = Auth::user();
        $totalHarga = Pesanan::whereIn('id', $pesananIds)->sum('total_price');

        if ($user->balance < $totalHarga) {
            return redirect()->route('account.show', auth()->id())->with('error', 'Saldo tidak mencukupi silahkan Top Up dahulu');
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
