<?php
include "inc/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Permadi Website</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- icons -->
  <link href="assets/bizpage/img/rt.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="assets/bizpage/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="assets/bizpage/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/bizpage/lib/animate/animate.min.css" rel="stylesheet">
  <link href="assets/bizpage/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/bizpage/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/bizpage/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="assets/bizpage/css/style.css" rel="stylesheet">

</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="#intro" class="scrollto">PERMADI</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="assets\Bizpage/img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Home</a></li>
          <li><a href="#pengumuman">Pengumuman</a></li>
          <li><a href="#siskam">Jadwal Siskamling</a></li>
          <li><a href="#tamu">Tamu</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a class="btn btn-success pb-1" href="login.php">Login</a></li>

        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active">
            <div class="carousel-background"><img src="assets/bizpage/img/intro-carousel/1.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Selamat Datang Di Aplikasi Permadi</h2>
                <p>Website Terbaik RT 001 RT 008 Graha Chemco</p>
                <a href="login.php" class="btn-get-started scrollto">Get Started</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="assets/bizpage/img/intro-carousel/2.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Sponsorship by Majalah Srawung</h2>
                <p>Majalah Sejuta Umat Warga Graha Chemco</p>
                <a href="login.php" class="btn-get-started scrollto">Get Started</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="assets/bizpage/img/intro-carousel/3.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Calon Emas Putra Putri Bangsa</h2>
                <p>Memiliki Pemuda dan Pemudi Yang Kompeten, Kreatif, Asik, dan Keren</p>
                <a href="login.php" class="btn-get-started scrollto">Get Started</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      Featured Services Section
    ============================-->
    <section id="featured-services">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 box">
            <i class="ion-ios-bookmarks-outline"></i>
            <h4 class="title"><a href="">Layanan 24 Jam</a></h4>
            <p class="description">Kami bersedia melayani anda kapan pun dan dimana pun anda berada</p>
          </div>

          <div class="col-lg-4 box box-bg">
            <i class="ion-ios-stopwatch-outline"></i>
            <h4 class="title"><a href="">Kreatif</a></h4>
            <p class="description">Kami menyediakan calon putra putri bangsa yang kompeten dan kreatif dalam mengembangkan sistem RT 001 RW 008 Graha Chemco</p>
          </div>

          <div class="col-lg-4 box">
            <i class="ion-ios-heart-outline"></i>
            <h4 class="title"><a href="">Gotong Royong</a></h4>
            <p class="description">Ramah dan juga gotong royong adalah pedoman warga RT 001 RW 008 Graha Chemco</p>
          </div>

        </div>
      </div>
    </section><!-- #featured-services -->

    <!--==========================
      Pengumaman Section
    ============================-->
    <section id="pengumuman">
      <div class="container">
        <header class="section-header wow fadeInUp">
          <h3 class="mt-5">Pengumuman</h3>
        </header>

        <div class="row">
          <?php
          $no = 1;
          $sql = $koneksi->query("select * from tb_pengu");
          while ($data = $sql->fetch_assoc()) {
          ?>
            <div class="col-lg-3 col-md-4 wow fadeInUp">
              <div class="card mb-3">
                <div class="card-header bg-success text-white text-center">
                  <h4><b><?php echo $data['judul']; ?></b></h4>
                </div>
                <div class="card-body">
                  <p class="card-text"><?php echo $data['isi']; ?></p>
                  <p class="card-text"><?php echo $data['tanggal']; ?></p>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </section>
    <!-- #pengumuman -->

    <!--==========================
      Siskamling Section
    ============================-->
    <section id="siskam">
      <div class="container">

        <header class="section-header wow fadeInUp">
          <h3>Sistem Keamanan Lingkungan</h3>
          <p>Demi mencegah terjadinya kriminalitas di lingkungan Graha Chemco, kami menyediakan program siskamling secara bergiliran yang dapat di lihat di bawah ini</p>
        </header>

        <div id="siskam" class="card card-info wow fadeInUp">
          <div class="card-header bg-success text-white">
            <h3 class="card-title">
              <i class="fa fa-table"></i> Jadwal siskamling
            </h3>

          </div>
          <form class="mt-4">
            <div class="form-row align-items-center col-12">
              <div class="form-group col-0">
                <label for="rt" class="mb-0">Filter RT:</label>
              </div>
              <div class="form-group col-2">
                <select id="rt-filter" name="rt" class="form-control select2bs4" onchange="filterByRt()">
                  <option value="">Semua</option>
                  <?php
                  // Ambil daftar RT yang tersedia dari tabel
                  $sql_rt = $koneksi->query("SELECT DISTINCT rt FROM tb_pdd ORDER BY rt ASC");
                  while ($data_rt = $sql_rt->fetch_assoc()) {
                    $selected = isset($_GET['rt']) && $_GET['rt'] == $data_rt['rt'] ? 'selected' : '';
                    echo '<option value="' . $data_rt['rt'] . '" ' . $selected . '>' . $data_rt['rt'] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
          </form>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>RT</th>
                  <th>Minggu ke -</th>
                  <th>Shift Jaga</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $sql = "SELECT p.id_pend, p.nik, p.nama, p.rt, d.minggu, d.jaga, d.id_siskam FROM tb_siskam d INNER JOIN tb_pdd p ON p.id_pend = d.id_pdd";

                // Filter RT jika ada yang dikirimkan
                if (isset($_GET['rt']) && $_GET['rt'] != '') {
                  $rt_filter = $_GET['rt'];
                  $sql .= " WHERE p.rt = '$rt_filter'";
                }

                $sql .= " ORDER BY p.rt";
                $result = $koneksi->query($sql);

                while ($data = $result->fetch_assoc()) {
                  // Kode berikutnya
                ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nik']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['rt']; ?></td>
                    <td><?php echo $data['minggu']; ?></td>
                    <td><?php echo $data['jaga']; ?></td>
                  </tr>
                <?php
                }
                ?>

              </tbody>
              <tfoot>
                <!-- Footer Table -->
              </tfoot>
            </table>
          </div>
        </div>

    </section><!-- #Siskam -->

    <!--==========================
      Tamu Section
    ============================-->
    <section id="tamu">
      <div class="container">

        <header class="section-header wow fadeInUp mt-5">
          <h3>Daftar Tamu</h3>
          <p>Tamu lebih dari 24 jam, harap lapor kepala RT!</p>
        </header>

        <div class="card card-info wow fadeInUp">
          <div class="card-header bg-success text-white">
            <h3 class="card-title">
              <i class="fa fa-table"></i> Daftar Tamu
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="table-responsive">
              <br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>

                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal</th>
                    <th>Pelapor</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT d.id_datang, d.nik, d.nama_datang, d.jekel, d.tgl_datang, p.nama from 
			                                    tb_datang d inner join tb_pdd p on d.pelapor=p.id_pend");
                  while ($data = $sql->fetch_assoc()) {
                  ?>

                    <tr>
                      <td>
                        <?php echo $data['nama_datang']; ?>
                      </td>
                      <td>
                        <?php echo $data['jekel']; ?>
                      </td>
                      <td>
                        <?php echo $data['tgl_datang']; ?>
                      </td>
                      <td>
                        <?php echo $data['nama']; ?>
                      </td>
                    </tr>

                  <?php
                  }
                  ?>
                </tbody>
                </tfoot>
              </table>
            </div>
          </div>

        </div>
    </section><!-- #services -->

    <!--==========================
      Team Section
    ============================-->
    <section id="team">
      <div class="container">
        <div class="section-header wow fadeInUp">
          <h3>Presented By</h3>
        </div>

        <div class="row">

          <div class="col-4 wow fadeInUp mx-auto">
            <div class="member">
              <img src="assets/bizpage/img/team.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Alessandro Pramudhita Putra Setyawan</h4>
                  <span>Web Developer</span>
                  <div class="social">
                    <a href=""><i class="fa fa-instagram"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #team -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h3>Contact Us</h3>
          <p>Jika ada pertanyaan, Anda dapat menghubungi kontak di bawah ini</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address>Graha Chemco, Cikarang Utara-17530, Indonesia</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="#">+62 812 8848 6678</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="#">alpraz@gmail.com</a></p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row d-flex justify-content-between">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>PERMADI</h3>
            <p>Permadi adalah sebuah website yang dirancang untuk mengelola dan mengurus data penduduk serta informasi terkait di suatu wilayah atau negara. Website ini bertujuan untuk menyediakan platform yang efisien dan terintegrasi dalam mengumpulkan, menyimpan, memperbarui, dan menganalisis data penduduk dengan mudah.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              Graha Chemco <br>
              Cikarang Utara, 17530<br>
              Indonesia <br>
              <strong>Phone:</strong> +6281288486678<br>
              <strong>Email:</strong> alpraz@gmail.com<br>
            </p>

            <div class="social-links">
              <a href="https://www.facebook.com/Alessandro.Setyawan" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="https://www.instagram.com/alpraznolimitz/" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="https://mail.google.com/mail/u/0/#inbox?compose=CllgCJvqsgWhQsLFhRrDKchHRvHGlXvcWmpRfPcbZvFKzfrSCzWtzGrWZMnWkWwxMXZlZchNTLq" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="https://www.linkedin.com/in/alessandro-pramudhita-putra-setyawan-880685141/" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum dolore legam minim quorum culpa amet magna export quem marada parida nodela caramase seza.</p>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Alpraz</strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="assets/bizpage/lib/jquery/jquery.min.js"></script>
  <script src="assets/bizpage/lib/jquery/jquery-migrate.min.js"></script>
  <script src="assets/bizpage/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/bizpage/lib/easing/easing.min.js"></script>
  <script src="assets/bizpage/lib/superfish/hoverIntent.js"></script>
  <script src="assets/bizpage/lib/superfish/superfish.min.js"></script>
  <script src="assets/bizpage/lib/wow/wow.min.js"></script>
  <script src="assets/bizpage/lib/waypoints/waypoints.min.js"></script>
  <script src="assets/bizpage/lib/counterup/counterup.min.js"></script>
  <script src="assets/bizpage/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="assets/bizpage/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="assets/bizpage/lib/lightbox/js/lightbox.min.js"></script>
  <script src="assets/bizpage/lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="assets/bizpage/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="assets/bizpage/js/main.js"></script>
  <script>
    function filterByRt() {
      var selectedrt = document.getElementById("rt-filter").value;
      if (selectedrt !== "") {
        window.location.href = "?page=data-siskam&rt=" + selectedrt;
      } else {
        window.location.href = "?page=data-siskam";
      }
    }
  </script>
</body>

</html>