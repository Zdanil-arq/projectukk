@extends('layout.admin')
@section('title', 'Edit Pembayaran')

@section('content')
    <style>
        .form-wrapper {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
            border-radius: 16px;
            padding: 25px 30px;
            box-shadow: 0 4px 20px rgba(0, 131, 116, 0.15);
        }

        .form-label {
            font-weight: 600;
            color: #008374;
        }

        .btn-success {
            background-color: #008374;
            border: none;
        }

        .btn-success:hover {
            background-color: #00695f;
        }
    </style>

    <div class="container mt-4 mb-5">
        <div class="form-wrapper">

            <h4 class="fw-bold mb-4">
                <i class="fa-solid fa-pen-to-square me-2 text-success"></i>
                Edit Pembayaran
            </h4>

            <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Jenis Pembayaran</label>
                    <select name="jenis_pembayaran" class="form-select" required>
                        @foreach ($targetNominal as $jenis => $nominal)
                            <option value="{{ $jenis }}"
                                {{ $pembayaran->jenis_pembayaran == $jenis ? 'selected' : '' }}>
                                {{ $jenis }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah Bayar</label>
                    <input type="number" name="jumlah_bayar" value="{{ $pembayaran->jumlah_bayar }}" class="form-control"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Bayar</label>
                    <input type="date" name="tanggal_bayar" value="{{ $pembayaran->tanggal_bayar }}"
                        class="form-control">
                </div>

                <div class="mb-4">
                    <label class="form-label">Keterangan</label>
                    <input type="text" name="keterangan" value="{{ $pembayaran->keterangan }}" class="form-control">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-success">
                        Perbarui
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
