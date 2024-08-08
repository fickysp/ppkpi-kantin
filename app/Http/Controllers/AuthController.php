<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        //tampilan untuk melakukan login
        return view('auth.login');
    }

    public function create()
    {
        //tampilan untuk melakukan register
        return view('auth.register');
    }

    public function login(Request $request)
    {
        //validasi data untuk login
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email Wajib Diisi',
            'password.required' => 'Password Wajib Diisi'
        ]);

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::Attempt($infoLogin)) {
            if (Auth::user()) {
                $userRole = Auth::user()->role;
                //pembagian login berdasarkan role yang diberikan
                if ($userRole === 'bank') {
                    return redirect()->route('bank')->with('success', 'Selamat datang Bank');
                } else if ($userRole === 'kantin') {
                    return redirect()->route('kantin')->with('success', 'Selamat datang Kantin');
                } else if ($userRole === 'user') {
                    return redirect()->route('account.show', ['id' => Auth::id()])->with('success', 'Selamat datang,' . Auth::user()->fullname);
                }
            }
        }
        //jika email atau password salah maka akan diarahkan ke route auth
        return redirect()->route('auth')->withErrors(['error' => 'Email Atau Password Salah']);
    }

    public function register(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6',
            'no_hp' => 'required',
        ], [
            'fullname.required' => 'Nama Wajib Diisi',
            'email.required' => 'Email Harus Diisi',
            'email.unique' => 'Email Telah Terdaftar',
            'password.required' => 'Password Wajib Diisi',
            'no_hp.required' => 'Nomor Hp Wajib Diisi',
        ]);

        //buat simpan ke database
        $user = new User();
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->no_hp = $request->no_hp;
        $user->role = 'user';
        $user->save();

        return redirect()->route('auth')->with('success', 'Silahkan Login');
    }
    

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
