@extends('layout.visitor')
@section('title','Artikel')

@section('content')

<div class="container">
  <div class="row justify-content-center mb-5">
    <div class="col-md-8">
      <h1 class="mb-4 mt-4" style="font-size: 2rem; font-weight: bold;">{{ $wisata->wisata }}</h1>
      <p class="mb-3">Ditulis oleh <a class="text-decoration-none">{{ $wisata->created_by }}</a></p>

      <div class="image-container">
        <img src="/storage/{{ $wisata->gambar }}" alt="{{ $wisata->wisata }}" class="img-fluid rounded" style="max-height: 500px; width: 100%;">
      </div>

      <article class="my-3 fs-5" style="line-height: 1.6; text-align:  justify;">
        {!! $wisata->deskripsi !!}
      </article>

      @if($wisata->link_post_ig)
      <p>Berikut video promosi instagram yang dapat anda kunjungi : </p>
        <a href="{{$wisata->link_post_ig}}">{{$wisata->link_post_ig}}</a></br>
      @endif
      @if($wisata->link_post_tiktok)
      <p>Berikut video promosi tiktok yang dapat anda kunjungi : </p>
        <a style="bottom: 10px;" href="{{$wisata->link_post_tiktok}}">{{$wisata->link_post_tiktok}}</a></br>
      @endif
      @if($wisata->link_post_yt)
      <p>Berikut video promosi youtube yang dapat anda kunjungi : </p>
        <a href="{{$wisata->link_post_yt}}">{{$wisata->link_post_yt}}</a>
      @endif

      <a href="/wisata" class="d-block mt-3 text-decoration-none text-primary" style="font-weight: bold;">Back to posts</a>
    </div>
  </div>
</div>

@endsection