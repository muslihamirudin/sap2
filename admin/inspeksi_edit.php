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
include 'fungsi_grafik.php';
include 'fungsi_tanggal.php'
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S A P | Edit Inspeksi! </title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/coba2.png" />

     <script type="text/javascript" src="grafik/jquery.min.js"></script>
     <script type="text/javascript" src="grafik/Chart.min.js"></script>

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
                
                    <li class="selected">
                        <a href="inspeksi_beranda.php"><i class="fa fa-dashboard fa-fw"></i>Dashboard Inspeksi</a>
                    </li>
                    <li>
                        <a href="inspeksi_open.php"><i class="fa fa-file-o fa-fw"></i>Inspeksi OPEN</a>
                    </li>
                    <li>
                        <a href="inspeksi_validation.php"><i class="fa fa-file-o fa-fw"></i>Inspeksi Validation</a>
                    </li>
                    <li>
                        <a href="inspeksi_close.php"><i class="fa fa-file-o fa-fw"></i>Inspeksi CLOSE</a>
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
                    <h1 class="page-header">Edit Inspeksi</h1>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                  <div class="panel panel-primary">
                     <div class="panel-heading">
                            <i class="fa fa-flag fa-fw"></i> Silakan Edit Inspeksi Anda
                            <div class="pull-right">
                            </div>
                        </div>

                       <div class="panel-body">
                            <div class="row">
                                <?php
                            include ('koneksi.php');
                            $id_insop = $_GET['id_insop'];
                            $tampil= mysqli_query($koneksi, "SELECT * FROM inspeksi_open WHERE id_insop='$id_insop'");
                            $row= mysqli_fetch_array($tampil);
                            ?>
                                <div class="col-lg-12">
                                  <form role="form" method="POST" action="inspeksi_edit_proses.php" enctype="multipart/form-data">
                                        <input type="hidden" class="form-control" name="inspektor" value="<?php echo $_SESSION['id_karyawan']; ?>">
                                         <input type="hidden" class="form-control" name="fotolama" value="<?php echo $row["gambar"]; ?>">
                                         <input type="hidden" class="form-control" name="id_insop" value="<?php echo $row["id_insop"]; ?>">

                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input type="date" class="form-control" name="tgl_insop" value="<?php echo $row['tgl_insop'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Batas Tanggal</label>
                                            <input type="date" class="form-control" name="due_insop" value="<?php echo $row['due_insop'] ?>">
                                        </div>

                                         <div class="form-group">
                                            <label>Jenis Inspeksi</label>
                                            <select name="jenis_insop" class="form-control" required>
                                            <option value="<?php echo $row['jenis_insop']; ?>"><?php echo $row['jenis_insop']; ?></option>
                                            <option value="Terencana"> Terencana </option>
                                            <option value="Tidak Terencana"> Tidak Terencana</option>
                                        </select>
                                         </div>

                                         <div class="form-group">
                                            <label>Deskripsi Bahaya</label>
                                            <input type=text" class="form-control" rows="3" name="desk" value="<?php echo $row['desk'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Rekomendasi Tindakan</label>
                                            <input type="text" name="rekomendasi" class="form-control" rows="3" value="<?php echo $row['rekomendasi'] ?>">
                                        </div>
                                         <div class="form-group">
                                            <label>Foto</label>
                                            </br> <img src="assets/img/<?php echo $row['gambar'];?>" width="100">
                                            <span class="label-control"><?php echo $row['gambar'];?> </span>
                                            <input type="file" id="file-input" name="gambar" class="form-control-file" value="<?php echo $row['gambar']; ?>">
                                        </div>

                                         <div class="form-group">
                                            <label for="id_lokasi">Lokasi</label>
                                            <select class="form-control" name="id_lokasi" required>
                                            <?php
                                                include('koneksi.php');
                                                $id_insop=$_GET['id_insop'];
                                                $rest=mysqli_query($koneksi, "SELECT inspeksi_open.id_lokasi, lokasi  FROM inspeksi_open, lokasi WHERE inspeksi_open.id_lokasi=lokasi.id_lokasi AND id_insop='$id_insop'");
                                                while ($ara = mysqli_fetch_array($rest)) {
                                                    $id_lokasi = $ara['id_lokasi'];
                                                    $lokasi = $ara['lokasi'];
                                                }
                                                ?>
                                            <option value="<?php echo $id_lokasi; ?>"><?php echo $lokasi; ?></option>
                                                <?php
                                                include('koneksi.php');
                                                $result = mysqli_query($koneksi, "SELECT * FROM lokasi ORDER BY lokasi");
                                                while ($row = mysqli_fetch_array($result)){
                                                  echo '<option value="' . $row['id_lokasi'] . '">' . $row['lokasi'] .'</option>';
                                                  }
                                                ?>
                                            </select>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="id_bahaya">Bahaya</label>
                                             <select class="form-control" name="id_bahaya" required>
                                            <?php
                                                include('koneksi.php');
                                                $id_insop=$_GET['id_insop'];
                                                $rest=mysqli_query($koneksi, "SELECT inspeksi_open.id_bahaya, bahaya  FROM inspeksi_open, bahaya WHERE inspeksi_open.id_bahaya=bahaya.id_bahaya AND id_insop='$id_insop'");
                                                while ($arb = mysqli_fetch_array($rest)){
                                                    $id_bahaya = $arb['id_bahaya'];
                                                    $bahaya = $arb['bahaya'];
                                                }
                                                ?>
                                                 <option value="<?php echo $id_bahaya; ?>"><?php echo $bahaya; ?></option>
                                                <?php
                                                $result = mysqli_query($koneksi, "SELECT * FROM bahaya ORDER BY bahaya");
                                                while ($row = mysqli_fetch_array($result)){
                                                  echo '<option value="' . $row['id_bahaya'] . '">' . $row['bahaya'] .'</option>';
                                                  }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_departemen">Departemen Penanggung Jawab</label>
                                            <select name="id_departemen" class="form-control" required>
                                            <?php
                                                include('koneksi.php');
                                                $id_insop=$_GET['id_insop'];
                                                $rest=mysqli_query($koneksi, "SELECT inspeksi_open.id_departemen, departemen  FROM inspeksi_open, departemen WHERE inspeksi_open.id_departemen=departemen.id_departemen AND id_insop='$id_insop'");
                                                while ($arc = mysqli_fetch_array($rest)){
                                                    $id_departemen = $arc['id_departemen'];
                                                    $departemen = $arc['departemen'];
                                                }
                                                ?>
                                                <option value="<?php echo $id_departemen; ?>"><?php echo $departemen;?></option>
                                                <?php

                                                $result = mysqli_query($koneksi, "SELECT * FROM departemen ORDER BY departemen");
                                                while ($row = mysqli_fetch_array($result)){
                                                  echo '<option value="' . $row['id_departemen'] . '">' . $row['departemen'] .'</option>';
                                                  }
                                                ?>
                                            </select>
                                        </div>


                                         
                                        
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                        <a href="inspeksi_beranda.php" class="btn btn-success">Batal</a>
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
