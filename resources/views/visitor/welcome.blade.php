@section('title', 'Welcome')

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

          <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
              <li><a class="nav-link active" href="{{ url('home') }}">Beranda</a></li>
              <li><a class="nav-link" href="{{ url('about') }}">Tentang Desa</a></li>
              <li><a class="nav-link" href="{{ url('wisata') }}">Destinasi Wisata</a></li>
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
              <!-- <li><a class="nav-link scrollto" href="#contact">Contact Us</a></li> -->
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->

        </div>
      </div>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-8">
          <h1>SELAMAT DATANG DI DESA GENDRO</h1>
          <h2>Gendifo : Gendro's Digital Platform</h2>
          <a href="../video/profil-gendifo.mp4" class="glightbox play-btn mb-4"></a>
        </div>
      </div>
    </div>
  </section>
  <!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
      <section id="about" class="about">
        <div class="container">

          <div class="section-title">
            <h2>Tentang Desa</h2>
            <p style="text-align: justify;">Desa Gendro, sebuah desa di Kecamatan Tutur, Pasuruan, Jawa Timur, memikat dengan lima dusun uniknya dan beragam mata pencaharian, termasuk pertanian buah dan sayur, peternakan sapi perah, serta budidaya bunga krisan yang menawan. Disamping pesona alamnya, desa ini juga menjaga warisan budaya dan tradisinya. Dengan kedamaian pedesaan dan keramahan penduduknya, Gendro adalah tempat yang sempurna untuk melarikan diri dari kehidupan perkotaan dan mengeksplorasi keindahan alam serta budaya lokal. Selamat datang di Desa Gendro, tempat Anda akan menemukan pengalaman tak terlupakan di Jawa Timur, Indonesia.</p>
          </div>

          <div class="row content">
            <div class="col-lg-6">
              <p>
                Di tengah hutan pinus yang memikat, Desa Gendro menyuguhkan:
              </p>
              <ul>
                <li><i class="ri-check-double-line"></i> Wisata Pinus yang sejuk dan menenangkan.</li>
                <li><i class="ri-check-double-line"></i> Kearifan lokal dan budaya desa yang mempesona.</li>
                <li><i class="ri-check-double-line"></i> Produk khas masyarakat desa yang unik dan menggoda selera.
                </li>
              </ul>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0">
              <p style="text-align: justify;">
                Temukan pesona alam dan kekayaan tradisi lokal yang menantang Anda untuk menjelajah lebih dalam, mengungkap rahasia dan kenikmatan yang tersembunyi di sini.
              </p>
              <a href="/about" class="btn-learn-more">Lihat Selengkapnya</a>
            </div>
          </div>


        </div>
      </section>
    <!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
  <div class="container">
    <div class="section-title">
      <h2>Potensi Desa</h2>
      <p>Desa Gendro adalah harta berpotensi tanpa batas. Budaya kaya, warisan memukau, produk khas menggoda - semuanya menunggu untuk dijelajahi. Tarian lokal memikat, kerajinan tangan eksotis dan bunga krisan menawan, sementara hutan pinus menawarkan ketenangan dan keindahan alam. Selamat datang untuk menjelajahi potensi luar biasa di Desa Gendro.</p>
    </div>

    <div class="row">
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
        <div class="icon-box">
          <div class="icon"><i class="bx bx-slideshow"></i></div>
          <h4><a href="/budaya">Kebudayaan Lokal</a></h4>
          <p>Nikmati tarian tradisional yang memukau, musik khas, dan festival budaya yang meriah.</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
        <div class="icon-box">
          <div class="icon"><i class="bx bx-file"></i></div>
          <h4><a href="/produk">Produk Lokal</a></h4>
          <p>Temukan kerajinan tangan eksotis, bunga krisan cantik, dan makanan khas yang memanjakan lidah.</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
        <div class="icon-box">
          <div class="icon"><i class="bx bx-arch"></i></div>
          <h4><a href="/wisata">Destinasi Wisata</a></h4>
          <p>Rasakan keindahan alam dan ketenangan hutan pinus yang memikat.</p>
        </div>
      </div>
    </div>
  </div>
</section>

    <!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 text-center text-lg-start">
        <h3>Hubungi Kami</h3>
        <p> Temukan potensi luar biasa dan kekayaan Desa Gendro. Bergabunglah dengan kami dalam perjalanan unik untuk merasakan budaya lokal yang kaya, produk khas yang menggoda, dan keindahan alam yang menenangkan. Jadilah bagian dari pengalaman yang tak terlupakan.</p>
      </div>
      <div class="col-lg-3 cta-btn-container text-center">
        <a class="cta-btn align-middle" href="https://www.instagram.com/direct/t/17843552136077905/">Hubungi Lebih Lanjut</a>
      </div>
    </div>
  </div>
