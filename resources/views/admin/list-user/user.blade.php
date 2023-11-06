@extends ('layout.admin')
@section ('title','Master User')

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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email User</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role User</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                      <th class="text-secondary text-uppercase text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                        @foreach ($user as $u)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 style="white-space: normal;" class="mb-0 text-sm">{{ $u->email }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td style="white-space: normal;"><h6 class="mb-0 text-sm">{{ $u->user_role }}</h6></td>
                            <td style="white-space: normal;"><h6 class="mb-0 text-sm">{{ $u->status }}</h6></td>
                            <td class="align-middle">
                              <a href="#" class="text-secondary font-weight-bold text-xs btn-edit" data-bs-toggle="modal" data-bs-target="#modalEdit" data-user-id="{{ $u->id_user }}">Edit</a> 
                              @if ($u->user_role != 'SuperAdmin')
                              ||
                              <a href="#" class="text-secondary font-weight-bold text-xs btn-delete"
                              onclick="return confirmDelete('{{ $u->id_user }}')">Hapus</a>
                              @endif
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

    <!-- Isi modal edit -->
        <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                      <h1 class="modal-title fs-5" id="editModalLabel">Edit User Terdaftar</h1>
                  </div>
                  <div class="modal-body">
                    <form method="POST" id="editForm" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      {{ method_field('POST') }}
                      <input type="hidden" name="id_user" id="id">
                      <div class="mb-3">
                          <label for="nama" class="form-label">Nama User</label><a class="text-danger">*</a>
                          <input type="text" class="form-control" id="nama" name="nama">
                      </div>
                      <div class="mb-3">
                            <label for="email" class="form-label">Email User</label><a class="text-danger">*</a>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                      <div class="mb-3">
                        <label for="password" class="form-label">Password Pengguna</label><a class="text-danger">*</a>
                        <input type="text" class="form-control" id="password" name="password">
                      </div>
                          <div class="mb-3">
                              <label for="user_role" class="form-label">Role Pengguna</label>
                              <input type="text" class="form-control" id="user_role" name="user_role">
                          </div>
                          <div class="mb-3">
                            <label for="status" class="form-label">Status Pengguna</label>
                            <select class="form-control" id="status" name="status">
                                <option value="Active" selected>Active</option>
                                <option value="Non-Active">Non-Active</option>
                            </select>
                          </div>
                          <div class="mb-3">
                              <label for="created_at" class="form-label">Buat Akun Pada</label>
                              <input type="text" class="form-control" id="created_at" name="created_at">
                          </div>
                          <div class="mb-3">
                              <label for="approved_at" class="form-label">Disetujui Pada</label>
                              <input type="text" class="form-control" id="approved_at" name="approved_at">
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
      $('.btn-edit').click(function () {
        var userId = $(this).data('user-id');

        // Menggunakan AJAX untuk mengambil data budaya dengan ID yang sesuai
        $.ajax({
            url: '/user-admin/' + userId + '/modal', // Ganti dengan URL yang sesuai
            type: 'GET',
            success: function (response) {
              // Sisipkan hasil ke dalam modal
              $('#id').val(response.id_user);
              $('#nama').val(response.nama);
              $('#password').val(response.password);
              $('#email').val(response.email);
              $('#status').val(response.status);
              $('#user_role').val(response.user_role);
              
              // Ubah format tanggal created_at
              var createdDate = new Date(response.created_at);
              var createdDateString = createdDate.toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
              $('#created_at').val(createdDateString);

                // Ubah format tanggal approved_at jika ada
                if (response.approved_at) {
                    var approvedDate = new Date(response.approved_at);
                    var approvedDateString = approvedDate.toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
                    $('#approved_at').val(approvedDateString);
                } else {
                    $('#approved_at').val('');
                }
              }
        });

        $('#btnCloseModal').click(function() {
          $('#id_budaya').val('');
          $('#nama').val('');
          $('#email').val('');
          $('#password').val('');
          $('#email').val('');
          $('#status').val('');  
          $('#user_role').val(''); 
          $('#approved_at').val(''); 
          $('#created_at').val(''); 

      });

      $('#editForm').attr('action', '/edit-user/update/' + userId);

    });
});


    function confirmDelete(userId) {
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
                window.location = '/user-admin/delete/' + userId;
            }
        });
        return false; 
    }


</script>


@endsection