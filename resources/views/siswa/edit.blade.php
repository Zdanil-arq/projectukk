@extends('layout.admin')
@section('title', 'Edit Siswa')

@section('content')
<style>
    .form-wrapper {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(8px);
        border-radius: 16px;
        padding: 25px 30px;
        box-shadow: 0 4px 20px rgba(0, 131, 116, 0.15);
    }

    .form-label {
        font-weight: 600;
        color: #008374;
    }

    .btn-success {
        background-color: #008374 ;
        border: none;
    }

    .btn-success:hover {
        background-color: #00695f ;
    }

    .btn-secondary {
        background-color: #adb5bd;
    }
</style>

<div class="container mt-4 mb-5">
    <div class="form-wrapper">
        <h4 class="fw-bold mb-4">
            <i class="fa-solid fa-pen-to-square me-2 text-success"></i>Edit Siswa
        </h4>

        <form action="{{ route('siswa.update', $barang->nis) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">NIS</label>
                <input type="text" name="nis" value="{{ $barang->nis }}" class="form-control shadow-sm" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Siswa</label>
                <input type="text" name="nama_siswa" value="{{ $barang->nama_siswa }}" class="form-control shadow-sm" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Kelas</label>
                <select name="kelas" class="form-select shadow-sm" required>
                    <option value="X" {{ $barang->kelas == 'X' ? 'selected' : '' }}>X</option>
                    <option value="XI" {{ $barang->kelas == 'XI' ? 'selected' : '' }}>XI</option>
                    <option value="XII" {{ $barang->kelas == 'XII' ? 'selected' : '' }}>XII</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label">Jurusan</label>
                <select name="jurusan" class="form-select shadow-sm" required>
                    <option value="TSM" {{ $barang->jurusan == 'TSM' ? 'selected' : '' }}>TSM</option>
                    <option value="TKR" {{ $barang->jurusan == 'TKR' ? 'selected' : '' }}>TKR</option>
                    <option value="TKJ" {{ $barang->jurusan == 'TKJ' ? 'selected' : '' }}>TKJ</option>
                    <option value="RPL" {{ $barang->jurusan == 'RPL' ? 'selected' : '' }}>RPL</option>
                    <option value="TB" {{ $barang->jurusan == 'TB' ? 'selected' : '' }}>TB</option>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('siswa') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fa-solid fa-save me-1"></i> Perbarui
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
