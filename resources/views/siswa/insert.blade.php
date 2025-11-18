@extends('layout.admin')
@section('title', 'Tambah Siswa')

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

        .card-header {
            background-color: #008374 ;
            font-weight: 600;
            letter-spacing: 0.3px;
        }

        .btn-success,
        .btn-primary {
            background-color: #008374 ;
            border: none;
        }

        .btn-success:hover,
        .btn-primary:hover {
            background-color: #00695f ;
        }

        .btn-secondary {
            background-color: #adb5bd;
        }
    </style>

    <div class="container mt-4 mb-5">
        <div class="form-wrapper">
            <h4 class="fw-bold mb-4">
                <i class="fa-solid fa-user-plus me-2 text-success"></i>Tambah Siswa
            </h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action="{{ route('siswa.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">NIS</label>
                    <input type="text" name="nis" class="form-control shadow-sm" placeholder="Masukkan NIS" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Siswa</label>
                    <input type="text" name="nama_siswa" class="form-control shadow-sm" placeholder="Masukkan Nama Siswa"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <select class="form-select shadow-sm" name="kelas" required>
                        <option value="" disabled selected>-- Pilih Kelas --</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">Jurusan</label>
                    <select class="form-select shadow-sm" name="jurusan" required>
                        <option value="" disabled selected>-- Pilih Jurusan --</option>
                        <option value="TSM">TSM</option>
                        <option value="TKR">TKR</option>
                        <option value="TKJ">TKJ</option>
                        <option value="RPL">RPL</option>
                        <option value="TB">TB</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('siswa') }}" class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fa-solid fa-save me-1"></i> Simpan
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
