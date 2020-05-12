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
    <title>S A P | Hazard </title>
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
                        <a href="pica_beranda.php"><i class="fa fa-dashboard fa-fw"></i>Dashboard Hazard Report</a>
                    </li>
                    <li>
                        <a href="pica_open.php"><i class="fa fa-file-o fa-fw"></i>PICA OPEN</a>
                    </li>
                    <li>
                        <a href="pica_validation.php"><i class="fa fa-file-o fa-fw"></i>PICA Validation</a>
                    </li>
                    <li>
                        <a href="pica_close.php"><i class="fa fa-file-o fa-fw"></i>PICA CLOSE</a>
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
                    <h1 class="page-header">Dashboard Hazard Report</h1>
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
                <div class="col-lg-4">
                    <!--Area chart example -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Grafik Tingkat Bahaya
                        </div>
                        <?php
                         $tampil=Chart_Tampil_Bahaya();
                         $tampilkan=mysqli_fetch_array($tampil);
                         $jumlah_databahaya=jumlah_databahaya($tampilkan['jumlah_ekstrim'], $tampilkan['jumlah_high'], $tampilkan['jumlah_moderate'] , $tampilkan['jumlah_low']);
                         $ekstrim=Nilai_Persen($tampilkan['jumlah_ekstrim'], $jumlah_databahaya);
                         $high=Nilai_Persen($tampilkan['jumlah_high'], $jumlah_databahaya);
                         $moderate=Nilai_Persen($tampilkan['jumlah_moderate'], $jumlah_databahaya);
                         $low=Nilai_Persen($tampilkan['jumlah_low'], $jumlah_databahaya);
                         ?>

                        <div id=chart-container> <canvas id="myPieChart" width="100" height="100"></canvas> </div>

                    </div>
                    <!--End area chart example -->
                    <!--Simple table example -->     

                </div>

                <div class="col-lg-4">
                    <!--Area chart example -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Grafik Tingkat Departemen
                        </div>
                        <?php
                         $muncul=Chart_Tampil_Dept();
                         $munculkan=mysqli_fetch_array($muncul);
                         $jumlah_data=Jumlah_datadepartemen($munculkan['Safety'], $munculkan['Produksi'], $munculkan['HRGA'], $munculkan['Plant'], $munculkan['Engineering']);
                         $Safety=Nilai_Persen($munculkan['Safety'], $jumlah_data);
                         $Produksi=Nilai_Persen($munculkan['Produksi'], $jumlah_data);
                         $HRGA=Nilai_Persen($munculkan['HRGA'], $jumlah_data);
                         $Plant=Nilai_Persen($munculkan['Plant'], $jumlah_data);
                         $Engineering=Nilai_Persen($munculkan['Engineering'], $jumlah_data)
                         ?>

                        <div id=chart-container> <canvas id="myPieDept" width="100" height="100"></canvas> </div>

                    </div>
                    <!--End area chart example -->
                    <!--Simple table example -->     

                </div>

                 <div class="col-lg-4">
                    <!--Area chart example -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Grafik Tingkat Perbaikan
                        </div>
                        <?php
                         $show=Chart_Tampil_Status();
                         $showme=mysqli_fetch_array($show);
                         $jumlah_data=Jumlah_data($showme['Belum'], $showme['Sudah']);
                         $Belum=Nilai_Persen($showme['Belum'], $jumlah_data);
                         $Sudah=Nilai_Persen($showme['Sudah'], $jumlah_data);
                         ?>

                        <div id=chart-container> <canvas id="myPieStatus" width="100" height="100"></canvas> </div>


                    </div>
                    <!--End area chart example -->
                    <!--Simple table example -->     

                </div>

            </div>

             <div class="row">
                <div class="col-lg-12">
                  <div class="panel panel-primary">
                     <div class="panel-heading">
                            <i class="fa fa-flag fa-fw"></i> Data Laporan Anda: <?php $id_karyawan = $_SESSION['id_karyawan']; $query = mysqli_query($koneksi, "SELECT nama FROM karyawan WHERE id_karyawan='$id_karyawan'");
                                while ($apakah=mysqli_fetch_object($query))
                                {
                                  echo $apakah->nama." " ;
                                }?> &nbsp|&nbsp <a href="pica_tambah.php" class="btn btn-danger"> Mulai Lapor! </a>
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
                                                    <th>Lokasi</th>
                                                    <th>Deskripsi</th>
                                                    <th>Foto</th>
                                                    <th>Bahaya</th>
                                                    <th>Batas</th>
                                                    <th>Tindakan</th>
                                                    <th>Departemen</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                                 $no = 1;
                                                $queryview = mysqli_query($koneksi, "SELECT id_picao, tanggal, lokasi, desc_bahaya, foto, bahaya, due_tanggal, rec_tindakan, departemen AS 'Penanggung Jawab', status FROM pica_open, bahaya, karyawan, departemen, lokasi WHERE pica_open.id_bahaya=bahaya.id_bahaya AND pica_open.id_karyawan=karyawan.id_karyawan AND pica_open.id_departemen=departemen.id_departemen AND pica_open.id_lokasi=lokasi.id_lokasi AND pica_open.id_karyawan='$id_karyawan' ORDER BY bahaya;");
                                                while ($row = mysqli_fetch_assoc($queryview)) {
                                                     $id_picao = $row['id_picao']; 
                                                    ?>

                                                     <tr>

                                                         <td><?php echo $no++;?></td>
                                                          <td><?=  fungsi_tanggal($row['tanggal']); ?></td>
                                                          <td><?php echo $row['lokasi']; ?></td>
                                                          <td><?php echo $row['desc_bahaya']; ?></td>
                                                          <td><img src="../admin/assets/img/<?php echo $row['foto'];?>" height="75"></td>
                                                          <td><?php echo $row['bahaya']; ?></td>
                                                          <td><?=  fungsi_tanggal($row['due_tanggal']); ?></td>
                                                          <td><?php echo $row['rec_tindakan']; ?></td>
                                                          <td><?php echo $row['Penanggung Jawab']; ?></td>
                                                          <td > <?php
                                                                if ($row['status'] == 0){
                                                                    echo '<span class="label label-warning">Belum diperbaiki</span>';
                                                                } else if ($row['status'] == 1) {
                                                                    echo '<span class="label label-primary">Sudah diperbaiki</span>';
                                                                }
                                                               ?> 
                                                          </td>  
                                                          <td> <?php
                                                                if ($row['status'] == 0){
                                                                     ?> <a href="pica_edit.php<?php echo '?id_picao=' . $id_picao; ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a> <?php ;
                                                                } else if ($row['status'] == 1) {
                                                                    ?> <a href="#" class="btn btn-primary" disabled ><i class="fa fa-edit"></i></a> <?php ;
                                                                }
                                                                ?> 

                                                                <br />
                                                                 <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#hapuslapor<?php echo $id_picao; ?>"><i class="fa fa-trash-o"></i></a>

                                                                  <div class="example-modal">
                                                                    <div id="hapuslapor<?php echo $id_picao; ?>" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  style="display:none;">
                                                                      <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                          <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                            <h5 class="modal-title">Konformasi Hapus Data Laporan</h5>
                                                                          </div>
                                                                          <div class="modal-body">
                                                                            <h5 align="center" >Apakah anda yakin ingin menghapus data ini? </h5>
                                                                          </div>
                                                                          <div class="modal-footer">
                                                                            <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                                                            <a href="pica_hapus.php<?php echo '?id_picao=' . $id_picao; ?>" class="btn btn-primary">Hapus</a>
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

      <script type="text/javascript">
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';

    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ["Kritikal:<?php echo $ekstrim; ?>","High:<?php echo $high; ?>", "Medium:<?php echo $moderate; ?>", "Low:<?php echo $low; ?>"],
        datasets: [{
        label: '',
          data: [<?php echo $tampilkan['jumlah_ekstrim']; ?>, <?php echo $tampilkan['jumlah_high']; ?>, <?php echo $tampilkan['jumlah_moderate']; ?>, <?php echo $tampilkan['jumlah_low']; ?>],
          backgroundColor: ['#dc3545' ,'#007bff', '#e4c210', '#27b70d'],
        }],
      },
    });
    </script>

    <script type="text/javascript">

    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';

    // Pie Chart Example
    var ctx = document.getElementById("myPieDept");
    var myPieChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ["Safety:<?php echo $Safety; ?>","Produksi:<?php echo $Produksi; ?>", "HRGA:<?php echo $HRGA; ?>", "Plant:<?php echo $Plant; ?>", "Engineering:<?php echo $Engineering; ?>"],
        datasets: [{
        label: '',
          data: [<?php echo $munculkan['Safety']; ?>, <?php echo $munculkan['Produksi']; ?>, <?php echo $munculkan['HRGA']; ?>, <?php echo $munculkan['Plant']; ?>, <?php echo $munculkan['Engineering']; ?>],
          backgroundColor: ['#dc3545' ,'#007bff', '#e4c210', '#27b70d', '#d63df2'],
        }],
      },
    });
    </script>

    <script type="text/javascript">

    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';

    // Pie Chart Example
    var ctx = document.getElementById("myPieStatus");
    var myPieChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ["Belum diperbaiki:<?php echo $Belum; ?>","Sudah diperbaiki:<?php echo $Sudah; ?>"],
        datasets: [{
        label: '',
          data: [<?php echo $showme['Belum']; ?>, <?php echo $showme['Sudah']; ?>],
          backgroundColor: ['#27b70d', '#d63df2'],
        }],
      },
    });
    </script>

</body>

</html>
