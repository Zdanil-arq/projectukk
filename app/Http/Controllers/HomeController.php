<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Pembayaran;
use App\Models\Pengeluaran;
use App\Models\Inventaris;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.home');
    }

    public function pembayaran(Request $request)
    {
        $nis = $request->input('nis');
        $siswa = null;
        $riwayat = collect();

        if ($nis) {
            $siswa = Siswa::where('nis', $nis)->first();
            if ($siswa) {
                $riwayat = Pembayaran::where('siswa_id', $siswa->id)->orderBy('tanggal_bayar', 'desc')->get();
            }
        }

        return view('user.pembayaran', compact('siswa', 'riwayat'));
    }

    public function pengeluaran()
    {
        $pengeluaran = Pengeluaran::orderBy('id', 'desc')->get();
        return view('user.pengeluaran', compact('pengeluaran'));
    }

    public function inventaris()
    {
        $inventaris = Inventaris::orderBy('nama_barang', 'asc')->get();
        return view('user.inventaris', compact('inventaris'));
    }
}
