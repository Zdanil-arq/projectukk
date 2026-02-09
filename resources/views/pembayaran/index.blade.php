@extends('layout.admin')

@section('title', 'Pembayaran')

@section('content')
    <style>
        .card-accent {
            border-left: 6px solid var(--bs-primary);
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
        }

        .card-accent.success {
            border-left-color: var(--bs-success);
        }

        .card-accent.info {
            border-left-color: var(--bs-info);
        }

        .card-accent.warning {
            border-left-color: var(--bs-warning);
        }

        .card-accent.secondary {
            border-left-color: var(--bs-secondary);
        }

        .card-accent .card-header {
            background: transparent;
            border-bottom: none;
            font-weight: 600;
            font-size: 1.05rem;
        }

        .badge-lunas {
            background-color: #00b894;
        }

        .badge-belum {
            background-color: #d63031;
        }

        .table-hover tbody tr:hover {
            background-color: #f7f9fb;
        }
    </style>

    <div class="container py-4">
        <h2 class="mb-4 text-center"><i class="fa-solid fa-money-bill-wave"></i> Pembayaran Siswa</h2>

        <!-- Form cari siswa -->
        <form method="GET" action="{{ route('pembayaran.index') }}" class="row g-3 mb-4">
            <div class="col-md-12">
                <label for="nis" class="form-label">Cari berdasarkan NIS:</label>
                {{-- Menggunakan input-group untuk menggabungkan input dan tombol --}}
                <div class="input-group">
                    <input type="text" class="form-control" name="nis" id="nis" value="{{ request('nis') }}"
                        placeholder="Masukkan NIS" required>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </div>
        </form>

        @if ($siswa)
            <!-- Data Siswa -->
            <div class="card shadow-sm mb-4 border-0">
                <div class="card-header bg-primary text-white">
                    <i class="fa-solid fa-user-graduate me-2"></i> Data Siswa
                </div>
                <div class="card-body">
                    <table class="table table-borderless mb-0">
                        <tr>
                            <th style="width: 150px;">NIS</th>
                            <td style="width: 10px;">:</td>
                            <td>{{ $siswa->nis }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>:</td>
                            <td>{{ $siswa->nama_siswa }}</td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <td>:</td>
                            <td>{{ $siswa->kelas }} {{ $siswa->jurusan }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Input Pembayaran -->
            <div class="card shadow-sm mb-4 border-0">
                <div class="card-header bg-success text-white">
                    <i class="fa-solid fa-plus-circle me-2"></i> Input Pembayaran
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('pembayaran.store') }}">
                        @csrf
                        <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">

                        <div class="row g-3 align-items-end">
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Jenis Pembayaran</label>
                                <select name="jenis_pembayaran" class="form-select" required>
                                    <option value="" disabled selected>-- Pilih Jenis Pembayaran --</option>
                                    @foreach ($targetNominal as $jenis => $nominal)
                                        <option value="{{ $jenis }}">{{ $jenis }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label fw-semibold">Jumlah Bayar</label>
                                <input type="number" name="jumlah_bayar" class="form-control" step="0.01"
                                    placeholder="0" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Keterangan (opsional)</label>
                                <input type="text" name="keterangan" class="form-control" placeholder="">
                            </div>

                            <div class="col-md-1 d-grid">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa-solid fa-save"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Riwayat Pembayaran -->
            <div class="card shadow-sm mb-4 border-0">
                <div class="card-header bg-info text-white">
                    <i class="fa-solid fa-clock-rotate-left me-2"></i> Riwayat Pembayaran
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle text-center mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Jenis</th>
                                    <th>Jumlah</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pembayaran as $p)
                                    <tr>
                                        <td>{{ $p->tanggal_bayar ?? '-' }}</td>
                                        <td>{{ $p->jenis_pembayaran }}</td>
                                        <td class="text-success fw-semibold">
                                            Rp{{ number_format($p->jumlah_bayar, 0, ',', '.') }}</td>
                                        <td>{{ $p->keterangan }}</td>
                                        <td>
                                            <a href="{{ route('pembayaran.edit', $p->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <form action="{{ route('pembayaran.destroy', $p->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus pembayaran ini?')">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-muted py-3">Belum ada riwayat pembayaran.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Tagihan Pembayaran -->
            <div class="card shadow-sm border-0">
                <div class="card-header bg-secondary text-white">
                    <i class="fa-solid fa-list-check me-2"></i> Tagihan Pembayaran
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped align-middle text-center mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Jenis</th>
                                    <th>Total Bayar</th>
                                    <th>Target</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($targetNominal as $jenis => $target)
                                    @php
                                        $totalBayar = $pembayaran
                                            ->where('jenis_pembayaran', $jenis)
                                            ->sum('jumlah_bayar');
                                        $status = $totalBayar >= $target ? 'Lunas' : 'Belum Lunas';
                                    @endphp
                                    <tr>
                                        <td>{{ $jenis }}</td>
                                        <td>Rp{{ number_format($totalBayar, 0, ',', '.') }}</td>
                                        <td>Rp{{ number_format($target, 0, ',', '.') }}</td>
                                        <td>
                                            <span class="badge {{ $status == 'Lunas' ? 'bg-success' : 'bg-danger' }}">
                                                {{ $status }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @elseif(request('nis'))
            <div class="alert alert-danger text-center mt-4">
                <i class="fa-solid fa-circle-exclamation me-2"></i>
                Siswa dengan NIS tersebut tidak ditemukan.
            </div>
        @endif

    </div>
@endsection
