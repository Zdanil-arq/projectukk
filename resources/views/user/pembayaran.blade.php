@extends('layout.user')

@section('title', 'Cek Pembayaran')

@section('hero')
<h1 class="home-title" style="font-size:1.7rem;">Cek Status Pembayaran</h1>
<p class="home-subtitle" style="max-width:520px;">
    Masukkan NIS untuk melihat data siswa dan riwayat pembayaran.
</p>
@endsection

@section('content')
<div class="row g-4">
    {{-- kiri form pencarian --}}
    <div class="col-lg-4">
        <div class="soft-card p-3 p-md-4 search-card">
            <h5 class="mb-3" style="font-size:1rem;">Cari NIS</h5>
            <form action="{{ route('user.pembayaran') }}" method="GET">
                <div class="mb-3">
                    <label for="nis" class="form-label" style="font-size:0.85rem;">Nomor Induk Siswa (NIS)</label>
                    <input type="text" id="nis" name="nis" class="form-control" placeholder="Masukkan NIS" value="{{ request('nis') }}">
                </div>
                <button type="submit" class="btn btn-success w-100">
                    <i class="fa-solid fa-magnifying-glass me-1"></i> Cek
                </button>
            </form>
        </div>
    </div>

    {{-- Kanan --}}
    <div class="col-lg-8">
        @if(isset($siswa))
            @if($siswa)
                {{-- Data siswa --}}
                <div class="soft-card p-3 p-md-4 mb-3">
                    <h5 class="mb-3" style="font-size:1rem;">Data Siswa</h5>
                    <table class="table table-sm table-borderless mb-0">
                        <tr>
                            <th style="width:130px;">Nama</th>
                            <td>{{ $siswa->nama_siswa ?? $siswa->nama }}</td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <td>{{ $siswa->kelas }} {{ $siswa->jurusan ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>NIS</th>
                            <td>{{ $siswa->nis }}</td>
                        </tr>
                    </table>
                </div>

                {{-- Riwayat pembayaran --}}
                <div class="soft-card p-3 p-md-4 mb-3">
                    <h5 class="mb-3" style="font-size:1rem;">Riwayat Pembayaran</h5>
                    @if($riwayat->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm align-middle mb-0">
                                <thead class="table-light text-center">
                                    <tr>
                                        <th style="width:110px;">Tanggal</th>
                                        <th>Jenis Pembayaran</th>
                                        <th style="width:150px;">Jumlah Bayar</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($riwayat as $r)
                                        <tr>
                                            <td class="text-center">{{ $r->tanggal_bayar }}</td>
                                            <td>{{ $r->jenis_pembayaran }}</td>
                                            <td class="text-end text-success fw-semibold">
                                                Rp {{ number_format($r->jumlah_bayar, 0, ',', '.') }}
                                            </td>
                                            <td>{{ $r->keterangan ?? '-' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted mb-0" style="font-size:0.86rem;">
                            Belum ada riwayat pembayaran.
                        </p>
                    @endif
                </div>

                {{-- Tagihan pembayaran --}}
                <div class="soft-card p-3 p-md-4">
                    <h5 class="mb-3" style="font-size:1rem;">Tagihan Pembayaran</h5>

                    @php
                        $targetNominal = [
                            'Kas Oktober' => 8000,
                            'Kas November' => 8000,
                            'Kas Desember' => 8000,
                        ];
                    @endphp

                    <ul class="tagihan-list">
                        @foreach($targetNominal as $jenis => $target)
                            @php
                                $totalBayar = $riwayat->where('jenis_pembayaran', $jenis)->sum('jumlah_bayar');
                                $status = $totalBayar >= $target ? 'Lunas' : 'Belum Lunas';
                            @endphp
                            <li class="tagihan-item">
                                <div class="tagihan-left">
                                    <span>{{ $jenis }}</span>
                                    <span>Target: Rp {{ number_format($target, 0, ',', '.') }}</span>
                                </div>
                                <div class="tagihan-right">
                                    <span>Rp {{ number_format($totalBayar, 0, ',', '.') }}</span>
                                    @if($status == 'Lunas')
                                        <span class="badge-soft-success">Lunas</span>
                                    @else
                                        <span class="badge-soft-danger">Belum Lunas</span>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
                <div class="soft-card p-4">
                    <h5 class="mb-2">Data tidak ditemukan</h5>
                    <p class="mb-0 text-muted" style="font-size:0.86rem;">
                        NIS yang dimasukkan tidak terdaftar.
                    </p>
                </div>
            @endif
        @else
            <div class="soft-card p-4">
                <h5 class="mb-2">Petunjuk</h5>
                <p class="mb-0 text-muted" style="font-size:0.86rem;">
                    Masukkan NIS pada form , kemudian tekan tombol cek.
                </p>
            </div>
        @endif
    </div>
</div>
@endsection
