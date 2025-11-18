<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class PengeluaranController extends Controller
{
    public function index()
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }

        $user = Session::get('user');
        $data = DB::table('pengeluarans')->orderBy('id', 'desc')->get();

        return view('pengeluaran.index', compact('user', 'data'));
    }

    public function create()
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }

        $user = Session::get('user');
        return view('pengeluaran.create', compact('user'));
    }

    public function store(Request $request)
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }

        DB::table('pengeluarans')->insert([
            'tanggal'     => $request->tanggal,
            'keterangan'  => $request->keterangan,
            'nominal'     => $request->nominal,
            'sumber_dana' => $request->sumber_dana,
        ]);

        return redirect()->route('pengeluaran.index')->with('success_add', 'Data pengeluaran berhasil ditambahkan!');
    }

    public function edit($id)
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }

        $user = Session::get('user');
        $pengeluaran = DB::table('pengeluarans')->where('id', $id)->first();

        return view('pengeluaran.edit', compact('user', 'pengeluaran'));
    }

    public function update(Request $request, $id)
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }

        DB::table('pengeluarans')->where('id', $id)->update([
            'tanggal'     => $request->tanggal,
            'keterangan'  => $request->keterangan,
            'nominal'     => $request->nominal,
            'sumber_dana' => $request->sumber_dana,
        ]);

        return redirect()->route('pengeluaran.index')->with('success_edit', 'Data pengeluaran berhasil diperbarui!');
    }

    public function destroy($id)
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }

        DB::table('pengeluarans')->where('id', $id)->delete();

        return redirect()->route('pengeluaran.index')->with('success_delete', 'Data pengeluaran berhasil dihapus!');
    }
}
