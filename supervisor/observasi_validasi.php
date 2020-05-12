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
include 'fungsi_tanggal.php';
include 'fungsi_grafik.php'
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S A P | Observasi </title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/coba2.png" />

    <!-- Page-Level CSS -->
    <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                        <i class="fa fa-user fa-3x"></i><span class="label label-success"><?php $id_karyawan = $_SESSION['id_karyawan']; 
              $query = mysqli_query($koneksi, "SELECT nama FROM karyawan WHERE id_karyawan='$id_karyawan'");
              while ($apakah=mysqli_fetch_object($query))
               {
                  echo $apakah->nama." " ;
               }
               ?></span>  
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
                                <div><strong><?php $id_karyawan = $_SESSION['id_karyawan']; 
                                $query = mysqli_query($koneksi, "SELECT nama FROM karyawan WHERE id_karyawan='$id_karyawan'");
                                while ($apakah=mysqli_fetch_object($query))
                                 {
                                    echo $apakah->nama." " ;
                                 }
                                 ?></strong></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp; Supervisor
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                
                    <li>
                        <a href="observasi_open.php"><i class="fa fa-dashboard fa-fw"></i>Observasi Open</a>
                    </li>
                     <li class="selected">
                        <a href="observasi_validasi.php"><i class="fa fa-dashboard fa-fw"></i>Observasi Validasi</a>
                    </li>
                    <li>
                        <a href="observasi_close.php"><i class="fa fa-file-o fa-fw"></i> Observasi Close</a>
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
                    <h1 class="page-header">Halaman Validasi Observasi</h1>
                </div>
                 <!-- end  page header -->
            </div>

             <div class="row">
                <!-- Welcome -->

                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Hallo ! </b>Kembali lagi<b> <?php $id_karyawan = $_SESSION['id_karyawan']; 
                          $query = mysqli_query($koneksi, "SELECT nama FROM karyawan WHERE id_karyawan='$id_karyawan'");
                          while ($apakah=mysqli_fetch_object($query))
                           {
                              echo $apakah->nama." " ;
                           }
                           ?> </b> [<?php $id_karyawan = $_SESSION['id_karyawan']; 
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
                            <i class="fa fa-flag fa-fw"></i> Berikut merupakan Validasi Observasi
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
                                          <th>Perbaikan</th>
                                          <th>Jenis</th>
                                          <th>Nama</th>
                                          <th>Area</th>
                                          <th>Deskripsi</th>
                                          <th>Foto</th>
                                          <th>Bahaya</th>
                                          <th>Rek</th>
                                          <th>Observ</th>
                                          <th>Val</th>
                                          <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                            $no = 1;
                                            $muncul=mysqli_query($koneksi, "SELECT id_obscl, tgl_obscl, bukti_perbaikan, valid, tgl_obsop, due_obsop, jenis_obsop, a.nama AS nama_kary, lokasi, deskripsi, bukti, bahaya, rec, b.nama AS observator FROM observasi_close, observasi_open, karyawan AS a, karyawan AS b, lokasi, bahaya WHERE observasi_close.id_obsop=observasi_open.id_obsop AND observasi_open.nama_kary=a.id_karyawan AND observasi_open.id_lokasi=lokasi.id_lokasi AND observasi_open.id_bahaya=bahaya.id_bahaya AND observasi_open.observ=b.id_karyawan") or die(mysqli_error());
                                            while ($row=mysqli_fetch_array($muncul)) {
                                            ?>
                                             <tr>
                                                  <td><?php echo $no++; ?></td>
                                                  <td><?=  fungsi_tanggal($row['tgl_obscl']); ?></td>
                                                  <td><img src="../admin/assets/img/<?php echo $row['bukti_perbaikan'];?>" height="50"></td>
                                                  <td><?php echo $row['jenis_obsop']; ?></td>
                                                  <td><?php echo $row['nama_kary']; ?></td>
                                                  <td><?php echo $row['lokasi']; ?></td>
                                                  <td><?php echo $row['deskripsi']; ?></td>
                                                   <td><img src="../admin/assets/img/<?php echo $row['bukti'];?>" height="40"></td>
                                                  <td><?php echo $row['bahaya']; ?></td>
                                                  <td><?php echo $row['rec']; ?></td>
                                                  <td><?php echo $row['observator']; ?></td>
                                                  <td > <?php
                                                        if ($row['valid'] == 0){
                                                            echo '<span class="label label-warning">Belum</span>';
                                                        } else if ($row['valid'] == 1) {
                                                            echo '<span class="label label-primary">Sudah</span>';
                                                        }
                                                       ?> 
                                                   </td> 
                                                   <td> 
                                                    <?php
                                                        if ($row['valid'] == 0){
                                                            ?> <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#validasi<?php echo $no; ?>"><i class="fa fa-thumbs-up"></i></a> <?php ;
                                                        } else if ($row['valid'] == 1) {
                                                           ?> <a href="#" class="btn btn-primary" disabled><i class="fa fa-thumbs-up"></i></a> <?php ;
                                                        }
                                                       ?> 

                                                    <!-- Modal Edit -->
                                                              <div class="example-modal">
                                                                <div id="validasi<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                                                                  <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                      <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        <h3 class="modal-title">Lakukan Validasi</h3>
                                                                      </div>
                                                                      <div class="modal-body">
                                                                        <form action="fungsi_observasi.php?act=validasi&id=<?php echo $row['id_obscl']; ?>" method="post" role="form">
                                                                          <?php
                                                                          $id_obscl = $row['id_obscl'];
                                                                          $query = "SELECT * FROM observasi_close WHERE id_obscl='$id_obscl'";
                                                                          $result = mysqli_query($koneksi, $query);
                                                                          while ($row = mysqli_fetch_assoc($result)) {
                                                                          ?> 

                                                                          <h4 align="center">Anda yakin ingin validasi?</h4>
                                                                          <div class="modal-footer">
                                                                            <button id="noedit" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                                                            <input type="submit" name="submit" class="btn btn-primary" value="Validasi">
                                                                          </div>
                                                                          <?php
                                                                          }
                                                                          ?>
                                                                        </form>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div><!-- Modal Edit-->
                                              <?php } ?>
                                            </tr>
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
