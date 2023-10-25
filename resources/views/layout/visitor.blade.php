<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Gendifo - @yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../img/logo-gendifo-besar.png" rel="icon">
  <link href="../img/logo-gendifo-besar.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" type="text/css">
  <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/remixicon/remixicon.css" rel="stylesheet" type="text/css">
  <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css">

  <!-- Template Main CSS File -->
  <link rel="stylesheet" type="text/css" href="css/style-visitor.css">

</head>
<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-xl-9 d-flex align-items-center justify-content-lg-between">
                <a href="{{ url('home') }}" class="logo me-auto me-lg-0"><img alt="logo-putih" src="../img/logo-putih.png"></img></a>
            <!-- <h1 class="logo me-auto me-lg-0"><a href="{{ url('home') }}">Gendifo</a></h1> -->
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <!-- Navbar -->
                <nav id="navbar" class="navbar order-last order-lg-0">
                    <ul>
                    <li><a class="nav-link active" href="{{ url('home') }}">Beranda</a></li>
                    <li><a class="nav-link" href="{{ url('about') }}">Tentang Desa</a></li>
                    <li><a class="nav-link" href="{{ url('wisata') }}">Destinasi Pariwisata</a></li>
                    <li><a class="nav-link " href="{{ url('budaya') }}">Galeri Kebudayaan</a></li>
                    <li><a class="nav-link " href="{{ url('produk') }}">Produk Lokal</a></li>
                    <!-- <li class="dropdown"><a href="{{ url('produk') }}"><span>Produk Lokal</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                        <li><a href="#">Bunga Krisan</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                            <ul>
                            <li><a href="#">Deep Drop Down 1</a></li>
                            <li><a href="#">Deep Drop Down 2</a></li>
                            <li><a href="#">Deep Drop Down 3</a></li>
                            <li><a href="#">Deep Drop Down 4</a></li>
                            <li><a href="#">Deep Drop Down 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Drop Down 2</a></li>
                        <li><a href="#">Drop Down 3</a></li>
                        <li><a href="#">Drop Down 4</a></li>
                        </ul>
                    </li> -->
                    <!-- <li><a class="nav-link scrollto" href="#contact">Hubungi Kami</a></li> -->
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav>
            <!-- End Navbar -->

            </div>
        </div>
        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Top Navbar Section ======= -->
        <div id="top" class="d-flex flex-column justify-content-center">
        </div>
    <!-- End Hero -->

    <!-- Content Section -->
        <main id="main">
            @yield('content')
        </main>
    <!-- End Content Section -->

    <!-- Preloader -->
        <div id="preloader"></div>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!-- End Preloader -->

    <!-- ======= Footer ======= -->
        <footer id="footer">
            <div class="container">
            <h3>Gendifo : Gendro Digital Platforms</h3>
            <p></p>
            <div class="social-links">
                <a href="#" class="tiktok"><i class="bx bxl-tiktok"></i></a>
                <a href="#" class="youtube"><i class="bx bxl-youtube"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            </div>
            <!-- <div class="copyright">
                &copy; Copyright <strong><span>KnightOne</span></strong>. All Rights Reserved
            </div> -->
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/knight-simple-one-page-bootstrap-template/ -->
                Designed by <a href="https://www.instagram.com/p2md_himafortic/">P2MD Himafortic Unesa</a>
            </div>
            </div>
        </footer>
    <!-- End Footer -->

    <!-- Vendor JS Files -->
    <script src="vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/glightbox/js/glightbox.min.js"></script>
    <script src="vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="vendor/swiper/swiper-bundle.min.js"></script>
    <script src="vendor/php-email-form/validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Template Main JS File -->
    <script src="js/visitor.js"></script>

    <!-- Toast Error -->
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
    <!-- Toast Success -->
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


</body>
</html>