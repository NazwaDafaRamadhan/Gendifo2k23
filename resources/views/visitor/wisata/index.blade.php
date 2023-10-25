@extends('layout.visitor')
@section('title', 'Wisata')

@section('content')

<div class="hero">
    <div class="content text-center">
            <h1>GALERI WISATA GENDIFO</h1>
    </div>
</div>

@foreach ($wisata as $w)
    <div class="row justify-content-center content">
        <div class="col-lg-4 wisata-card justify-content-center">
            <img src="/storage/{{$w->gambar}}" alt="{{ $w->wisata }}">
        </div>
        <div class="col-lg-6 wisata-card">
            <h3>{{ $w->wisata }}</h3>
            <p>{{ $w->singkat }}</p>
            <p>Untuk informasi lebih lanjut, hubungi berikut : {{ $w->kontak }} ({{ $w->notelp }})</p>
            <a href="#" class="btn-learn-more">Lihat Selengkapnya</a>
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

        .wisata-card {
            background-color: #fff; /* Warna latar belakang kartu budaya */
            border: 1px solid #ddd; /* Garis tepi kartu budaya */
            padding: 20px;
            margin: 20px 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Efek bayangan kartu budaya */
            transition: background-color 0.3s; /* Transisi efek perubahan warna */
        }

        .wisata-card:hover {
            background-color: #f0f0f0; /* Warna latar belakang saat dihover */
        }

        .wisata-card img {
            width: 100px; /* Lebar gambar */
            height: auto; /* Menyesuaikan tinggi gambar */
            margin-left: 20px; /* Jarak dari kiri */
        }

        .wisata-card h3 {
            font-size: 24px; /* Ukuran font judul budaya */
            color: #333; /* Warna teks judul budaya */
        }

        .wisata-card p {
            font-size: 16px; /* Ukuran font deskripsi dan informasi kontak */
            margin-top: 20px; /* Jarak atas */
        }
</style>

@endsection