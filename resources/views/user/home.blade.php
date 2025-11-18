@extends('layout.user')

@section('title', 'Beranda')

@section('hero')
<div class="row align-items-center gy-3">
    <div class="col-lg-7">
        <h1 class="home-title">Dashboard Administrasi</h1>
        <p class="home-subtitle">
            Sistem sederhana untuk melihat data pembayaran, pengeluaran, dan inventaris sekolah.
        </p>
    </div>
</div>
@endsection

@section('content')
<div class="home-menu-wrapper">
    <div class="home-menu-grid">
        <a href="{{ route('user.pembayaran') }}" class="home-menu-card">
            <div class="home-menu-icon">
                <i class="fa-solid fa-money-check-dollar"></i>
            </div>
            <h6 class="mb-1">Cek Status Pembayaran</h6>
            <p>Melihat data pembayaran siswa berdasarkan NIS.</p>
        </a>

        <a href="{{ route('user.pengeluaran') }}" class="home-menu-card">
            <div class="home-menu-icon">
                <i class="fa-solid fa-arrow-trend-down"></i>
            </div>
            <h6 class="mb-1">Data Pengeluaran</h6>
            <p>Melihat pengeluaran yang sudah dilakukan.</p>
        </a>

        <a href="{{ route('user.inventaris') }}" class="home-menu-card">
            <div class="home-menu-icon">
                <i class="fa-solid fa-boxes-stacked"></i>
            </div>
            <h6 class="mb-1">Data Inventaris</h6>
            <p>Melihat daftar barang inventaris yang tercatat.</p>
        </a>
    </div>
</div>
@endsection
