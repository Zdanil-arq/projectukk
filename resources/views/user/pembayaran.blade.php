@extends('layout.user')

@section('title', 'Cek Pembayaran')

@section('hero')
<style>
.container-narrow {
    max-width: 1000px;
    margin: auto;
}

/* SEARCH */
.search-panel {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 28px;
    margin-bottom: 28px;
    box-shadow: 0 1px 8px black;
}

/* TOP GRID */
.top-grid {
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 24px;
    margin-bottom: 32px;
}

/* BOX */
.box {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 22px;
    box-shadow: 0 1px 8px black;
}

.box-title {
    font-size: .8rem;
    font-weight: 700;
    color: #6b7280;
    margin-bottom: 14px;
    text-transform: uppercase;
    letter-spacing: .05em;
}

/* IDENTITAS */
.identity-name {
    font-size: 1.25rem;
    font-weight: 800;
    margin-bottom: 10px;
}

.identity-meta {
    font-size: .9rem;
    display: grid;
    grid-template-columns: 60px auto;
    row-gap: 6px;
}

.identity-meta span {
    color: #6b7280;
}

.identity-meta strong {
    font-weight: 600;
    color: #111827;
}

/* TAGIHAN */
.bill-item {
    display: grid;
    grid-template-columns: auto auto;
    row-gap: 4px;
    padding: 12px 0;
    border-bottom: 1px solid #f3f4f6;
    font-size: .9rem;
}

.bill-item:last-child {
    border-bottom: none;
}

.bill-name {
    font-weight: 600;
}

.bill-detail {
    font-size: .8rem;
    color: #6b7280;
}

.status {
    justify-self: end;
    align-self: center;
    font-weight: 700;
}

.status.lunas {
    color: #15803d;
}

.status.belum {
    color: #b91c1c;
}

/* RIWAYAT */
.history-box {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 24px;
    box-shadow: 0 1px 8px black;
}

.history-title {
    font-size: .95rem;
    font-weight: 700;
    margin-bottom: 18px;
}

.history-item {
    display: grid;
    grid-template-columns: auto 140px;
    padding: 14px 0;
    border-bottom: 1px solid #f3f4f6;
}

.history-item:last-child {
    border-bottom: none;
}

.history-info {
    font-size: .9rem;
}

.history-info .date {
    font-size: .75rem;
    color: #6b7280;
}

.history-amount {
    text-align: right;
    font-weight: 700;
    color: #15803d;
}

/* EMPTY */
.empty {
    text-align: center;
    font-size: .85rem;
    color: #9ca3af;
    padding: 20px 0;
}

/* RESPONSIVE */
@media (max-width: 900px) {
    .top-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="container-narrow">
    <h1 class="home-title">Cek Pembayaran Siswa</h1>
    <p class="home-subtitle">
        Informasi pembayaran siswa berdasarkan Nomor Induk Siswa (NIS)
    </p>
</div>
@endsection

@section('content')
<div class="container-narrow">

    {{-- SEARCH --}}
    <div class="search-panel">
        <form method="GET" action="{{ route('user.pembayaran') }}" class="row g-2">
            <div class="col-md-9">
                <input type="text" name="nis" class="form-control" placeholder="Masukkan NIS" value="{{ request('nis') }}">
            </div>
            <div class="col-md-3 d-grid">
                <button class="btn btn-success">
                    Cari Data
                </button>
            </div>
        </form>
    </div>

    {{-- IDENTITAS + TAGIHAN --}}
    <div class="top-grid">

        {{-- IDENTITAS --}}
        <div class="box">
            <div class="box-title">Identitas Siswa</div>

            @if(isset($siswa))
                <div class="identity-name">{{ $siswa->nama_siswa }}</div>
                <div class="identity-meta">
                    <span>NIS</span>
                    <strong>{{ $siswa->nis }}</strong>

                    <span>Kelas</span>
                    <strong>{{ $siswa->kelas }}</strong>
                </div>
            @else
                <div class="empty">
                    Masukkan NIS untuk melihat data siswa
                </div>
            @endif
        </div>

        {{-- STATUS TAGIHAN --}}
        <div class="box">
            <div class="box-title">Status Tagihan</div>

            @if(isset($siswa))
                @php
                    $tagihan = [
                        'Kas Oktober' => 8000,
                        'Kas November' => 8000,
                        'Kas Desember' => 8000,
                    ];
                @endphp

                @foreach($tagihan as $nama => $target)
                    @php
                        $total = $riwayat
                            ->where('jenis_pembayaran', $nama)
                            ->sum('jumlah_bayar');
                    @endphp

                    <div class="bill-item">
                        <div>
                            <div class="bill-name">{{ $nama }}</div>
                            <div class="bill-detail">
                                Dibayar Rp {{ number_format($total,0,',','.') }}
                                dari Rp {{ number_format($target,0,',','.') }}
                            </div>
                        </div>

                        <div class="status {{ $total >= $target ? 'lunas' : 'belum' }}">
                            {{ $total >= $target ? 'Lunas' : 'Belum' }}
                        </div>
                    </div>
                @endforeach
            @else
                <div class="empty">
                    Masukkan NIS untuk melihat status tagihan
                </div>
            @endif
        </div>


    </div>

{{-- RIWAYAT PEMBAYARAN --}}
<div class="history-box">
    <div class="history-title">Riwayat Pembayaran</div>

    @if(isset($siswa))
        @if(isset($riwayat) && $riwayat->count())
            @foreach($riwayat as $r)
                <div class="history-item">
                    <div class="history-info">
                        <div>{{ $r->jenis_pembayaran }}</div>
                        <div class="date">{{ $r->tanggal_bayar }}</div>
                    </div>
                    <div class="history-amount">
                        Rp {{ number_format($r->jumlah_bayar,0,',','.') }}
                    </div>
                </div>
            @endforeach
        @else
            <div class="empty">
                Belum ada riwayat pembayaran
            </div>
        @endif
    @else
        <div class="empty">
            Masukkan NIS untuk melihat riwayat pembayaran
        </div>
    @endif
</div>


</div>
@endsection
