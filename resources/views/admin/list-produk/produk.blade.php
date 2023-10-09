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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kontak</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deskripsi Produk</th>
                      <th class="text-secondary text-uppercase text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                        @foreach ($produk as $p)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                        <img src="" class="avatar avatar-sm me-3" alt="">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 style="white-space: normal;" class="mb-0 text-sm">{{ $p->produk }}</h6>
                                        <!-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> -->
                                    </div>
                                </div>
                            </td>
                            <td style="white-space: normal;"><h6 class="mb-0 text-sm">{{ $p->kontak }}</h6></td>
                            <td style="white-space: normal;"><h6 class="mb-0 text-sm">{{ $p->deskripsi }}</h6></td>
                            <td class="align-middle"><a href="#" class="text-secondary font-weight-bold text-xs btn-edit" data-bs-toggle="modal" data-bs-target="#modalEdit" data-produk-id="{{ $p->id_produk }}">Edit</a></td>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Mitra</h1>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/add-produk/store" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="mitra" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="namaProduk" name="produk">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Kontak Narahubung</label>
                        <input type="text" class="form-control" id="kontakProduk" name="kontak">
                    </div>
                    <div class="mb-3">
                        <label for="notelepon" class="form-label">Deskripsi</label>
                        <textarea type="text" class="form-control" id="deskripsiProduk" name="deskripsi"></textarea>
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
                      <h1 class="modal-title fs-5" id="editModalLabel">Edit Produk</h1>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="/produk/update" id="editForm" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      {{ method_field('POST') }}
                      <input type="hidden" name="id_produk" id="id_produk">
                      <div class="mb-3">
                          <label for="namaProduk" class="form-label">Nama Produk</label>
                          <input type="text" class="form-control" id="produk" name="produk">
                      </div>
                      <div class="mb-3">
                            <label for="alamat" class="form-label">Kontak Narahubung</label>
                            <input type="text" class="form-control" id="kontak" name="kontak">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea type="text" class="form-control" id="deskripsi" name="deskripsi"></textarea>
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
            var produkId = $(this).data('produk-id');

            // Menggunakan AJAX untuk mengambil data produk dengan ID yang sesuai
            $.ajax({
                url: '/produk/' + produkId + '/modal', // Ganti dengan URL yang sesuai
                type: 'GET',
                success: function (response) {
                    // Isi formulir modal dengan data yang diterima
                    $('#id_produk').val(produkId);
                    $('#produk').val(response.produk);
                    $('#kontak').val(response.kontak);
                    $('#deskripsi').val(response.deskripsi);
                }
            });
        });
    });

    $(document).ready(function () {
    // ...

    // Tangani klik tombol "Simpan" pada modal update
    $('#editForm').submit(function (event) {
        event.preventDefault(); // Mencegah pengiriman form biasa
        var formData = $(this).serialize();

        $.ajax({
            url: '/produk/update', // Ganti dengan URL yang sesuai
            type: 'POST',
            data: formData,
            success: function (response) {
                // Tambahkan logika atau respons sesuai kebutuhan
                if (response.success) {
                    // Jika pembaruan berhasil, tampilkan pesan sukses
                    console.log(response.message);
                    // Tutup modal
                    $('#modalEdit').modal('hide');
                    // Reload atau perbarui data tampilan sesuai kebutuhan
                    location.reload(); // Contoh: Perbarui halaman setelah berhasil
                } else {
                    // Jika pembaruan gagal, tampilkan pesan kesalahan
                    console.error(response.message);
                    // Tampilkan pesan kesalahan ke pengguna sesuai kebutuhan
                    // Misalnya, tampilkan pesan kesalahan di dalam modal atau tampilan
                }
            },
            error: function (xhr, status, error) {
                // Tangani kesalahan AJAX jika diperlukan
                console.error(error);
                // Tampilkan pesan kesalahan ke pengguna sesuai kebutuhan
                // Misalnya, tampilkan pesan kesalahan di dalam modal atau tampilan
            }
        });
    });
});

</script>


@endsection