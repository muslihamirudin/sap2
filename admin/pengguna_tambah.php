<?php
session_start(); // Start session nya

// Kita cek apakah user sudah login atau belum
// Cek nya dengan cara cek apakah terdapat session username atau tidak
if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
    header("location: ../index.php"); // Kita Redirect ke halaman index.php karena belum login
}
?>
<!DOCTYPE html>
<?php 
include 'koneksi.php';
include 'fungsi_tanggal.php'
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S A P | Tambah Data Pengguna </title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/coba2.png" />


   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">
                    <img src="assets/img/sap-ale.png" alt="" />
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->

                <li class="dropdown">
                    <a>
                        <i class="fa fa-user fa-3x"></i><span class="label label-success"><?php $id_karyawan = $_SESSION['id_karyawan']; $query = mysqli_query($koneksi, "SELECT nama FROM karyawan WHERE id_karyawan='$id_karyawan'");
                                while ($apakah=mysqli_fetch_object($query))
                                {
                                  echo $apakah->nama." " ;
                                }?></span>  
                    </a>
                </li>

                <li class="dropdown">
                    <a href="menu/menu.php">
                          <i class="fa fa-th-large fa-3x"></i><span class="label label-warning">Menu</span>
                    </a>
                </li>

                <li class="dropdown">
                    <a  href="../logout.php">
                        <i class="fa fa-sign-out fa-3x"></i> <span class="label label-primary">Logout</span>
                    </a>
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="assets/img/admine.jpg" alt="">
                            </div>
                            <div class="user-info">
                                <div><strong><?php $id_karyawan = $_SESSION['id_karyawan']; $query = mysqli_query($koneksi, "SELECT nama FROM karyawan WHERE id_karyawan='$id_karyawan'");
                                while ($apakah=mysqli_fetch_object($query))
                                {
                                  echo $apakah->nama." " ;
                                }?></strong></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp; Admin
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                
                    <li  >
                        <a href="karyawan_tampil.php"><i class="fa fa-user fa-fw"></i>Data Karyawan</a>
                    </li>
                    <li class="selected">
                        <a href="pengguna_tampil.php"><i class="fa fa-edit fa-fw"></i> Data Pengguna</a>
                    </li>
                    <li>
                        <a href="jabatan_tampil.php"><i class="fa fa-edit fa-fw"></i> Data Jabatan</a>
                    </li>
                     <li>
                        <a href="departemen_tampil.php"><i class="fa fa-edit fa-fw"></i> Data Departemen</a>
                    </li>
                     <li>
                        <a href="lokasi_tampil.php"><i class="fa fa-edit fa-fw"></i> Data Lokasi</a>
                    </li>
                     <li>
                        <a href="bahaya_tampil.php"><i class="fa fa-edit fa-fw"></i> Data Bahaya</a>
                    </li>
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data Pengguna</h1>
                </div>
                <!--End Page Header -->
            </div>

             <div class="row">
                <div class="col-lg-12">
                  <div class="panel panel-primary">
                     <div class="panel-heading">
                            <i class="fa fa-flag fa-fw"></i> Silakan Masukkan Data Pengguna
                            <div class="pull-right">
                            </div>
                        </div>

                       <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                   <form role="form" method="POST" action="pengguna_tambah_proses.php" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label>Nama Karyawan</label>
                                            <?php
                                            $result = mysqli_query($koneksi, "SELECT * FROM karyawan ORDER BY nama");
                                            echo '<select name="id_karyawan" class="form-control" required>';
                                            echo '<option value="">-Pilih Nama Karyawan-</option>';
                                            while ($row = mysqli_fetch_array($result)){
                                                echo '<option value="' . $row['id_karyawan'] . '">' . $row['nama'] .'</option>'; }
                                            echo '</select>'; ?>   
                                        </div>

                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="username">
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="text" class="form-control" name="password">
                                        </div>

                                        <div class="form-group">
                                            <label>Level</label>
                                            <select name="level" class="form-control" required>
                                            <option value="admin"> Admin </option>
                                            <option value="supervisor"> Supervisor </option>
                                        </select>
                                         </div>

                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="pengguna_tampil.php" class="btn btn-success">Batal</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                  </div>
                </div>
            </div>
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/plugins/morris/morris.js"></script>
    <script src="assets/scripts/dashboard-demo.js"></script>

</body>

</html>
