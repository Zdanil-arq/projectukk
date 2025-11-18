<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function index()
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }
        $user = Session::get('user');
        $data = DB::table('siswas')->get();
        return view('siswa.index', compact('user', 'data'));
    }

    public function insert()
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }
        $user = Session::get('user');
        return view('siswa.insert', compact('user'));
    }

    // Simpan Produk ke Database
public function store(Request $request)
{
    if (!Session::has('user')) {
        return redirect()->route('login');
    }

    // Validasi NIS unik
    $request->validate([
        'nis' => 'required|unique:siswas,nis',
        'nama_siswa' => 'required',
        'kelas' => 'required',
        'jurusan' => 'required',
    ], [
        'nis.unique' => 'NIS sudah terdaftar!',
        'nis.required' => 'NIS wajib diisi!',
    ]);

    DB::table('siswas')->insert([
        'nis' => $request->nis,
        'nama_siswa' => $request->nama_siswa,
        'kelas'      => $request->kelas,
        'jurusan'    => $request->jurusan,
    ]);

    return redirect()->route('siswa')->with('success_add', 'Data siswa berhasil ditambahkan!');
}


    public function edit($id)
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }
        $user = Session::get('user');
        $barang = DB::table('siswas')->where('nis', $id)->first();
        return view('siswa.edit', compact('user', 'barang'));
    }

    public function update(Request $request, $id)
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }
        $barang = DB::table('siswas')->where('nis', $id)->first();
        DB::table('siswas')->where('nis', $id)->update([
            'nama_siswa'       => $request->nama_siswa,
            'kelas'        => $request->kelas,
            'jurusan'  => $request->jurusan,
        ]);
        return redirect()->route('siswa')->with('success_edit', 'Data siswa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }
        $barang = DB::table('siswas')->where('nis', $id)->first();
        DB::table('siswas')->where('nis', $id)->delete();
        return redirect()->route('siswa')->with('success_delete', 'Data siswa berhasil dihapus!');
    }
}
