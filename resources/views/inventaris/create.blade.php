@extends('layout.admin')
@section('title', 'Tambah Inventaris')

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

        .btn-success,
        .btn-primary {
            background-color: #008374;
            border: none;
        }

        .btn-success:hover,
        .btn-primary:hover {
            background-color: #00695f;
        }

        .btn-secondary {
            background-color: #adb5bd;
        }
    </style>

    <div class="container mt-4 mb-5">
        <div class="form-wrapper">
            <h4 class="fw-bold mb-4">
                <i class="fa-solid fa-plus-circle me-2 text-success"></i>Tambah Inventaris
            </h4>

            <form action="{{ route('inventaris.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control shadow-sm" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah</label>
                    <input type="number" name="jumlah" class="form-control shadow-sm" value="1" min="1"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kondisi</label>
                    <select name="kondisi" class="form-select shadow-sm" required>
                        <option value="" disabled selected>-- Pilih Kondisi --</option>
                        <option value="Baik">Baik</option>
                        <option value="Rusak">Rusak</option>
                    </select>
                </div>


                <div class="mb-4">
                    <label class="form-label">Sumber</label>
                    <select name="sumber" id="sumber" class="form-select shadow-sm">
                        <option value="beli">Beli</option>
                        <option value="donasi">Donasi</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('inventaris.index') }}" class="btn btn-secondary">
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