</section>

    <!-- End Cta Section -->

    <!-- ======= Features Section ======= -->
      <!-- <section id="features" class="features">
        <div class="container">

          <div class="row">
            <div class="col-lg-6 order-2 order-lg-1">
              <div class="icon-box mt-5 mt-lg-0">
                <i class="bx bx-receipt"></i>
                <h4>Est labore ad</h4>
                <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
              </div>
              <div class="icon-box mt-5">
                <i class="bx bx-cube-alt"></i>
                <h4>Harum esse qui</h4>
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
              </div>
              <div class="icon-box mt-5">
                <i class="bx bx-images"></i>
                <h4>Aut occaecati</h4>
                <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
              </div>
              <div class="icon-box mt-5">
                <i class="bx bx-shield"></i>
                <h4>Beatae veritatis</h4>
                <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p>
              </div>
            </div>
            <div class="image col-lg-6 order-1 order-lg-2" style='background-image: url("assets/img/features.jpg");'></div>
          </div>

        </div>
      </section> -->
    <!-- End Features Section -->

    <!-- ======= Counts Section ======= -->
      <!-- <section id="counts" class="counts">
        <div class="container">

          <div class="text-center title">
            <h3>What we have achieved so far</h3>
            <p>Iusto et labore modi qui sapiente xpedita tempora et aut non ipsum consequatur illo.</p>
          </div>

          <div class="row counters position-relative">

            <div class="col-lg-3 col-6 text-center">
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
              <p>Clients</p>
            </div>

            <div class="col-lg-3 col-6 text-center">
              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
              <p>Projects</p>
            </div>

            <div class="col-lg-3 col-6 text-center">
              <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
              <p>Hours Of Support</p>
            </div>

            <div class="col-lg-3 col-6 text-center">
              <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
              <p>Hard Workers</p>
            </div>

          </div>

        </div>
      </section> -->
    <!-- End Counts Section -->

    <!-- ======= Portfolio Section ======= -->
      <section id="portfolio" class="portfolio">
        <div class="container">

          <div class="section-title">
            <h2>Galeri Gendifo</h2>
            <p>Terinspirasi oleh keanekaragaman budaya, produk khas, dan destinasi wisata, kami menyajikan pengalaman yang tak terlupakan. Temukan pesona lokal yang memukau melalui galeri kami.</p>
          </div>

          <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">All</li>
                <li data-filter=".filter-budaya">Budaya</li>
                <li data-filter=".filter-produk">Produk</li>
                <li data-filter=".filter-wisata">Wisata</li>
              </ul>
            </div>
          </div>

          <div class="row portfolio-container">

            <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 1</h4>
                <p>App</p>
                <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div> -->

            <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div> -->

            <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 2</h4>
                <p>App</p>
                <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div> -->

            <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 2</h4>
                <p>Card</p>
                <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div> -->

            <div class="col-lg-4 col-md-6 portfolio-item filter-wisata">
              <img src="../img/pinus.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Wisata</h4>
                <p>Hutan Pinus Gendro</p>
                <!-- <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a> -->
                <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-produk">
              <img src="../img/bunga-krisan.jpg" class="img-fluid" alt="" style="max-height: fit-content !important;">
              <div class="portfolio-info">
                <h4>Produk</h4>
                <p>Bunga Krisan</p>
                <!-- <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 3"><i class="bx bx-plus"></i></a> -->
                <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

            <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 1</h4>
                <p>Card</p>
                <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div> -->

            <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 3</h4>
                <p>Card</p>
                <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div> -->

            <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div> -->

          </div>

        </div>
      </section>
    <!-- End Portfolio Section -->

    <!-- ======= Pricing Section ======= -->
      <!-- <section id="pricing" class="pricing">
        <div class="container">

          <div class="section-title">
            <h2>Pricing</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
          </div>

          <div class="row">

            <div class="col-lg-4 col-md-6">
              <div class="box">
                <h3>Free</h3>
                <h4><sup>$</sup>0<span> / month</span></h4>
                <ul>
                  <li>Aida dere</li>
                  <li>Nec feugiat nisl</li>
                  <li>Nulla at volutpat dola</li>
                  <li class="na">Pharetra massa</li>
                  <li class="na">Massa ultricies mi</li>
                </ul>
                <div class="btn-wrap">
                  <a href="#" class="btn-buy">Buy Now</a>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
              <div class="box recommended">
                <span class="recommended-badge">Recommended</span>
                <h3>Business</h3>
                <h4><sup>$</sup>19<span> / month</span></h4>
                <ul>
                  <li>Aida dere</li>
                  <li>Nec feugiat nisl</li>
                  <li>Nulla at volutpat dola</li>
                  <li>Pharetra massa</li>
                  <li class="na">Massa ultricies mi</li>
                </ul>
                <div class="btn-wrap">
                  <a href="#" class="btn-buy">Buy Now</a>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
              <div class="box">
                <h3>Developer</h3>
                <h4><sup>$</sup>29<span> / month</span></h4>
                <ul>
                  <li>Aida dere</li>
                  <li>Nec feugiat nisl</li>
                  <li>Nulla at volutpat dola</li>
                  <li>Pharetra massa</li>
                  <li>Massa ultricies mi</li>
                </ul>
                <div class="btn-wrap">
                  <a href="#" class="btn-buy">Buy Now</a>
                </div>
              </div>
            </div>

          </div>

        </div>
      </section> -->
    <!-- End Pricing Section -->

    <!-- ======= Faq Section ======= -->
      <!-- <section id="faq" class="faq">
        <div class="container-fluid">

          <div class="row">

            <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

              <div class="content">
                <h3>Frequently Asked <strong>Questions</strong></h3>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                </p>
              </div>

              <div class="accordion-list">
                <ul>
                  <li>
                    <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1">Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                      <p>
                        Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                      </p>
                    </div>
                  </li>

                  <li>
                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed">Feugiat scelerisque varius morbi enim nunc? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                      <p>
                        Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                      </p>
                    </div>
                  </li>

                  <li>
                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed">Dolor sit amet consectetur adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                      <p>
                        Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                      </p>
                    </div>
                  </li>

                </ul>
              </div>

            </div>

            <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("assets/img/faq.jpg");'>&nbsp;</div>
          </div>

        </div>
      </section> -->
    <!-- End Faq Section -->

    <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container">

          <div class="section-title">
            <h2>Kunjungi Desa Gendro</h2>
            <p style="text-align: justify;">"Ayo, mari kita berkunjung ke Desa Gendro dan nikmati pesonanya yang memikat! Temukan keindahan alam, budaya lokal yang kaya, dan sambutan hangat dari penduduknya. Suasana damai dan kebersamaan menanti kita di sini. Jangan lewatkan kesempatan untuk menciptakan kenangan indah di Desa Gendro!"</p>
          </div>
        </div>

        <div style="display: flex; justify-content: center; align-items: center;">
            <iframe style="border:0; width: 90%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.037885837115!2d112.80565527384611!3d-7.891105378499008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd62df53ad78173%3A0x66e7bea56baafe48!2sDesa%20Gendro%20Kec%20Tutur%20Kab.Pasuruan!5e0!3m2!1sen!2sid!4v1699215540707!5m2!1sen!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </section>
    <!-- End Contact Section -->

        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients">
        <div class="container">
          <div class="section-title">
            <h2 style=" margin-bottom: 20px;"><b>GENDIFO PARTNERSHIP WITH</b></h2>
          </div>

          <div class="row no-gutters clients-wrap clearfix wow fadeInUp">

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <a href="https://api.whatsapp.com/send?phone=6281334579931">
                <img src="../img/logo_sanggar.jpg" class="" alt="">
                <div class="hover-text">Sanggar Bu Hariyati</div>
              </a>
            </div>
          </div>

            <div class="col-lg-3 col-md-4 col-xs-6">
              <div class="client-logo">
                <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
              </div>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6">
              <div class="client-logo">
                <img src="assets/img/clients/client-7.png" class="img-fluid" alt="">
              </div>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6">
              <div class="client-logo">
                <img src="assets/img/clients/client-8.png" class="img-fluid" alt="">
              </div>
            </div>

          </div>

        </div>
      </section>
    <!-- End Clients Section -->

    </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Gendifo : Gendro's Digital Platform</h3>
      <p></p>
      <div class="social-links">
        <a href="https://www.tiktok.com/@desa.gendro?_t=8g3oR9i6hPN&_r=1" class="tiktok"><i class="bx bxl-tiktok"></i></a>
        <a href="https://youtube.com/@desagendro?si=SMQtsets_6lgZ74y" class="youtube"><i class="bx bxl-youtube"></i></a>
        <a href="https://instagram.com/desagendro?igshid=NzZlODBkYWE4Ng" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="mailto:gendrodesa@gmail.com" class="gmail"><i class="bx bxl-gmail"></i></a>
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
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <style>
    .client-logo {
        position: relative;
        overflow: hidden;
      }

      .hover-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 10px;
        border-radius: 5px;
        display: none;
      }

      .client-logo:hover .hover-text {
        display: block;
      }

  </style>

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

</body>

</html>