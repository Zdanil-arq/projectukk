@extends('layout.admin')
@section('title', 'Data Pengeluaran')

@section('content')
<style>
    .content-wrapper {
        background: rgba(249, 249, 249, 0.95);
        backdrop-filter: blur(8px);
        border-radius: 16px;
        padding: 25px 30px;
        box-shadow: 0 1px 8px rgba(0, 0, 0, 0.29);
    }

    .modern-table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 10px;
        overflow: hidden;
    }

    .modern-table thead th {
        background-color: #008374;
        color: #fff;
        border: none;
        padding: 12px 15px;
        font-weight: 600;
        text-align: center;
    }

    .modern-table td {
        padding: 12px 15px;
        vertical-align: middle;
        text-align: center;
    }
    .no-data {
        text-align: center;
        color: #6c757d;
        padding: 40px 0;
    }

    .no-data i {
        font-size: 2rem;
        color: #008374;
    }
</style>

<div class="container mt-4 mb-5">
    {{-- ===== ALERT SESSION ===== --}}
    @if (session('success_add'))
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center shadow-sm rounded-3" role="alert">
            <i class="fa-solid fa-circle-check me-2 fs-5"></i>
            <div>{{ session('success_add') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('success_edit'))
        <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center shadow-sm rounded-3" role="alert">
            <i class="fa-solid fa-pen-to-square me-2 fs-5"></i>
            <div>{{ session('success_edit') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('success_delete'))
        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center shadow-sm rounded-3" role="alert">
            <i class="fa-solid fa-trash-can me-2 fs-5"></i>
            <div>{{ session('success_delete') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- ===== HEADER & ACTION BUTTON ===== --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Data Pengeluaran</h3>
        <a href="{{ route('pengeluaran.create') }}" class="btn btn-success shadow-sm">
            <i class="fa-solid fa-plus me-1"></i> Tambah
        </a>
    </div>

    {{-- ===== TABLE WRAPPER ===== --}}
    <div class="content-wrapper">
        @if($data->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped table-hover modern-table align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Nominal</th>
                            <th>Sumber Dana</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ ucfirst($item->keterangan) }}</td>
                                <td class="text-danger fw-semibold">Rp {{ number_format($item->nominal, 0, ',', '.') }}</td>
                                <td>{{ $item->sumber_dana ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('pengeluaran.edit', $item->id) }}" class="btn btn-sm btn-outline-success me-1" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('pengeluaran.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus data ini?')" title="Hapus">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="no-data">
                <i class="fa-regular fa-folder-open mb-2 d-block"></i>
                Belum ada data pengeluaran.
            </div>
        @endif
    </div>
</div>
@endsection
