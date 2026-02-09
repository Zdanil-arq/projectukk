@extends('layout.user')

@section('title', 'Beranda')

@section('hero')
<style>
.hero-section {
    background-image: url('{{ asset('storage/img/ijo.jpg') }}');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    height: 560px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.hero-inner {
    text-align: center;
}

.home-title {
    position: relative;
    font-size: 60px;
    font-weight: 700;
    margin-bottom: 18px; /* kasih ruang buat garis */
}

.home-title::after {
    content: "";
    display: block;
    width: 300px;
    height: 4px;
    background-color: #ffffff;
    margin: 12px auto 0;
    border-radius: 2px;
}


.home-subtitle {
    max-width: 460px;
    margin: 0 auto;
}

.home-menu-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 18px;
}

.home-menu-card {
    border-radius: 14px;
    padding: 18px;
    background: #009e8c;
    color: #ffffff;
    text-decoration: none;
    transition: all 0.25s ease;
}
.home-menu-card:hover {
    transform: translateY(-2px) scale(1);
    box-shadow: 0 12px 25px rgba(0,0,0,0.2);
}
.home-info {
    margin-top: 90px;
    padding: 40px 24px;
    max-width: 900px;
    margin-left: auto;
    margin-right: auto;
    height: 400px;
}

.home-info h3 {
    font-size: 26px;
    font-weight: 700;
    margin-bottom: 14px;
    text-align: center;
    color: #0f172a;
}

.home-info h3::after {
    content: "";
    display: block;
    width: 80px;
    height: 4px;
    background-color: #009e8c;
    margin: 12px auto 0;
    border-radius: 2px;
}

.home-info p {
    font-size: 15px;
    line-height: 1.7;
    color: #475569;
    text-align: center;
    max-width: 720px;
    margin: 18px auto 0;
}
</style>

<div class="hero-inner">
    <h1 class="home-title">Dashboard Administrasi</h1>
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
    <div class="home-info">
    <h3>Sistem Administrasi Sekolah</h3>
    <p>
        Website ini digunakan sebagai pusat pengelolaan administrasi sekolah yang mencakup
        data pembayaran siswa, pengeluaran operasional, serta inventaris barang.
        Sistem dirancang agar mudah digunakan, cepat diakses, dan membantu proses
        administrasi menjadi lebih tertata dan transparan.
    </p>
</div>

</div>
@endsection
