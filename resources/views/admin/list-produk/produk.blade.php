@extends ('layout.admin')
@section ('title','Master Produk')

@section('content')
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Tabel @yield('title')</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Produk</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Dibuat Oleh</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Dibuat</th>
                      <th class="text-secondary text-uppercase text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                        @foreach ($produk as $p)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                        <img src="{{ 'storage/'. $p->gambar }}" class="avatar avatar-me me-3" alt="">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 style="white-space: normal;" class="mb-0 text-sm">{{ $p->produk }}</h6>
                                        <!-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> -->
                                    </div>
                                </div>
                            </td>
                            <td style="white-space: normal;"><h6 class="mb-0 text-sm">{{ $p->created_by }}</h6></td>
                            <td style="white-space: normal;"><h6 class="mb-0 text-sm">{{ $p->created_at }}</h6></td>
                            <td class="align-middle">
                              <a href="#" class="text-secondary font-weight-bold text-xs btn-edit" data-bs-toggle="modal" data-bs-target="#modalEdit" data-produk-id="{{ $p->id_produk }}">Edit</a> ||
                              <a href="#" class="text-secondary font-weight-bold text-xs btn-delete"
                              onclick="return confirmDelete('{{ $p->id_produk }}')">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer> -->
    </div>

    <!-- Button modal -->
        <a href="#" class="float" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="fa fa-plus my-float"></i>
        </a>
    <!-- End button modal -->

    <!-- Isi modal tambah -->
        <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true" data-modal-type="tambah">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Produk Lokal Desa</h1>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/add-produk/store" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="produk" class="form-label">Nama Produk</label><a class="text-danger">*</a>
                        <input type="text" class="form-control" id="produk" name="produk">
                    </div>
                    <div class="mb-3">
                        <label for="kontak" class="form-label">Kontak Narahubung</label><a class="text-danger">*</a>
                        <input type="text" class="form-control" id="kontakProduk" name="kontak">
                    </div>
                    <div class="mb-3">
                        <label for="notelp" class="form-label">No Telepon</label><a class="text-danger">*</a>
                        <input type="text" class="form-control" id="notelpProduk" name="notelp">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label><a class="text-danger">*</a>
                        <input id="deskripsi" type="hidden" name="deskripsi">
                        <trix-editor input="deskripsi"></trix-editor>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar Produk</label><a class="text-danger">*</a>
                        <img class="img-preview img-fluid"></img>
                        <input type="file" class="form-control" id="gambar" name="gambar" onchange="previewImage()">
                    </div>
                    <div class="mb-3">
                      <label for="video" class="form-label">Video Promosi Produk</label>
                      <video class="video-preview d-none" controls style="width: 100%; height: auto;"></video>
                      <input type="file" class="form-control" id="video" name="video" onchange="previewVideo()">
                    </div>
                    <div class="mb-3">
                        <label for="link_post_ig" class="form-label">Link Postingan Instagram</label>
                        <input type="text" class="form-control" id="link_post_ig" name="link_post_ig">
                    </div>
                    <div class="mb-3">
                        <label for="link_post_tiktok" class="form-label">Link Postingan Tiktok</label>
                        <input type="text" class="form-control" id="link_post_tiktok" name="link_post_tiktok">
                    </div>
                    <div class="mb-3">
                        <label for="link_post_yt" class="form-label">Link Postingan Video Youtube</label>
                        <input type="text" class="form-control" id="link_post_yt" name="link_post_yt">
                    </div>
                    <input type="hidden" name="created_by" id="created_by" value="{{ Auth::user()->nama }}">
                      <div class="modal-footer">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <div class="row">
                                <div class="col-6">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary" type="button">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    <!-- End isi modal -->

    <!-- Isi modal edit -->
        <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                      <h1 class="modal-title fs-5" id="editModalLabel">Edit Produk Lokal Desa</h1>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="/edit-produk/update/{{ $p->id_produk }}" id="editForm" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      {{ method_field('POST') }}
                      <input type="hidden" name="id_produk" id="id_produk" value="{{ $p->id_produk }}">
                      <div class="mb-3">
                          <label for="namaProduk" class="form-label">Nama Produk</label><a class="text-danger">*</a>
                          <input type="text" class="form-control" id="produkEdit" name="produk">
                      </div>
                      <div class="mb-3">
                            <label for="kontak" class="form-label">Kontak Narahubung</label><a class="text-danger">*</a>
                            <input type="text" class="form-control" id="kontak" name="kontak">
                        </div>
                      <div class="mb-3">
                        <label for="notelp" class="form-label">No Telepon</label><a class="text-danger">*</a>
                        <input type="text" class="form-control" id="notelp" name="notelp">
                      </div>
                      <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label><a class="text-danger">*</a>
                            <input id="deskripsiEdit" type="hidden" name="deskripsi">
                            <trix-editor input="deskripsiEdit" id="deskripsi"></trix-editor>
                        </div>
                      <div class="mb-3">
                              <label for="gambarEdit" class="form-label">Gambar Produk</label><a class="text-danger">*</a>
                              <input type="hidden" name="gambarLama">
                              @if ($p->gambar)
                              <img class="img-preview img-fluid d-block" id="img-preview" src="{{ asset('storage/'. $p->gambar) }}"></img></br>
                              @else
                              <img class="img-preview img-fluid d-none" id="img-preview" src=""></img></br>
                              @endif
                              <input type="file" class="form-control" id="gambarEdit" name="gambar" onchange="editImage()">
                      </div>
                      <div class="mb-3">
                            <label for="videoEdit" class="form-label">Video Budaya</label>
                            <input type="hidden" name="videoLama">
                            @if ($p->video)
                            <video class="video-preview" id="video-preview" controls style="width: 100%; height: auto;">
                              <source src="{{ asset('storage/'. $p->video) }}" type="video/mp4">
                            </video>
                            @else
                            <video class="video-preview d-none" id="video-preview" controls style="width: 100%; height: auto;">
                              <source src="" type="video/mp4">
                            </video>
                            @endif
                            <input type="file" class="form-control" id="videoEdit" name="video" onchange="editVideo()">
                        </div>
                          <div class="mb-3">
                              <label for="link_post_ig" class="form-label">Link Postingan Instagram</label>
                              <input type="text" class="form-control" id="link_post_ig_edit" name="link_post_ig">
                          </div>
                          <div class="mb-3">
                              <label for="link_post_tiktok" class="form-label">Link Postingan Tiktok</label>
                              <input type="text" class="form-control" id="link_post_tiktok_edit" name="link_post_tiktok">
                          </div>
                          <div class="mb-3">
                              <label for="link_post_yt" class="form-label">Link Postingan Video Youtube</label>
                              <input type="text" class="form-control" id="link_post_yt_edit" name="link_post_yt">
                          </div>

                      <div class="modal-footer">
                          <div class="d-grid gap-2 col-6 mx-auto">
                              <div class="row">
                                  <div class="col-6">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnCloseModal">Tutup</button>
                                  </div>
                                  <div class="col-6">
                                      <button type="submit" class="btn btn-primary" type="button">Simpan</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    <!-- End isi modal -->

