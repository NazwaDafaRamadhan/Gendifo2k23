@extends ('layout.admin')
@section ('title','Master Wisata')

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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Tempat Wisata</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Dibuat Oleh</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Dibuat</th>
                      <th class="text-secondary text-uppercase text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                        @foreach ($wisata as $w)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                        <img src="{{ 'storage/'. $w->gambar }}" class="avatar avatar-sm me-3" alt="">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 style="white-space: normal;" class="mb-0 text-sm">{{ $w->wisata }}</h6>
                                        <!-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> -->
                                    </div>
                                </div>
                            </td>
                            <td style="white-space: normal;"><h6 class="mb-0 text-sm">{{ $w->created_by }}</h6></td>
                            <td style="white-space: normal;"><h6 class="mb-0 text-sm">{{ $w->created_at }}</h6></td>
                            <td class="align-middle">
                              <a href="#" class="text-secondary font-weight-bold text-xs btn-edit" data-bs-target="#modalEdit" data-bs-toggle="modal" data-wisata-id="{{ $w->id_wisata }}">Edit</a> ||
                              <a href="#" class="text-secondary font-weight-bold text-xs btn-delete"
                              onclick="return confirmDelete('{{ $w->id_wisata }}')">Hapus</a>
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
        <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Tempat Wisata</h1>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/add-wisata/store" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="wisata" class="form-label">Nama Tempat Wisata</label>
                        <input type="text" class="form-control" id="namaWisata" name="wisata">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Kontak Narahubung</label>
                        <input type="text" class="form-control" id="kontakWisata" name="kontak">
                    </div>
                    <div class="mb-3">
                        <label for="notelp" class="form-label">No Telepon</label>
                        <input type="text" class="form-control" id="notelpWisata" name="notelp">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Lokasi Wisata</label>
                        <input type="text" class="form-control" id="alamatWisata" name="alamat">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input id="deskripsi" type="hidden" name="deskripsi">
                        <trix-editor input="deskripsi"></trix-editor>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar Wisata</label>
                        <img class="img-preview img-fluid"></img>
                        <input type="file" class="form-control" id="gambar" name="gambar" onchange="previewImage()">
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
                        <h1 class="modal-title fs-5" id="editModalLabel">Edit Wisata</h1>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="/edit-wisata/update/{{ $w->id_wisata }}" id="editForm" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                        <input type="hidden" name="id_wisata" id="id_wisata" value="{{ $w->id_wisata }}">
                        <div class="mb-3">
                            <label for="namaWisata" class="form-label">Nama Wisata</label><a class="text-danger">*</a>
                            <input type="text" class="form-control" id="wisata" name="wisata">
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
                              <label for="alamat" class="form-label">Lokasi Wisata</label><a class="text-danger">*</a>
                              <input type="text" class="form-control" id="alamat" name="alamat">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label><a class="text-danger">*</a>
                            <input id="deskripsiEdit" type="hidden" name="deskripsi">
                            <trix-editor input="deskripsiEdit" id="deskripsi"></trix-editor>
                        </div>
                        <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar Wisata</label><a class="text-danger">*</a>
                        <input type="hidden" name="gambarLama" >
                            @if ($w->gambar)
                            <img class="img-preview img-fluid d-block" id="img-preview" src="{{ asset('storage/'. $w->gambar) }}"></img></br>
                            @else
                            <img class="img-preview img-fluid" id="img-preview"></img></br>
                            @endif
                            <input type="file" class="form-control" id="gambarEdit" name="gambar" onchange="editImage()"> 
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

            var wisata = $('#namaWisata').val();
            var deskripsi = $('#deskripsi').val(); 
            var kontak = $('#kontakWisata').val();
            var notelp = $('#notelpWisata').val();
            var alamat = $('#alamatWisata').val();
            var gambarInput = $('#gambar');

            // Validasi gambar
            var gambarValid = true;
            if (gambarInput[0].files.length === 0) {
                gambarValid = false;
                alert('Pilih gambar wisata terlebih dahulu.');
            } else {
                var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
                if (!allowedExtensions.exec(gambarInput.val())) {
                    gambarValid = false;
                    alert('File gambar harus dalam format JPG, JPEG, PNG, atau GIF.');
                }
            }

            if (!wisata || !deskripsi || !kontak || !notelp || !gambarValid || !alamat) {
                // Tampilkan pesan kesalahan jika ada
                alert('Harap perhatikan untuk mengisi semua data.');
            } else {
                // Formulir valid, kirimkan formulir secara manual
                $(this).unbind('submit').submit();
            }
        });

      $('.btn-edit').click(function () {
        var wisataId = $(this).data('wisata-id');

        // Menggunakan AJAX untuk mengambil data budaya dengan ID yang sesuai
        $.ajax({
            url: '/wisata-admin/' + wisataId + '/modal', // Ganti dengan URL yang sesuai
            type: 'GET',
            success: function (response) {
              $('#id_wisata').val(response.id_wisata);
              $('#wisata').val(response.wisata);
              $('#kontak').val(response.kontak);
              $('#notelp').val(response.notelp);
              $('#alamat').val(response.alamat);
              $('#link_post_ig_edit').val(response.link_post_ig);
              $('#link_post_tiktok_edit').val(response.link_post_tiktok);
              $('#link_post_yt_edit').val(response.link_post_yt);

                var deskripsiEditor = document.querySelector("trix-editor#deskripsi").editor;
                deskripsiEditor.loadHTML(response.deskripsi);

                if (response.gambar) {
                  $('#img-preview').attr('src', '/storage/' + response.gambar);
                } else {
                  $('#img-preview').attr('src', '');
                }
            }
        });

        $('#btnCloseModal').click(function() {
          $('#id_wisata').val('');
          $('#wisata').val('');
          $('#kontak').val('');
          $('#notelp').val('');
          $('#alamat').val('');
          $('#gambarEdit').val('');
          $('#link_post_ig').val(''); 
          $('#link_post_tiktok').val(''); 
          $('#link_post_yt').val('');
          
          var deskripsiEditor = document.querySelector("trix-editor#deskripsi").editor;
          deskripsiEditor.setContent('');
          
          $('#img-preview').attr('src','');
          
          $('#modalEdit').modal('hide');
      });
    });
});

function previewImage() {
  const image = document.querySelector('#gambar');
  const imgPreview = document.querySelector('.img-preview');

  if (image.files && image.files[0]) {
    imgPreview.style.display = 'block';

    const fileGambar = new FileReader();
    fileGambar.readAsDataURL(image.files[0]);

    fileGambar.onload = function (gambarEvent) {
      imgPreview.src = gambarEvent.target.result;
    }
  } else {
    // Menampilkan pesan kesalahan dengan SweetAlert
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Tidak ada file yang dipilih',
    });

    // Menampilkan pesan kesalahan di konsol
    console.log(response);
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


    function confirmDelete(wisataId) {
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
                window.location = '/wisata-admin/delete/' + wisataId;
            }
        });
        return false; // Mencegah tautan mengarahkan langsung ke URL
    }



</script>

</main>
@endsection