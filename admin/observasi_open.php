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
    <title>S A P | Observasi OPEN </title>
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
                        <a href="observasi_beranda.php"><i class="fa fa-dashboard fa-fw"></i>Dashboard Observasi</a>
                    </li>
                    <li class="selected">
                        <a href="observasi_open.php"><i class="fa fa-file-o fa-fw"></i>Observasi OPEN</a>
                    </li>
                    <li>
                        <a href="observasi_validation.php"><i class="fa fa-file-o fa-fw"></i>Observasi Validation</a>
                    </li>
                    <li>
                        <a href="observasi_close.php"><i class="fa fa-file-o fa-fw"></i>Observasi CLOSE</a>
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
                    <h1 class="page-header">Laporan Observasi OPEN</h1>
                </div>
                 <!-- end  page header -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                  <div class="panel panel-primary">
                     <div class="panel-heading">
                            <i class="fa fa-flag fa-fw"></i> Berikut merupakan Data Laporan Observasi Open
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
                                            <th>Tanggal</th>
                                            <th>Batas</th>
                                            <th>Jenis</th>
                                            <th>Nama</th>
                                            <th>Lokasi</th>
                                            <th>Deskripsi</th>
                                            <th>Foto</th>
                                            <th>Bahaya</th>
                                            <th>Rekomendasi</th>
                                            <th>Observator</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                                $no = 1;
                                                $id_karyawan = $_SESSION['id_karyawan'];
                                                $muncul = mysqli_query($koneksi, " SELECT id_obsop, tgl_obsop, due_obsop, jenis_obsop, a.nama AS nama_kary, lokasi, deskripsi, bukti, bahaya, rec, b.nama AS observator, status FROM observasi_open, karyawan AS a, karyawan AS b, lokasi, bahaya, departemen WHERE observasi_open.nama_kary=a.id_karyawan AND observasi_open.id_lokasi=lokasi.id_lokasi AND observasi_open.id_bahaya=bahaya.id_bahaya AND observasi_open.observ=b.id_karyawan AND observasi_open.id_departemen=departemen.id_departemen") or die(mysqli_error());
                                            while ($row=mysqli_fetch_array($muncul)) {
                                            ?>

                                                <tr>
                                                  <td width="4%"><?php echo $no++;?></td>
                                                  <td width="3%"><?=  fungsi_tanggal($row['tgl_obsop']); ?></td>
                                                  <td width="3%"><?=  fungsi_tanggal($row['due_obsop']); ?></td>
                                                  <td width="4%"><?php echo $row['jenis_obsop']; ?></td>
                                                  <td><?php echo $row['nama_kary']; ?></td>
                                                  <td><?php echo $row['lokasi']; ?></td>
                                                  <td width="4%"><?php echo $row['deskripsi']; ?></td>
                                                  <td><img src="assets/img/<?php echo $row['bukti'];?>" height="45"></td>
                                                  <td width="4%"><?php echo $row['bahaya']; ?></td>
                                                  <td width="4%"><?php echo $row['rec']; ?></td>
                                                  <td width="4%"><?php echo $row['observator']; ?></td>
                                                  <td > <?php
                                                    if ($row['status'] == 0){
                                                        echo '<span class="label label-warning">Belum</span>';
                                                    } else if ($row['status'] == 1) {
                                                        echo '<span class="label label-primary">Sudah</span>';
                                                    }
                                                   ?> 
                                                  </td>
                                                <td width="5%">
                                                  <?php
                                                        if ($row['status'] == 0){
                                                            ?> <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#perbaikan<?php echo $no; ?>"><i class="fa fa-wrench"></i></a> <?php ;
                                                        } else if ($row['status'] == 1) {
                                                           ?> <a href="#" class="btn btn-primary" disabled><i class="fa fa-wrench"></i></a> <?php ;
                                                        }
                                                       ?>           
                                                    
                                                     <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#hapusobsrv<?php echo $no; ?>"><i class="fa fa-trash-o"></i></a>

                                                      <!-- Modal Hapus -->
                                                          <div class="example-modal">
                                                            <div id="hapusobsrv<?php echo $no; ?>" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  style="display:none;">
                                                              <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                  <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h5 class="modal-title">Konformasi Hapus Data Laporan</h5>
                                                                  </div>
                                                                  <div class="modal-body">
                                                                    <h5 align="center" >Apakah anda yakin ingin menghapus data ini?</h5>
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                    <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                                                    <a href="fungsi_observasi.php?act=hapusobsrv&id=<?php echo $row['id_obsop']; ?>" class="btn btn-primary">Hapus</a>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div><!-- Modal Hapus -->

                                                        <!-- Modal Edit -->
                                                              <div class="example-modal">
                                                                <div id="perbaikan<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                                                                  <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                      <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        <h3 class="modal-title">Lakukan Perbaikan</h3>
                                                                      </div>
                                                                      <div class="modal-body">
                                                                        <form action="fungsi_observasi.php?act=perbaikan&id=<?php echo $row['id_obsop']; ?>" method="post" role="form" enctype="multipart/form-data" >
                                                                          <?php
                                                                          $id_obsop = $row['id_obsop'];
                                                                          $query = "SELECT * FROM observasi_open WHERE id_obsop='$id_obsop'";
                                                                          $result = mysqli_query($koneksi, $query);
                                                                          while ($row = mysqli_fetch_assoc($result)) {
                                                                          ?> 

                                                                          <input type="hidden" class="form-control" name="id_obsop" value="<?php echo $row["id_obsop"]; ?>">
                                                                            <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label>Upload Foto Bukti Perbaikan</label>
                                                                                    <input type="file" id="file-input" name="bukti_perbaikan" class="form-control-file"></div>
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                          <div class="modal-footer">
                                                                            <button id="noedit" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                                                            <input type="submit" name="submit" class="btn btn-primary" value="Perbaikan">
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