</main>

<script>
    $(document).ready(function () {
      $('#modalTambah form').submit(function(event) {
            event.preventDefault(); // Mencegah pengiriman formulir secara otomatis

            var produk = $('#produk').val();
            var deskripsi = $('#deskripsi').val(); 
            var kontak = $('#kontakProduk').val();
            var notelp = $('#notelpProduk').val();
            var gambarInput = $('#gambar');
            var videoInput = $('#video');

            // Validasi gambar dan video
            var gambarValid = true;
            var videoValid = true;

            if (gambarInput[0].files.length === 0) {
                gambarValid = false;
                Swal.fire('Pilih gambar produk terlebih dahulu.', '', 'error');
            } else {
                var allowedImageExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
                if (!allowedImageExtensions.exec(gambarInput.val())) {
                    gambarValid = false;
                    Swal.fire('File gambar harus dalam format JPG, JPEG, PNG, atau GIF.', '', 'error');
                }
            }

            if (videoInput[0].files.length > 0) {
                var allowedVideoExtensions = /(\.mp4|\.avi|\.mov)$/i;
                var maxFileSize = 5368709120; // 5 GB in kilobytes

                var file = videoInput[0].files[0];
                if (!allowedVideoExtensions.exec(videoInput.val())) {
                    videoValid = false;
                    Swal.fire('File video harus dalam format MP4, AVI, atau MOV.', '', 'error');
                } else if (file.size > maxFileSize) {
                    videoValid = false;
                    Swal.fire('Ukuran video maksimal adalah 5 GB.', '', 'error');
                }
            }


            if (!produk || !deskripsi || !kontak || !notelp || !gambarValid) {
                // Tampilkan pesan kesalahan jika ada
                Swal.fire('Harap perhatikan untuk mengisi semua data penting dengan format yang benar.', '', 'error');
            } else {
                // Formulir valid, kirimkan formulir secara manual
                $(this).unbind('submit').submit();
            }
        });

      $('.btn-edit').click(function () {
        var produkId = $(this).data('produk-id');

        // Menggunakan AJAX untuk mengambil data budaya dengan ID yang sesuai
        $.ajax({
            url: '/produk-admin/' + produkId + '/modal', // Ganti dengan URL yang sesuai
            type: 'GET',
            success: function (response) {
              // Sisipkan hasil ke dalam modal
              $('#id_produk').val(response.id_produk);
              $('#produkEdit').val(response.produk);
              $('#kontak').val(response.kontak);
              $('#notelp').val(response.notelp);
              $('#link_post_ig_edit').val(response.link_post_ig);
              $('#link_post_tiktok_edit').val(response.link_post_tiktok);
              $('#link_post_yt_edit').val(response.link_post_yt);

                var deskripsiEditorView = document.querySelector("trix-editor#deskripsi").editor;
                deskripsiEditorView.loadHTML(response.deskripsi);
              
                if (response.gambar) {
                  $('#img-preview').attr('src', '/storage/' + response.gambar);
                } else {
                  $('#img-preview').attr('src', '');
                }

                if (response.video) {
                  $('#video-preview-edit').attr('src', '/storage/' + response.video);
                } else {
                  $('#video-preview-edit').attr('src', '');
                }
                $('#video-preview')[0].load();
              }
        });

        $('#btnCloseModal').click(function() {
          $('#id_budaya').val('');
          $('#budaya').val('');
          $('#kontak').val('');
          $('#notelp').val('');
          $('#gambarEdit').val('');
          $('#videoEdit').val('');  
          $('#link_post_ig').val(''); 
          $('#link_post_tiktok').val(''); 
          $('#link_post_yt').val(''); 

          var deskripsiEditor = document.querySelector("trix-editor#deskripsi").editor;
          deskripsiEditor.setContent('');

          $('#img-preview').attr('src','');
          $('#video-preview').attr('src','');
          $('#video-preview-edit').attr('src','');
          
          $('#modalEdit').modal('hide');
      });
    });
});


    function confirmDelete(produkId) {
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Anda yakin ingin menghapus data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna mengonfirmasi, jalankan aksi penghapusan
                window.location = '/produk-admin/delete/' + produkId;
            }
        });
        return false; // Mencegah tautan mengarahkan langsung ke URL
    }




  function previewImage () {
    
    const image = document.querySelector ('#gambar');
    const imgPreview = document.querySelector('.img-preview');
    
    imgPreview.style.display = 'block';

    const fileGambar= new FileReader ();
    fileGambar.readAsDataURL(image.files[0]);

    fileGambar.onload = function (gambarEvent) {
      imgPreview.src = gambarEvent.target.result;
    }
  }

  function previewVideo() {
  const video = document.querySelector('#video'); 
  const videoPreview = document.querySelector('.video-preview'); 

  if (video.files && video.files[0]) {
    videoPreview.style.display = 'block';

    const fileVideo = new FileReader();

    fileVideo.onload = function (videoEvent) {
      videoPreview.src = URL.createObjectURL(video.files[0]);
      videoPreview.classList.remove('d-none'); // Menampilkan pratinjau video
    };

    fileVideo.readAsArrayBuffer(video.files[0]);
  } else {
    // Menampilkan pesan kesalahan dengan SweetAlert
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Tidak ada file video yang dipilih',
    });
  }
}

  function editImage() {
  const image = document.querySelector('#gambarEdit');
  const imgPreview = document.querySelector('#img-preview');

  if (image.files && image.files[0]) {
    const fileGambar = new FileReader();

    fileGambar.onload = function (gambarEvent) {
      imgPreview.src = gambarEvent.target.result;
      imgPreview.classList.remove('d-none'); // Menampilkan gambar pratinjau
    };

    fileGambar.readAsDataURL(image.files[0]);
  } else {
    // Menampilkan pesan kesalahan dengan SweetAlert
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Tidak ada file yang dipilih',
    });

    // Menghilangkan gambar pratinjau
    imgPreview.src = '';
    imgPreview.classList.add('d-none');
  }
}

function editVideo() {
  const video = document.querySelector('#videoEdit');
  const videoPreview = document.querySelector('#video-preview');
  const videoSource = document.querySelector('#video-preview source');

  if (video.files && video.files[0]) {
    const fileVideo = new FileReader();

    fileVideo.onload = function (videoEvent) {
      videoSource.src = URL.createObjectURL(video.files[0]);
      videoPreview.load(); // Memuat ulang video untuk mengambil sumber baru
      videoPreview.classList.remove('d-none'); // Menampilkan pratinjau video
    };

    fileVideo.readAsArrayBuffer(video.files[0]);
  } else {
    // Menampilkan pesan kesalahan dengan SweetAlert
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Tidak ada file video yang dipilih',
    });

    // Menghentikan dan menghilangkan pratinjau video
    videoPreview.pause();
    videoPreview.src = '';
    videoPreview.load(); // Memuat ulang video untuk menghapus sumber
    videoPreview.classList.add('d-none');
  }
}



</script>


@endsection