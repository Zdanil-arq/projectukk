@extends('layout.admin')
@section('title', 'Edit Pengeluaran')

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
            <i class="fa-solid fa-pen-to-square me-2 text-success"></i>Edit Pengeluaran
        </h4>

        <form action="{{ route('pengeluaran.update', $pengeluaran->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" value="{{ $pengeluaran->tanggal }}" class="form-control shadow-sm" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <input type="text" name="keterangan" value="{{ $pengeluaran->keterangan }}" class="form-control shadow-sm" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nominal</label>
                <input type="number" name="nominal" value="{{ $pengeluaran->nominal }}" class="form-control shadow-sm" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Sumber Dana</label>
                <input type="text" name="sumber_dana" value="{{ $pengeluaran->sumber_dana }}" class="form-control shadow-sm">
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('pengeluaran.index') }}" class="btn btn-secondary">
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
