@extends('layout.visitor')
@section('title', 'Kebudayaan')

@section('content')

<div class="hero">
    <div class="content text-center">
            <h1>GALERI KEBUDAYAAN GENDIFO</h1>
    </div>
</div>

    @foreach ($budaya as $b)
    <div class="row justify-content-center content">
        <div class="col-lg-4 budaya-card justify-content-center">
            <img src="/storage/{{$b->gambar}}" alt="{{ $b->budaya }}">
        </div>
        <div class="col-lg-6 budaya-card">
            <h3>{{ $b->budaya }}</h3>
            <p>{{ $b->singkat }}</p>
            <p>Untuk informasi lebih lanjut, hubungi berikut : {{ $b->kontak }} ({{ $b->notelp }})</p>
            <a href="/budaya/{{ $b->id_budaya }}" class="btn-learn-more">Lihat Selengkapnya</a>
        </div>
    </div>
    @endforeach

<style>
        .content {
            background-color: #f5f5f5; /* Warna latar belakang */
            padding: 40px;
            text-align: center;
        }

        h1 {
            font-size: 36px; /* Ukuran font judul */
            margin-top: 20px;
            color: #333; /* Warna teks */
        }

        .budaya-card {
            background-color: #fff; /* Warna latar belakang kartu budaya */
            border: 1px solid #ddd; /* Garis tepi kartu budaya */
            padding: 20px;
            margin: 20px 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Efek bayangan kartu budaya */
            transition: background-color 0.3s; /* Transisi efek perubahan warna */
        }

        .budaya-card:hover {
            background-color: #f0f0f0; /* Warna latar belakang saat dihover */
        }

        .budaya-card img {
            width: 100px; /* Lebar gambar */
            height: auto; /* Menyesuaikan tinggi gambar */
            margin-left: 20px; /* Jarak dari kiri */
        }

        .budaya-card h3 {
            font-size: 24px; /* Ukuran font judul budaya */
            color: #333; /* Warna teks judul budaya */
        }

        .budaya-card p {
            font-size: 16px; /* Ukuran font deskripsi dan informasi kontak */
            margin-top: 20px; /* Jarak atas */
        }
    </style>
@endsection