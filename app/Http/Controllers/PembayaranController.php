<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }
        $user = Session::get('user');
        $pembayaran = collect();
        $siswa = null;

        $targetNominal = [
            'Kas Oktober' => 8000,
            'Kas November' => 8000,
            'Kas Desember' => 8000,
        ];

        //pencarian NIS
        if ($request->has('nis')) {
            $siswa = DB::table('siswas')->where('nis', $request->nis)->first();

            if ($siswa) {
                $pembayaran = DB::table('pembayarans')->where('siswa_id', $siswa->id)->orderBy('tanggal_bayar', 'desc')->get();
            }
        }

        return view('pembayaran.index', compact('user', 'siswa', 'pembayaran', 'targetNominal'));
    }

    public function store(Request $request)
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }
        DB::table('pembayarans')->insert([
            'siswa_id' => $request->siswa_id,
            'jenis_pembayaran' => $request->jenis_pembayaran,
            'jumlah_bayar' => $request->jumlah_bayar,
            'tanggal_bayar' => $request->tanggal_bayar ?? now()->toDateString(),
            'keterangan' => $request->keterangan,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success_add', 'Pembayaran berhasil ditambahkan!');
    }

    public function edit($id)
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }
        $user = Session::get('user');

        $pembayaran = DB::table('pembayarans')->where('id', $id)->first();

        $targetNominal = [
            'Kas Oktober' => 8000,
            'Kas November' => 8000,
            'Kas Desember' => 8000,
        ];

        return view('pembayaran.edit', compact('user', 'pembayaran', 'targetNominal'));
    }


    public function update(Request $request, $id)
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }

        $pembayaran = DB::table('pembayarans')->where('id', $id)->first();

        DB::table('pembayarans')->where('id', $id)->update([
            'jenis_pembayaran' => $request->jenis_pembayaran,
            'jumlah_bayar' => $request->jumlah_bayar,
            'tanggal_bayar' => $request->tanggal_bayar,
            'keterangan' => $request->keterangan,
            'updated_at' => now(),
        ]);

        // ambil nis siswa
        $siswa = DB::table('siswas')->where('id', $pembayaran->siswa_id)->first();

        return redirect()->route('pembayaran.index', [
            'nis' => $siswa->nis
        ])->with('success_edit', 'Data pembayaran berhasil diperbarui!');
    }


    public function destroy($id)
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }
        DB::table('pembayarans')->where('id', $id)->delete();

        return back()->with('success_delete', 'Data pembayaran berhasil dihapus!');
    }
}
