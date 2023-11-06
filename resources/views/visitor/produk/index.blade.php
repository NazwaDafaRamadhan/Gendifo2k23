@extends('layout.visitor')
@section('title', 'Produk')

@section('content')

<div class="hero">
    <div class="content text-center">
            <h1 style="margin-top: 20px; font-weight:  bold;">PRODUK LOKAL GENDIFO</h1>
    </div>
</div>

<div class="container-product">
@foreach ($produk as $p)
    <div class="card-product">
        <div class="imgBx">
            <img src="/storage/{{ $p->gambar }}" alt="">
        </div>
        <div class="content-product">
            <h2>{{ $p->produk }}</h2>
            <p>{{ $p->singkat }}</p>
            <p>Hubungi Kontak Berikut : {{ $p->kontak }} ({{ $p->notelp }})</p>
            <a href="#">Lihat Selengkapnya</a>
        </div>
    </div>    
    @endforeach
</div>

@endsection