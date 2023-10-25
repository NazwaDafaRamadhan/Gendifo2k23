@extends ('layout.admin')
@section ('title','Master Kegiatan')

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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Kegiatan</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Kegiatan</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Dibuat</th>
                      <th class="text-secondary text-uppercase text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                        @foreach ($kegiatan as $k)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 style="white-space: normal;" class="mb-0 text-sm">{{ $k->kegiatan }}</h6>
                                        <!-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> -->
                                    </div>
                                </div>
                            </td>
                            <td style="white-space: normal;"><h6 class="mb-0 text-sm">{{ $k->tgl_kegiatan }}</h6></td>
                            <td style="white-space: normal;"><h6 class="mb-0 text-sm">{{ $k->created_at }}</h6></td>
                            <td class="align-middle">
                              <a href="#" class="text-secondary font-weight-bold text-xs btn-edit" data-bs-target="#modalEdit" data-bs-toggle="modal" data-kegiatan-id="{{ $k->id_kegiatan }}">Edit</a> ||
                              <a href="/kegiatan/delete/{{ $k->id_kegiatan }}" class="text-secondary font-weight-bold text-xs btn-delete">Hapus</a>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Jadwal Kegiatan</h1>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/add-kegiatan/store" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="kegiatan" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="namaKegiatan" name="kegiatan">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Kontak Narahubung</label>
                        <input type="text" class="form-control" id="kontakKegiatan" name="kontak">
                    </div>
                    <div class="mb-3">
                        <label for="notelp" class="form-label">No Telepon</label>
                        <input type="text" class="form-control" id="notelpKegiatan" name="notelp">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea type="text" class="form-control" id="deskripsiKegiatan" name="deskripsi"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_kegiatan" class="form-label">Tanggal Kegiatan</label>
                        <input type="date" class="form-control" id="tgl_kegiatan" name="tgl_kegiatan">
                    </div>
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
                        <h1 class="modal-title fs-5" id="editModalLabel">Edit Kegiatan</h1>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="/edit-kegiatan/update/{{ request()->route('id') }}" id="editForm" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                        <input type="hidden" name="id_kegiatan" id="id_kegiatan">
                        <div class="mb-3">
                            <label for="namaKegiatan" class="form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="kegiatan" name="kegiatan">
                        </div>
                        <div class="mb-3">
                              <label for="kontak" class="form-label">Kontak Narahubung</label>
                              <input type="text" class="form-control" id="kontak" name="kontak">
                        </div>
                        <div class="mb-3">
                              <label for="notelp" class="form-label">No Telepon</label>
                              <input type="text" class="form-control" id="notelp" name="notelp">
                        </div>
                        <div class="mb-3">
                              <label for="deskripsi" class="form-label">Deskripsi</label>
                              <textarea type="text" class="form-control" id="deskripsi" name="deskripsi"></textarea>
                        </div>
                        <div class="mb-3">
                          <label for="tgl_Kegiatan" class="form-label">Tanggal Kegiatan</label>
                          <input type="date" class="form-control" id="tgl_kegiatan" name="tgl_kegiatan">
                        </div>
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

</main>

<script>
    $(document).ready(function () {
    // Tangani klik tombol "Edit"
    $('.btn-edit').click(function () {
        var kegiatanId = $(this).data('kegiatan-id');

        // Menggunakan AJAX untuk mengambil data kegiatan dengan ID yang sesuai
        $.ajax({
            url: '/kegiatan/' + kegiatanId + '/modal', // Ganti dengan URL yang sesuai
            type: 'GET',
            success: function (response) {
                // Isi formulir modal dengan data yang diterima
                $('#id_kegiatan').val(kegiatanId);
                $('#kegiatan').val(response.kegiatan);
                $('#kontak').val(response.kontak);
                $('#notelp').val(response.notelp);
                $('#tgl_kegiatan').val(response.tgl_kegiatan);
            }
        });
    });

    // Tangani klik tombol "Simpan" pada modal update
    $('#editForm').submit(function (event) {
        event.preventDefault(); // Mencegah pengiriman form biasa
        var formData = $(this).serialize();

        $.ajax({
            url: '/edit-kegiatan/update/{id}', // Ganti dengan URL yang sesuai
            type: 'POST',
            data: formData,
            success: function (response) {
                // Tambahkan logika atau respons sesuai kebutuhan
                if (response.success) {
                      Swal.fire({
                      title: 'Pemberitahuan!',
                      text: response.message,
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 1500 // Waktu tampilan pesan (opsional)
                  }).then(() => {
                      // Tutup modal
                      $('#modalEdit').modal('hide');

                      // Reload halaman
                      location.reload();
                  });
                } else {
                    // Jika pembaruan gagal, tampilkan pesan kesalahan
                    console.error(response.message);
                }
            },
        });
    });
});

</script>

</main>
@endsection