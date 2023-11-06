@extends('layout.visitor')
@section('title','Artikel')

@section('content')

<div class="container">
  <div class="row justify-content-center mb-5">
    <div class="col-md-8">
      <h1 class="mb-4 mt-4" style="font-size: 2rem; font-weight: bold;">{{ $budaya->budaya }}</h1>
      <p class="mb-3">Ditulis oleh <a class="text-decoration-none">{{ $budaya->created_by }}</a></p>

      <div class="image-container">
        <img src="/storage/{{ $budaya->gambar }}" alt="{{ $budaya->budaya }}" class="img-fluid rounded" style="max-height: 500px; width: 100%;">
      </div>

      <article class="my-3 fs-5" style="line-height: 1.6; text-align:  justify;">
        {!! $budaya->deskripsi !!}
      </article>

      @if($budaya->video)
      <p>Berikut adalah video promosi yang dapat anda saksikan : </p>
      <video class="videoArtikel" width="640" height="360" controls>
        <source src="{{ asset('storage/'. $budaya->video) }}" type="video/mp4">
      </video>
      @endif


      @if($budaya->link_post_ig)
      <p>Berikut video promosi instagram yang dapat anda kunjungi : </p>
        <a href="{{$budaya->link_post_ig}}">{{$budaya->link_post_ig}}</a></br>
      @endif
      @if($budaya->link_post_tiktok)
      <p>Berikut video promosi tiktok yang dapat anda kunjungi : </p>
        <a href="{{$budaya->link_post_tiktok}}">{{$budaya->link_post_tiktok}}</a></br>
      @endif
      @if($budaya->link_post_yt)
      <p>Berikut video promosi youtube yang dapat anda kunjungi : </p>
        <a href="{{$budaya->link_post_yt}}">{{$budaya->link_post_yt}}</a>
      @endif

      <a href="/budaya" class="read-more" style="font-weight: bold;">Back to posts</a>
    </div>
  </div>
</div>

@endsection