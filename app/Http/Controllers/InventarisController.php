<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class InventarisController extends Controller
{
    public function index()
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }
        $user = Session::get('user');
        $data = DB::table('inventaris')->orderBy('id', 'desc')->get();
        return view('inventaris.index', compact('user', 'data'));
    }

    public function create()
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }
        $user = Session::get('user');
        return view('inventaris.create', compact('user'));
    }

    public function store(Request $request)
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }
        DB::table('inventaris')->insert([
            'nama_barang' => $request->nama_barang,
            'jumlah'      => $request->jumlah,
            'kondisi'     => $request->kondisi,
            'sumber'      => $request->sumber,
        ]);

        return redirect()->route('inventaris.index')->with('success_add', 'Data inventaris berhasil ditambahkan!');
    }

    public function edit($id)
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }
        $user = Session::get('user');
        $barang = DB::table('inventaris')->where('id', $id)->first();
        return view('inventaris.edit', compact('user', 'barang'));
    }

    public function update(Request $request, $id)
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }
        DB::table('inventaris')->where('id', $id)->update([
            'nama_barang' => $request->nama_barang,
            'jumlah'      => $request->jumlah,
            'kondisi'     => $request->kondisi,
            'sumber'      => $request->sumber,
        ]);

        return redirect()->route('inventaris.index')->with('success_edit', 'Data inventaris berhasil diperbarui!');
    }

    public function destroy($id)
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }
        DB::table('inventaris')->where('id', $id)->delete();
        return redirect()->route('inventaris.index')->with('success_delete', 'Data inventaris berhasil dihapus!');
    }
}
