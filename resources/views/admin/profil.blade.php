@extends('layout.admin')

@section('title', 'Profil')

@section('content')
    <style>
        .card {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .profile-img {
            width: 160px;
            height: 160px;
            /* object-fit: cover; */
            border-radius: 50%;
            border: 4px solid #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
        }

        .left-panel {
            background: linear-gradient(135deg, #008374, #069f8d);
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .left-panel h5 {
            font-weight: 700;
            margin-bottom: 0.25px;
        }

        .left-panel p {
            font-size: 13px;
        }

        .btn-logout {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.4);
            color: #fff;
            transition: 0.3s;
        }

        .btn-logout:hover {
            background: #fff;
            color: #6C63FF;
            border-color: #6C63FF;
        }

        /* ===== RIGHT PANEL ===== */
        .right-panel {
            background: #fff;
        }

        .right-panel h4 {
            font-weight: 600;
            margin-bottom: 10px;
            /* display: flex; */
            align-items: center;
        }

        .right-panel h4 i {
            color: #008374;
            margin-right: 5px;
        }

        .right-panel label {
            font-weight: 500;
            color: #6c757d;
            font-size: 13px;
        }

        .info-value {
            font-weight: 600;
        }
    </style>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card d-flex flex-row">
                    <!-- LEFT PANEL: PROFILE IMAGE & LOGOUT -->
                    <div class="col-md-4 left-panel p-4">
                        <img src="{{ asset('storage/img/pp.png') }}" alt="Foto Profil" class="profile-img">
                        <h5>{{ $user['nama_guru'] }}</h5>
                        <p>Guru</p>
                        <a href="{{ route('logout') }}" class="btn btn-logout btn-sm px-4">
                            <i class="fa-solid fa-right-from-bracket me-2"></i>
                            Logout
                        </a>
                    </div>

                    <!-- RIGHT PANEL: DETAIL INFO -->
                    <div class="col-md-8 right-panel p-5">
                        <h4><i class="fa-solid fa-id-badge"></i>Informasi</h4>
                        <hr class="mt-0 mb-4">

                        <div class="mb-3">
                            <label>Kode Guru</label>
                            <div class="info-value">{{ $data->kode_guru }}</div>
                        </div>
                        <div class="mb-3">
                            <label>Nama Lengkap</label>
                            <div class="info-value">{{ $data->nama_guru }}</div>
                        </div>
                        <div class="mb-3">
                            <label>Nomor Telepon</label>
                            <div class="info-value">{{ $data->no_hp }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
