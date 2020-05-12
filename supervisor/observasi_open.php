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
                
                    <li class="selected">
                        <a href="observasi_open.php"><i class="fa fa-dashboard fa-fw"></i>Observasi Open</a>
                    </li>
                     <li >
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
                    <h1 class="page-header">Observasi Open</h1>
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
                <div class="col-lg-4">
                    <!--Area chart example -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Grafik Tingkat Bahaya
                        </div>
                        <?php
                         $tampil=Chart_Tampil_Bahaya_Obs();
                         $tampilkan=mysqli_fetch_array($tampil);
                         $jumlah_databahaya_obs=Jumlah_databahaya_obs($tampilkan['jumlah_ekstrim'], $tampilkan['jumlah_high'], $tampilkan['jumlah_moderate'] , $tampilkan['jumlah_low']);
                         $ekstrim=Nilai_Persen($tampilkan['jumlah_ekstrim'], $jumlah_databahaya_obs);
                         $high=Nilai_Persen($tampilkan['jumlah_high'], $jumlah_databahaya_obs);
                         $moderate=Nilai_Persen($tampilkan['jumlah_moderate'], $jumlah_databahaya_obs);
                         $low=Nilai_Persen($tampilkan['jumlah_low'], $jumlah_databahaya_obs);
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
                            <i class="fa fa-bar-chart-o fa-fw"></i> Grafik Tingkat Dept. Penanggung Jawab
                        </div>
                        <?php
                         $muncul=Chart_Tampil_Dept_Obs();
                         $munculkan=mysqli_fetch_array($muncul);
                         $jumlah_data=Jumlah_datadepartemen_obs($munculkan['Safety'], $munculkan['Produksi'], $munculkan['HRGA'], $munculkan['Plant'], $munculkan['Engineering']);
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
                            <i class="fa fa-bar-chart-o fa-fw"></i> Grafik Status Tindakan
                        </div>
                        <?php
                         $show=Chart_Tampil_Status_Obs();
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
                                            <th>Dept.</th>
                                            <th>Observ.</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                                $no = 1;
                                                $id_karyawan = $_SESSION['id_karyawan'];
                                                $muncul = mysqli_query($koneksi, " SELECT id_obsop, tgl_obsop, due_obsop, jenis_obsop, a.nama AS nama_kary, lokasi, deskripsi, bukti, bahaya, rec, b.nama AS observator, departemen, status FROM observasi_open, karyawan AS a, karyawan AS b, lokasi, bahaya, departemen WHERE observasi_open.nama_kary=a.id_karyawan AND observasi_open.id_lokasi=lokasi.id_lokasi AND observasi_open.id_bahaya=bahaya.id_bahaya AND observasi_open.observ=b.id_karyawan AND observasi_open.id_departemen=departemen.id_departemen") or die(mysqli_error());
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
                                                  <td><img src="../admin/assets/img/<?php echo $row['bukti'];?>" height="45"></td>
                                                  <td width="4%"><?php echo $row['bahaya']; ?></td>
                                                  <td width="4%"><?php echo $row['rec']; ?></td>
                                                   <td width="4%"><?php echo $row['departemen']; ?></td>
                                                  <td width="4%"><?php echo $row['observator']; ?></td>
                                                  <td > <?php
                                                    if ($row['status'] == 0){
                                                        echo '<span class="label label-warning">Belum</span>';
                                                    } else if ($row['status'] == 1) {
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
        labels: ["Belum:<?php echo $Belum; ?>","Sudah:<?php echo $Sudah; ?>"],
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
