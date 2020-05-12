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
    <title>S A P | Administrator - Data Bahaya </title>
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
                        <a href="karyawan_tampil.php"><i class="fa fa-user fa-fw"></i>Data Karyawan</a>
                    </li>
                    <li>
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
                     <li class="selected">
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
                 <!--  page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Data Bahaya</h1>
                </div>
                 <!-- end  page header -->
            </div>

             <div class="row">
                <!-- Welcome -->

                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Hallo ! </b>Kembali lagi<b> <?php $id_karyawan = $_SESSION['id_karyawan']; $query = mysqli_query($koneksi, "SELECT nama FROM karyawan WHERE id_karyawan='$id_karyawan'");
                                while ($apakah=mysqli_fetch_object($query))
                                {
                                  echo $apakah->nama." " ;
                                }?> </b> [ Admin <?php $id_karyawan = $_SESSION['id_karyawan']; 
                                         $result = mysqli_query($koneksi, "SELECT jabatan FROM karyawan, jabatan WHERE id_karyawan='$id_karyawan' AND karyawan.id_jabatan=jabatan.id_jabatan");
                                         while ($row=mysqli_fetch_object($result))
                                         {
                                            echo $row->jabatan." " ;
                                         }
                                         ?>  
                                         - 
                                         <?php $id_karyawan = $_SESSION['id_karyawan']; 
                                         $result = mysqli_query($koneksi, "SELECT departemen FROM karyawan, departemen WHERE id_karyawan='$id_karyawan' AND karyawan.id_departemen=departemen.id_departemen");
                                         while ($row=mysqli_fetch_object($result))
                                         {
                                            echo $row->departemen." " ;
                                         }
                                         ?>
                                         ].
                    </div>
                </div>
                <!--end  Welcome -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                  <div class="panel panel-primary">
                     <div class="panel-heading">
                             <a href="bahaya_tambah.php" class="btn btn-danger"> Tambah Data Bahaya</a>
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
                                                    <th>Bahaya</th>
                                                    <th>Tindakan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                          
                                                $queryview = mysqli_query($koneksi, " SELECT id_bahaya, bahaya, tindakan FROM bahaya");
                                                while ($row = mysqli_fetch_assoc($queryview)) {
                                                     $id_bahaya = $row['id_bahaya']; 
                                                    ?>


                                                     <tr>
                                                             <td><?php echo $no++;?></td>
                                                          <td><?php echo $row['bahaya']; ?></td>
                                                          <td><?php echo $row['tindakan']; ?></td>
                                                          <td>
                                                             <a href="bahaya_edit.php<?php echo '?id_bahaya=' . $id_bahaya; ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                             <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#hapusbahaya<?php echo $id_bahaya; ?>"><i class="fa fa-trash-o"></i></a>

                                                                  <div class="example-modal">
                                                                    <div id="hapusbahaya<?php echo $id_bahaya; ?>" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  style="display:none;">
                                                                      <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                          <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                            <h5 class="modal-title">Konformasi Hapus Data Bahaya</h5>
                                                                          </div>
                                                                          <div class="modal-body">
                                                                            <h5 align="center" >Apakah anda yakin ingin menghapus data ini? </h5>
                                                                          </div>
                                                                          <div class="modal-footer">
                                                                            <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                                                            <a href="bahaya_hapus.php<?php echo '?id_bahaya=' . $id_bahaya; ?>" class="btn btn-primary">Hapus</a>
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                                  </div><!-- Modal Hapus -->
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
