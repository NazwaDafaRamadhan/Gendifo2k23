@extends('layout.visitor')
@section('title', 'Wisata')

@section('content')

<div class="hero">
    <div class="content text-center">
            <h1 style="margin-top: 20px; font-weight:  bold;">DESTINASI WISATA GENDIFO</h1>
    </div>
</div>

<div class="container-blog">
    @foreach ($wisata as $w)
    <div class="blog-card">
        <div class="blog-image">
          <img src="/storage/{{$w->gambar}}" alt="{{$w->wisata}}">
        </div>
        <div class="blog-content">
            <div class="published">
                <p id="date" class="date">{{ $w->created_at }}</p></br>
            </div>
            <h3 class="title">{{ $w->wisata }}</h3>
            <p class="description">{{ $w->singkat }}</p>
            <p class="author">Ditulis oleh : {{ $w->created_by }}</p>
            <div class="info">
                <a href="{{ route('wisata.view', ['id' => $w->id_wisata]) }}" class="read-more">Read More</a>
            </div>
        </div>
    </div>
    @endforeach
</div>  

<script>
    // Mendapatkan semua elemen dengan class "date"
    const dateElements = document.querySelectorAll('.date');

    dateElements.forEach(dateElement => {
        // Mengambil tanggal dan waktu dari elemen
        const dateTimeString = dateElement.textContent;
        const dateTime = new Date(dateTimeString);

        // Daftar hari dalam bahasa Indonesia
        const days = [
            "Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"
        ];

        // Daftar bulan dalam bahasa Indonesia
        const months = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];

        // Mendapatkan informasi tanggal, bulan, tahun, dan hari
        const day = days[dateTime.getDay()];
        const date = dateTime.getDate();
        const month = months[dateTime.getMonth()];
        const year = dateTime.getFullYear();

        // Membuat format yang diinginkan
        const formattedDate = `${day}, ${date} ${month} ${year}`;

        // Menetapkan hasil format sebagai isi dari elemen
        dateElement.textContent = formattedDate;
    });
</script>

@endsection