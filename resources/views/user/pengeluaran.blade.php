@extends('layout.user')

@section('title', 'Data Pengeluaran')

@section('hero')
    <h1 class="home-title" style="font-size:1.7rem;">Data Pengeluaran</h1>
    <p class="home-subtitle" style="max-width:520px;">
        Rekap pengeluaran yang tercatat di sistem.
    </p>
@endsection

@section('content')
<style>
    .exp-wrapper {
        background: #ffffff;
        border-radius: 16px;
        padding: 20px 18px;
        box-shadow: 0 6px 18px rgba(15, 23, 42, 0.12);
        border: 1px solid #e5e7eb;
    }

    .modern-table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 10px;
        overflow: hidden;
        font-size: 0.9rem;
    }

    .modern-table thead th {
        background-color: #008374;
        color: #fff;
        border: none;
        padding: 10px 12px;
        font-weight: 600;
        text-align: center;
    }

    .modern-table td {
        padding: 10px 12px;
        vertical-align: middle;
        color: #374151;
        text-align: center;
        border-top: 1px solid #e5e7eb;
    }

    .modern-table tbody tr:hover {
        background-color: #fef2f2;
    }

    .nominal-negatif {
        color: #b91c1c;
        font-weight: 600;
        white-space: nowrap;
    }

    .no-data {
        text-align: center;
        color: #6c757d;
        padding: 30px 0;
        font-size: 0.9rem;
    }

    .no-data i {
        font-size: 2rem;
        color: #008374;
        opacity: 0.5;
        margin-bottom: 6px;
    }
</style>

<div class="exp-wrapper">
    <h5 class="fw-bold mb-3" style="font-size:1rem;">Data Pengeluaran</h5>

    @if($pengeluaran->count() > 0)
        <div class="table-responsive">
            <table class="table modern-table align-middle mb-0">
                <thead>
                    <tr>
                        <th style="width:60px;"><i class="fa-solid fa-hashtag"></i></th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Nominal</th>
                        <th>Sumber</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pengeluaran as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->tanggal }}</td>
                        <td class="text-start">{{ ucfirst($p->keterangan) }}</td>
                        <td class="nominal-negatif">
                            Rp {{ number_format($p->nominal, 0, ',', '.') }}
                        </td>
                        <td>{{ $p->sumber_dana ?? 'Tidak Diketahui' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="no-data">
            <i class="fa-regular fa-folder-open d-block"></i>
            Belum ada data pengeluaran.
        </div>
    @endif
</div>
@endsection
