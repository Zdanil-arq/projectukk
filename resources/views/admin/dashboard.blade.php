@extends('layout.admin')

@section('title', 'Dashboard')

@section('content')
<style>
.hover-scale {
    transition: all 0.25s ease-in-out;
}
.hover-scale:hover {
    transform: translateY(-0.5px);
    box-shadow: 0 0.75rem 1.5rem rgba(0,0,0,0.12);
}
.card {
    border: none;
    /* border-radius: 14px; */
    box-shadow: 0 2px 8px  rgba(0, 0, 0, 0.358);
    transition: box-shadow 0.3s ease;
}
.card:hover {
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.468);
}

.card.border-start {
    border-left-width: 6px ;
    border-radius: 14px ;
}
</style>

<div class="container mt-2">
    <h3 class="mb-4 fw-bold">
        Dashboard
    </h3>

    <div class="row g-3">
        {{-- Siswa --}}
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('siswa') }}" class="text-decoration-none">
                <div class="card h-100 border-start border-5 border-primary hover-scale">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <i class="fa-solid fa-users fa-3x text-primary"></i>
                        </div>
                        <div>
                            <h5 class="card-title mb-1">Siswa</h5>
                            <p class="card-text text-muted">Lihat semua data siswa</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        {{-- Pengeluaran --}}
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('pengeluaran.index') }}" class="text-decoration-none">
                <div class="card h-100 border-start border-5 border-danger hover-scale">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <i class="fa-solid fa-wallet fa-3x text-danger"></i>
                        </div>
                        <div>
                            <h5 class="card-title mb-1">Pengeluaran</h5>
                            <p class="card-text text-muted">Catat pengeluaran terbaru</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        {{-- Pembayaran --}}
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('pembayaran.index') }}" class="text-decoration-none">
                <div class="card h-100 border-start border-5 border-warning hover-scale">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <i class="fa-solid fa-credit-card fa-3x text-warning"></i>
                        </div>
                        <div>
                            <h5 class="card-title mb-1">Pembayaran</h5>
                            <p class="card-text text-muted">Lihat riwayat pembayaran</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        {{-- Inventaris --}}
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('inventaris.index') }}" class="text-decoration-none">
                <div class="card h-100 border-start border-5 border-success hover-scale">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <i class="fa-solid fa-box fa-3x text-success"></i>
                        </div>
                        <div>
                            <h5 class="card-title mb-1">Inventaris</h5>
                            <p class="card-text text-muted">Cek seluruh inventaris</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
