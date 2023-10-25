@extends('layout.visitor')
@section('title', 'Produk')

@section('content')

<div class="hero">
    <div class="content text-center">
            <h1>PRODUK LOKAL GENDIFO</h1>
    </div>
</div>

@foreach ($produk as $p)
<section id="services" class="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="icon-box">
                    <img src="/storage/{{$p->gambar}}" style="width: 50%; height: auto; margin: 0 0 15px 0;"></img>
                    <h4><a href="#">{{ $p->produk }}</a></h4>
                    <p>{{ $p->singkat }}</p>
                    <!-- Informasi Kontak dan Nomor Telepon -->
                    <div class="contact-info">
                        <p>Kontak: {{ $p->kontak }}</p>
                        <p>Nomor Telepon: {{ $p->notelp }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach

<style>
    .content {
            background-color: #f5f5f5; /* Warna latar belakang */
            padding: 40px;
            text-align: center;
        }

        .services {
        background-color: #f8f9fa; /* Warna latar belakang */
        padding: 60px 0; /* Padding atas dan bawah */
    }

    .icon-box {
        background-color: #fff; /* Warna latar belakang box */
        padding: 20px; /* Padding dalam box */
        border-radius: 8px; /* Sudut bulat box */
        text-align: center;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Efek bayangan */
    }

    /* Gaya untuk kontak dan nomor telepon */
    .contact-info {
        margin-top: 20px;
        border-top: 1px solid #ccc; /* Garis atas */
        padding-top: 20px;
    }

    .contact-info p {
        font-size: 16px;
        color: #333;
    }
</style>

@endsection