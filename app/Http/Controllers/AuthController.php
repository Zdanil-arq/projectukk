<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $guru = Guru::where('kode_guru', $request->username)->first();

        if ($guru && Hash::check($request->password, $guru->password)) {
            Session::put('user', [
                'kode_guru' => $guru->kode_guru,
                'nama_guru' => $guru->nama_guru,
            ]);
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['error' => 'Username atau Password salah!']);
    }

    public function showDashboard()
    {
        if (!Session('user')) {
            return redirect()->route('login');
        }
        $user = Session::get('user');
        return view('admin.dashboard', compact('user'));
    }

    public function profil()
    {
        if (!Session('user')) {
            return redirect()->route('login');
        }
        $user = Session::get('user');
        $data = Guru::where('kode_guru', $user['kode_guru'])->first();

        return view('admin.profil', compact('user', 'data'));
    }

    public function logout()
    {
        Session::forget('user');
        return redirect()->route('login');
    }
}
