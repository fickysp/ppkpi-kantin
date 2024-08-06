<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Pesanan;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index()
    {
        $acc = Transaksi::where('status', 'Menunggu Persetujuan')->latest()->simplePaginate(5);
        $user = User::all();
        return view('bank.index', compact('user', 'acc'));
    }

    public function laporanBank()
    {
        $acc = Transaksi::where('status', 'Disetujui')->latest()->simplePaginate(10);
        $user = User::all();
        return view('bank.laporan', compact('user', 'acc'));
    }


    public function transaksi(Request $request)
    {
        $request->validate([
            'users_id' => 'required|exists:users,id',
            'amount' => 'required|numeric',
            'type' => 'required|in:topup,withdraw',
        ]);

        $users = User::findOrFail($request->users_id);
        $amount = $request->amount;

        if ($request->type == 'withdraw' && $amount > $users->balance) {
            return redirect()->back()->with('error', 'Saldo tidak mencukupi untuk penarikan.');
        }


        Transaksi::create([
            'users_id' => $users->id,
            'amount' => $amount,
            'type' => $request->type,
            'status' => 'Menunggu Persetujuan',
        ]);

        return redirect()->route('account.show', ['id' => $users->id]);
    }

    public function approveTopUp($transactionId)
    {
        $transaksi = Transaksi::findOrFail($transactionId);

        // Periksa apakah transaksi sudah memiliki status "Menunggu Persetujuan"
        if ($transaksi->status == 'Menunggu Persetujuan') {
            // Setujui transaksi
            $transaksi->update(['status' => 'Disetujui']);

            // Melaksanakan top-up setelah persetujuan (opsional)
            if ($transaksi->type == 'topup' || $transaksi->type == 'withdraw') {
                $user = User::findOrFail($transaksi->users_id);

                // Perbarui saldo pengguna
                if ($transaksi->type == 'topup') {
                    $user->balance += $transaksi->amount;
                } elseif ($transaksi->type == 'withdraw') {
                    $user->balance -= $transaksi->amount;
                }

                $user->save();

                return redirect()->route('bank')->with('success', 'Permintaan top-up disetujui.');
            }
        }

        return redirect()->route('bank')->with('error', 'Gagal menyetujui permintaan top-up.');
    }


    public function hapusTransaksi($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('bank')->with(['success' => 'Data berhasil dihapus']);
    }
}
