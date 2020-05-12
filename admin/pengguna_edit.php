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
    <title>S A P | Edit Data Pengguna </title>
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
                    <h1 class="page-header">Edit Data Pengguna</h1>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                  <div class="panel panel-primary">
                     <div class="panel-heading">
                            <i class="fa fa-flag fa-fw"></i> Silakan Edit Data Pengguna
                            <div class="pull-right">
                            </div>
                        </div>

                       <div class="panel-body">
                            <div class="row">
                            <?php
                            include ('koneksi.php');
                            $id_user = $_GET['id_user'];
                            $tampil= mysqli_query($koneksi, "SELECT * FROM info_login WHERE id_user='$id_user'");
                            $row= mysqli_fetch_array($tampil);
                            ?>
                                <div class="col-lg-12">
                                 <form role="form" method="POST" action="pengguna_edit_proses.php">
                                         <input type="hidden" class="form-control" name="id_user" value="<?php echo $row["id_user"]; ?>">

                                            <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="username" value="<?php echo $row["username"]; ?>">
                                        </div>

                                          <div class="form-group">
                                            <label>Password</label>
                                            <input type="text" class="form-control" name="password" value="<?php echo $row["password"]; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Level</label>
                                            <select name="level" class="form-control" required>
                                            <option value="<?php echo $row['level']; ?>"><?php echo $row['level']; ?></option>
                                            <option value="admin"> Admin </option>
                                            <option value="supervisor"> Supervisor </option>
                                        </select>
                                         </div>

                                        <div class="form-group">
                                            <label for="id_karyawan">Nama Karyawan</label>
                                            <select class="form-control" name="id_karyawan"; required>
                                            <?php
                                                include('koneksi.php');
                                                $id_user=$_GET['id_user'];
                                                $rest=mysqli_query($koneksi, "SELECT info_login.id_karyawan, nama  FROM info_login, karyawan WHERE info_login.id_karyawan=karyawan.id_karyawan AND id_user='$id_user'");
                                                while ($ar = mysqli_fetch_array($rest)) {
                                                    $id_karyawan = $ar['id_karyawan'];
                                                    $nama = $ar['nama'];
                                                }
                                                ?>
                                            <option value="<?php echo $id_karyawan; ?>"><?php echo $nama; ?></option>
                                                <?php
                                                include('koneksi.php');
                                                $result = mysqli_query($koneksi, "SELECT * FROM karyawan ORDER BY nama");
                                                while ($row = mysqli_fetch_array($result)){
                                                  echo '<option value="' . $row['id_karyawan'] . '">' . $row['nama'] .'</option>';
                                                  }
                                                ?>
                                            </select>
                                        </div>


                                      
                                      
        
                                        <button type="submit" class="btn btn-primary">Edit</button>
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
