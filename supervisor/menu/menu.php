<?php
session_start(); // Start session nya

// Kita cek apakah user sudah login atau belum
// Cek nya dengan cara cek apakah terdapat session username atau tidak
if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
    header("location: ../../index.php"); // Kita Redirect ke halaman index.php karena belum login
}
?>

<!DOCTYPE html>
<?php 
include 'koneksi.php'
?>

<html lang="en">
  <head>
    <title>S A P | Menu</title>
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/coba2.png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="../../logout.php">Logout</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link"> Selamat Datang Supervisor [
               <?php $id_karyawan = $_SESSION['id_karyawan']; 
              $query = mysqli_query($koneksi, "SELECT nama FROM karyawan WHERE id_karyawan='$id_karyawan'");
              while ($apakah=mysqli_fetch_object($query))
               {
                  echo $apakah->nama." " ;
               }
               ?> - <?php $id_karyawan = $_SESSION['id_karyawan']; 
               $result = mysqli_query($koneksi, "SELECT departemen FROM karyawan, departemen WHERE id_karyawan='$id_karyawan' AND karyawan.id_departemen=departemen.id_departemen");
               while ($row=mysqli_fetch_object($result))
               {
                  echo $row->departemen." " ;
               }
               ?>    
               ] !</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->
    
    <section class="home-slider owl-carousel ftco-degree-bg">
      <div class="slider-item" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center">
            <div class="col-md-10 ftco-animate text-center">
              <h1 class="mb-4">Aplikasi
                <strong class="typewrite" data-period="4000" data-type='[ "SAP.", "Safety.", "Accountability.", "Program." ]'>
                  <span class="wrap"></span>
                </strong>
              </h1>
              <p>
               
              </p>
               <p>Safety Accountability Program atau disebut Program Akuntabilitas Keselamatan merupakan salah satu program kerja Departemen Safety Health Environment (SHE). SAP Adalah sarana untuk semua karyawan dalam berkontribusi mengenai aspek keselamatan (safety).</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END slider -->

    <section class="ftco-section-featured ftco-animate">
      <div class="container">
         <div class="row">
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="../observasi_open.php" class="block-20" style="background-image: url('images/Observasi2.jpg');"></a>
              <div class="text p-4 d-block">
                <h3 class="heading"><a href="../observasi_open.php">OBSERVASI</a></h3>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry" data-aos-delay="100">
              <a href="../inspeksi_open.php" class="block-20" style="background-image: url('images/Inspeksi.jpg');">
              </a>
              <div class="text p-4">
                <h3 class="heading"><a href="../inspeksi_open.php">INSPEKSI</a></h3>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry" data-aos-delay="200">
              <a href="../pica_open.php" class="block-20" style="background-image: url('images/hazard.jpg');">
              </a>
              <div class="text p-4">
                <h3 class="heading"><a href="../pica_open.php">HAZARD REPORT</a></h3>
              </div>
            </div>
          </div>
          <div class="col-md-6 ftco-animate">
            <div class="blog-entry">
              <a href="../personal_contact.php" class="block-20" style="background-image: url('images/PC.jpg');">
              </a>
              <div class="text p-4 d-block">
                <h3 class="heading"><a href="../personal_contact.php">PERSONAL CONTACT</a></h3>
              </div>
            </div>
          </div>
          <div class="col-md-6 ftco-animate">
            <div class="blog-entry" data-aos-delay="100">
              <a href="../stalk_presensi_tampil.php" class="block-20" style="background-image: url('images/Safety_Talk.jpg');">
              </a>
              <div class="text p-4">
                <h3 class="heading"><a href="../stalk_presensi_tampil.php">SAFETY TALK</a></h3>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>