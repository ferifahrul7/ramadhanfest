<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ramadhan Pekalongan Fest 2021</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/frontend/icon/apple-icon-57x57.png') }}">
  <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/frontend/icon/apple-icon-60x60.png') }}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/frontend/icon/apple-icon-72x72.png') }}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/frontend/icon/apple-icon-76x76.png') }}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/frontend/icon/apple-icon-114x114.png') }}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/frontend/icon/apple-icon-120x120.png') }}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/frontend/icon/apple-icon-144x144.png') }}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/frontend/icon/apple-icon-152x152.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/frontend/icon/apple-icon-180x180.png') }}">
  <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/frontend/icon/android-icon-192x192.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/frontend/icon/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/frontend/icon/favicon-96x96.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/frontend/icon/favicon-16x16.png') }}">
  <link rel="manifest" href="{{ asset('assets/frontend/manifest.json') }}">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="{{ asset('assets/frontend/icon/ms-icon-144x144.png') }}">
  <meta name="theme-color" content="#ffffff">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Krub:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/frontend/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/frontend/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/frontend/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/frontend/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/frontend/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bikin - v2.2.1
  * Template URL: https://bootstrapmade.com/bikin-free-simple-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!-- <h1 class="logo mr-auto"><a href="index.html">Ramadhan Pekalongan Fest 2021</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="#home" class="logo mr-auto"><img src="{{ asset('assets/img/logo/logo.png') }}" alt="" class="img-fluid"></a>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#about">Tentang</a></li>
          <li><a href="#steps">Petunjuk</a></li>

        </ul>
      </nav><!-- .nav-menu -->

      <a href="{{ route('pendaftaran.create') }}" class="get-started-btn">Daftar Sekarang!</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container d-flex flex-column align-items-center justify-content-center" data-aos="fade-up">
      <h1>Ramadhan Pekalongan Fest 2021</h1>
      <h2>Event Ramadhan Terbesar Di Pekalongan</h2>
      <img src="{{ asset('assets/frontend/img/hero-img.png') }}" class="img-fluid hero-img" alt="" data-aos="zoom-in" data-aos-delay="150">

      <a href="#about" class="btn-get-started scrollto">Penasaran?</a>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row no-gutters">
          <div class="content col-xl-5 d-flex align-items-stretch" data-aos="fade-right">
            <div class="content">
              <h3>Ramadhan Pekalongan Fest 2021</h3>
              <p>
                Event Ramadhan Terbesar Di Pekalongan
              </p>
              <a href="{{ route('pendaftaran.create') }}" class="get-started-btn">Daftar Sekarang!</a>
            </div>
          </div>
          <div class="col-xl-7 d-flex align-items-stretch" data-aos="fade-left">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                  <i class="bx bx-cookie"></i>
                  <h4>Culinary Festival</h4>
                  <p>Menampilkan ragam makanan khas
                    Pekalongan, khususnya makanan produk
                    UMKM terbaik, untuk meningkatkan
                    industri kuliner di Kota Pekalongan.</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                  <i class="bx bx-laugh"></i>
                  <h4>Ngabuburit</h4>
                  <p>Ngabuburit menjelang waktu berbuka puasa
                    dengan menikmati hiburan musik, kesenian dan
                    budaya Kota Pekalongan, dengan menerapkan
                    protokol kesehatan dan sosial distancing antar
                    pengunjung festival di area festival</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                  <i class="bx bx-group"></i>
                  <h4>Expo</h4>
                  <p>
                    Menampilkan berbagai macam produk
                    unggulan daerah yang berkualitas. Menjadi
                    ajang promosi UMKM maupun multiproduk
                    Kota Pekalongan setelah menurunnya
                    perekonomian di tengah pandemi.
                  </p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                  <i class="bx bx-microphone"></i>
                  <h4>Lomba Religi</h4>
                  <p>Menampilkan lomba-lomba religi anakanak dalam berbagai kategori, untuk
                    manjadi wadah berkreasi dan berkreatif
                    di tengah pandemi berlangsung</p>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <section id="counter" class="counter">
      <div class="container">
        <div class="row d-flex align-items-stretch">
          <div class="col-md-4 my-2">
            <div class="card bg-info text-light" data-aos="fade-right">
              <div class="card-body text-center">
                <span class="text-center">Pengunjung belum masuk area</span>
                <h1 id="pengunjung-daftar" class="text-center">{{ $pengunjung['daftar'] }}</h1>
              </div>
            </div>
          </div>
          <div class="col-md-4 my-2">
            <div class="card bg-success text-light" data-aos="fade-right">
              <div class="card-body text-center">
                <span class="text-center">Pengunjung berada di didalam area</span>
                <h1 id="pengunjung-in" class="text-center">{{ $pengunjung['in'] }}</h1>
              </div>
            </div>
          </div>
          <div class="col-md-4 my-2">
            <div class="card bg-warning text-light" data-aos="fade-right">
              <div class="card-body text-center">
                <span class="text-center">Pengunjung sudah keluar</span>
                <h1 id="pengunjung-out" class="text-center">{{ $pengunjung['out'] }}</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ======= Steps Section ======= -->
    <section id="steps" class="steps">
      <div class="container">

        <div class="row no-gutters" data-aos="fade-up">

          <div class="col-lg-3 col-md-6 content-item" data-aos="fade-up" data-aos-delay="100">
            <span>01</span>
            <h5>Daftar Melalui Website</h5>
            <p>Daftarkan diri Anda melalui website ini dan dapatkan kode pendaftaran.</p>
          </div>

          <div class="col-lg-3 col-md-6 content-item" data-aos="fade-up" data-aos-delay="200">
            <span>02</span>
            <h5>Persiapkan Kode Pendaftaran Anda</h5>
            <p>Tunjukkan kode tersebut kepada Panitia ketika akan menghadiri festival.</p>
          </div>

          <div class="col-lg-3 col-md-6 content-item" data-aos="fade-up" data-aos-delay="300">
            <span>03</span>
            <h5>Patuhi Protokol kesehatan</h5>
            <p>Tetap patuhi protokol kesehatan saat mengikuti festival.</p>
          </div>

          <div class="col-lg-3 col-md-6 content-item" data-aos="fade-up" data-aos-delay="100">
            <span>04</span>
            <h5>Keluar dengan Tertib</h5>
            <p>Keluar dengan menunjukkan kembali kode pendaftaran kepada Panitia.</p>
          </div>

        </div>
    </section><!-- End Steps Section -->


    <!-- ======= questions Section ======= -->
    <section id="testimonials" class="questions section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Info Lebih Lanjut</h2>
          <p>Ikuti sosial media kami untuk mendapatkan informasi lebih lanjut.</p>
        </div>
        <div class="social-links text-center pt-3 pt-md-0">
          <a href="https://instagram.com/ramadhanpekalonganfest" class="instagram"><i class="bx bxl-instagram"></i></a> Instagram
        </div>
      </div>
    </section><!-- End questions Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Powered By <strong><span>Ramadhan Pekalongan Fest</span></strong>.
        </div>
        <div class="credits" style="display:none">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bikin-free-simple-landing-page-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="https://wa.me/6282250500588" class="whatsapp"><i class="bx bxl-whatsapp"></i></a> Info Booking Tenant (Faki)
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/frontend/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/frontend/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/vendor/aos/aos.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/frontend/js/main.js') }}"></script>
  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher("{{ config('broadcasting.connections.pusher.key') }}", {
        cluster: "{{ config('broadcasting.connections.pusher.options.cluster') }}"
    });

    var channel = pusher.subscribe('pengunjung-counter');
    channel.bind('App\\Events\\PengunjungAction', function(data) {

        $('#pengunjung-daftar').fadeOut(400, function() {
            $('#pengunjung-daftar').text(data.jumlah_daftar);
            $('#pengunjung-daftar').fadeIn(400);
        });

        $('#pengunjung-in').fadeOut(400, function() {
            $('#pengunjung-in').text(data.jumlah_in);
            $('#pengunjung-in').fadeIn(400);
        });

        $('#pengunjung-out').fadeOut(400, function() {
            $('#pengunjung-out').text(data.jumlah_out);
            $('#pengunjung-out').fadeIn(400);
        });
    });
</script>

</body>

</html>