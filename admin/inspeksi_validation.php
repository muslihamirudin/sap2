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
    <title>S A P | Inspeksi Validation </title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/coba2.png" />

    <!-- Page-Level CSS -->
    <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

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
                
                      <li>
                        <a href="inspeksi_beranda.php"><i class="fa fa-dashboard fa-fw"></i>Dashboard Inspeksi</a>
                    </li>
                    <li>
                        <a href="inspeksi_open.php"><i class="fa fa-file-o fa-fw"></i>Inspeksi OPEN</a>
                    </li>
                    <li class="selected">
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
                 <!--  page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Halaman Validasi Inspeksi</h1>
                </div>
                 <!-- end  page header -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                  <div class="panel panel-primary">
                     <div class="panel-heading">
                            <i class="fa fa-flag fa-fw"></i> Berikut merupakan Halaman Validasi Inspeksi
                            <div class="pull-right">
                            </div>
                        </div>

                       <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                     <thead>
                                        <tr>
                                             <th>No</th>
                                          <th>Tgl Perb</th>
                                          <th>Tgl Ins</th>
                                          <th>Due Ins</th>
                                          <th>Perbaikan</th>
                                          <th>Jenis</th>
                                          <th>Area</th>
                                          <th>Deskripsi</th>
                                          <th>Foto</th>
                                          <th>Bahaya</th>
                                          <th>Rek</th>
                                          <th>Inspektor</th>
                                          <th>Val</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                                            $no = 1;
                                            $muncul=mysqli_query($koneksi, "SELECT id_inscl, tgl_inscl, gambar_perbaikan, tgl_insop, due_insop, jenis_insop, lokasi, desk, gambar, bahaya, rekomendasi, nama, departemen, valid FROM inspeksi_close, inspeksi_open, lokasi, bahaya, karyawan, departemen WHERE inspeksi_close.id_insop=inspeksi_open.id_insop AND inspeksi_open.id_lokasi=lokasi.id_lokasi AND inspeksi_open.id_bahaya=bahaya.id_bahaya AND inspeksi_open.inspektor=karyawan.id_karyawan AND inspeksi_open.id_departemen=departemen.id_departemen;") or die(mysqli_error());
                                            while ($row=mysqli_fetch_array($muncul)) {
                                            ?>


                                                     <tr>

                                                   <td><?php echo $no++; ?></td>
                                                  <td><?=  fungsi_tanggal($row['tgl_inscl']); ?></td>
                                                  <td><?=  fungsi_tanggal($row['tgl_insop']); ?></td>
                                                  <td><?=  fungsi_tanggal($row['due_insop']); ?></td>
                                                  <td><img src="assets/img/<?php echo $row['gambar_perbaikan'];?>" height="50"></td>
                                                  <td><?php echo $row['jenis_insop']; ?></td>
                                                  <td><?php echo $row['lokasi']; ?></td>
                                                  <td><?php echo $row['desk']; ?></td>
                                                   <td><img src="assets/img/<?php echo $row['gambar'];?>" height="50"></td>
                                                  <td><?php echo $row['bahaya']; ?></td>
                                                  <td><?php echo $row['rekomendasi']; ?></td>
                                                  <td><?php echo $row['nama']; ?></td>
                                                  <td > <?php
                                                        if ($row['valid'] == 0){
                                                            echo '<span class="label label-warning">Belum</span>';
                                                        } else if ($row['valid'] == 1) {
                                                            echo '<span class="label label-primary">Sudah</span>';
                                                        }
                                                       ?> 
                                                   </td> 

                                                    </tr>
                                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
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
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>

</body>

</html>
