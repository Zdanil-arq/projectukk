@extends('layout.admin')
@section('title', 'Data Inventaris')

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
        padding: 12px 15px;
        font-weight: 600;
        text-align: center;
    }

    .modern-table td {
        padding: 12px 15px;
        vertical-align: middle;
    }

    .no-data {
        text-align: center;
        color: #6c757d;
        padding: 40px 0;
    }

    .no-data i {
        font-size: 2rem;
        color: #008374;
        opacity: 0.6;
    }
</style>

<div class="container mt-4 mb-5">
    {{-- ALERT --}}
    @foreach (['success_add' => 'success', 'success_edit' => 'warning', 'success_delete' => 'danger'] as $key => $type)
        @if (session($key))
            <div class="alert alert-{{ $type }} alert-dismissible fade show d-flex align-items-center shadow-sm rounded-3" role="alert">
                @if ($key == 'success_add')
                    <i class="fa-solid fa-circle-check me-2 fs-5"></i>
                @elseif ($key == 'success_edit')
                    <i class="fa-solid fa-pen-to-square me-2 fs-5"></i>
                @else
                    <i class="fa-solid fa-trash-can me-2 fs-5"></i>
                @endif
                <div>{{ session($key) }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    @endforeach

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Data Inventaris</h3>
        <a href="{{ route('inventaris.create') }}" class="btn btn-success shadow-sm">
            <i class="fa-solid fa-plus me-1"></i>Tambah
        </a>
    </div>

    <div class="content-wrapper">
        @if($data->count() > 0)
            <div class="table-responsive">
                <table class="table modern-table align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Kondisi</th>
                            <th>Sumber</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ ucfirst($item->nama_barang) }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->kondisi ?? '-' }}</td>
                                <td>{{ ucfirst($item->sumber) }}</td>
                                <td>
                                    <a href="{{ route('inventaris.edit', $item->id) }}" class="btn btn-sm btn-outline-success me-1" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('inventaris.destroy', $item->id) }}" method="POST" class="d-inline">
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
                Belum ada data inventaris.
            </div>
        @endif
    </div>
</div>
@endsection
