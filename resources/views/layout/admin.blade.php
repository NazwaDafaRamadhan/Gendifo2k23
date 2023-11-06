<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gendifo - @yield('title')</title>

  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="../img/logo-gendifo-besar.png" rel="icon">
  
  <!-- Nucleo Icons -->
  <!-- <link href="css/nucleo-icons.css" rel="stylesheet" />
  <link href="css/nucleo-svg.css" rel="stylesheet" /> -->
  
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="css/nucleo-svg.css" rel="stylesheet" />
  <link href="css/nucleo-icons.css" rel="stylesheet" />
  
  <!-- CSS Files -->
  <link type="text/css" href="css/style-admin.css" rel="stylesheet" />
  <link type="text/css" href="css/app.css" />
  
  <!-- Datatables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />
  
  <!-- Script -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Trix-Editor -->
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
  <script src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

  
  <style>
    .bg-layout-atas{
      width: 100%;
      background: url("../img/latar_desa.jpg");
      background-size: cover;
      position: relative;
    }

    .bg-layout-atas::before {
    content: "";
    background: rgba(0, 0, 0, 0.6);
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1;
    }

    ::-webkit-scrollbar {
        width: 8px;
      }
      ::-webkit-scrollbar-thumb {
        background: #00337c;
        border-radius: 5px;
      }
  </style>
</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="min-height-300 bg-layout-atas position-absolute w-100"></div>
  @include('layout.sidebar-admin')
  <main class="main-content position-relative border-radius-lg ">
    @include('layout.navbar-admin')
    @yield('content')
  </main>
  <!-- Script sweetalert notification -->
  @if (session('toast_error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: "{{ session('toast_error') }}",
                showConfirmButton: false,
                timer: 3000,
                confirmButtonColor: '#005c97',
            });
        </script>
    @endif

    </script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('success') }}",
                showConfirmButton: true,
                timer: 3000,
                confirmButtonColor: '#005c97',
            });
        </script>
    @endif

    <script>
      function confirmLogout() {
          Swal.fire({
              title: 'Konfirmasi Logout',
              text: 'Apakah Anda yakin ingin logout?',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Ya, Logout',
              cancelButtonText: 'Batal'
          }).then((result) => {
              if (result.isConfirmed) {
                  // Jika pengguna mengonfirmasi logout, submit form logout
                  document.getElementById('logout-form').submit();
              }
          });
        }
      </script>

    <!--   Core JS Files   -->
    <script src="js/core/popper.min.js"></script>
    <!--   Core JS Files   -->
    <script src="js/core/popper.min.js"></script>
    <script src="js/core/bootstrap.min.js"></script>
    <script src="js/plugins/perfect-scrollbar.min.js"></script>
    <script src="js/plugins/smooth-scrollbar.min.js"></script>
    <script src="js/plugins/chartjs.min.js"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script>
      var win = navigator.platform.indexOf('Win') > -1;
      if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
          damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
      }
    </script>

    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="js/admin.js"></script>
    
</body>
</html>