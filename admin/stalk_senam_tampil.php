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

<?php
error_reporting(0);
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S A P | Safety Talk - Senam Presensi</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/coba2.png" />

    <!-- Page-Level CSS -->
    <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

       <link rel="stylesheet" href="plugin/jquery-ui/jquery-ui.min.css" /> <!-- Load file css jquery-ui -->
    <script src="js/jquery.min.js"></script> <!-- Load file jquery -->

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
                
                    <li >
                        <a href="stalk_presensi_tampil.php"><i class="fa fa-calendar fa-fw"></i> Presensi Safety Talk</a>
                    </li>
                    <li class="selected">
                        <a href="stalk_senam_tampil.php"><i class="fa fa-calendar-o fa-fw"></i> Presensi Senam</a>
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
                    <h1 class="page-header">Presensi Senam</h1>
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
                <div class="col-lg-5">
                    <!--Area chart example -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Grafik Presensi
                        </div>
                        <br />
                        <form method="get">
                            &nbsp Bulan
                            <select name="bulan" >
                            <option value="">Pilih</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">Nopember</option>
                            <option value="12">Desember</option>
                            </select>
                            Tahun
                            <select name='tahun' >
                                <?php
                                $qry=mysqli_query($koneksi,"SELECT tgl_senam FROM senam_presensi GROUP BY year(tgl_senam)");
                                 while ($ar = mysqli_fetch_array ($qry)){
                                     $data = explode('-',$ar['tgl_senam']);
                                     $tahun = $data[0];
                                     echo "<option value='$tahun'>$tahun</option>";
                                
                                }
                                ?> 
                            </select>
                             <button type="submit" class="btn btn-success" value="filter">Lihat</button>
                             <a href="stalk_senam_tampil.php" button type="submit" class="btn btn-success">Reset</a>
                             </form>
                                <?php
                               $dbHost='localhost';
                               $dbUsername = 'root';
                               $dbPassword = '';
                               $dbName = 'sap_ale2';
                               $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

                               if(isset($_GET['bulan'])){
                                 $bln = $_GET['bulan'];
                                 $thn = $_GET['tahun'];
                               //  $queryarsip = mysqli_query ($conn, "select tanggal from klipping where month(tanggal)='$bln' and year(tanggal)='$thn' group by tanggal"); 
                                  $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                                 echo '<h4> &nbsp Grafik Senam Presensi Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</h3>';
                                 $result = $db->query("SELECT SUM(IF(ket='Hadir',1,0)) AS HADIR, SUM(IF(ket='Tidak Hadir',1,0)) AS TIDAK_HADIR FROM senam_presensi WHERE MONTH(tgl_senam)='$bln' AND YEAR(tgl_senam)='$thn'");
                             }  
                             else
                             {
                                echo '<h4> &nbsp Grafik Semua Presensi </h4>';

                                // $queryarsip = mysqli_query ($conn, "select tanggal from klipping group by tanggal"); 
                                 $result = $db->query("SELECT SUM(IF(ket='Hadir',1,0)) AS HADIR, SUM(IF(ket='Tidak Hadir',1,0)) AS TIDAK_HADIR FROM senam_presensi");
                             }

                        ?>

                        <?php
                         $tampilkan=mysqli_fetch_array($result);
                         $jumlah_data=Jumlah_data($tampilkan['HADIR'], $tampilkan['TIDAK_HADIR']);
                         $hadir=Nilai_Persen($tampilkan['HADIR'], $jumlah_data);
                         $tidak_hadir=Nilai_Persen($tampilkan['TIDAK_HADIR'], $jumlah_data);

                         function Nilai_Persen($nilai_1, $nilai_2){
                             return round((($nilai_1/$nilai_2)*100), 2).'%';
                            }

                            function Jumlah_data($nilai_1, $nilai_2){
                             return($nilai_1+$nilai_2);
                            }
                        
                         ?>

                        <div id=chart-container> <canvas id="myPieChart" width="4" height="4"></canvas> </div>
                        <script type="text/javascript">
                            // Set new default font family and font color to mimic Bootstrap's default styling
                            Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                            Chart.defaults.global.defaultFontColor = '#292b2c';

                            // Pie Chart Example
                            var ctx = document.getElementById("myPieChart");
                            var myPieChart = new Chart(ctx, {
                              type: 'pie',
                              data: {
                                labels: ["Hadir:<?php echo $hadir; ?>","Tidak Hadir:<?php echo $tidak_hadir; ?>"],
                                datasets: [{
                                label: '',
                                  data: [<?php echo $tampilkan['HADIR']; ?>, <?php echo $tampilkan['TIDAK_HADIR']; ?>],
                                  backgroundColor: ['#007bff', '#dc3545'],
                                }],
                              },
                            });
                            </script>

                    </div>
                    <!--End area chart example -->
                    <!--Simple table example -->     

                </div>

                <div class="col-lg-7">
                  <div class="panel panel-primary">
                     <div class="panel-heading">
                            <i class="fa fa-flag fa-fw"></i> Input Kehadiran
                            <div class="pull-right">
                            </div>
                        </div>

                       <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                <form role="form" method="POST" action="stalk_senam_tambah_proses.php" enctype="multipart/form-data">
                                        <?php 
                                        $tgl= date('Y-m-d');
                                        ?>

                                        <div class="form-group">
                                            <label>Tanggal</label>
                                             <input class="form-control" name="tgl_senam" value="<?php echo fungsi_tanggal($tgl); ?>" readonly>
                                        </div>

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

                                        <input type=submit class="btn btn-primary" value="Hadir" name=hadir>
                                        <input type=submit class="btn btn-danger" value="Tidak Hadir"  name=tidak_hadir>

                                         <br />
                                         <br />
                                         <br />
                                         <br />
                                         <br />
                                         <br />
                                         <br />
                                         <br />
                                         <br />
                                         <br />
                                         <br />
                                         <br />
                                         <br />
                                         <br />
                                         <br />
                                         <br />
                                    </form>
                                </div>
                            </div>
                        </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                  <div class="panel panel-primary">
                     <div class="panel-heading">
                            <i class="fa fa-flag fa-fw"></i> Berikut merupakan Data Kehadiran Karyawan pada Kegiatan Senam
                            <div class="pull-right">
                            </div>
                        </div>

                       <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                <link rel="stylesheet" href="plugin/jquery-ui/jquery-ui.min.css" /> <!-- Load file css jquery-ui -->
                        <script src="js/jquery.min.js"></script> <!-- Load file jquery -->

                         <form method="get" action="">
                            <h3>Menu Cetak</h3>
                                <link rel="stylesheet" href="plugin/jquery-ui/jquery-ui.min.css" /> <!-- Load file css jquery-ui -->
                                <script src="js/jquery.min.js"></script> <!-- Load file jquery -->

                                <form method="get" action="">

                                <label>Filter Berdasarkan</label><br>
                                <select name="filter" id="filter" class="form-control">
                                <option value="">Pilih</option>
                                <option value="1">Per Bulan</option>
                                <option value="2">Per Tahun</option>
                                </select>
                                <br />

                                <div id="form-bulan">
                                <label>Bulan</label><br>
                                <select name="bulan" class="form-control">
                                <option value="">Pilih</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                                </select>
                                <br />
                                </div>

                                <div id="form-tahun">
                                <label>Tahun</label><br>
                                <select name="tahun" class="form-control">
                                <option value="">Pilih</option>
                                <?php
                                $query = "SELECT YEAR(tgl_senam) AS tahun FROM senam_presensi GROUP BY YEAR(tgl_senam)"; // Tampilkan tahun sesuai di tabel transaksi
                                $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query

                                while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                                echo '<option value="'.$data['tahun'].'">'.$data['tahun'].'</option>';
                                } ?>
                                </select>
                                <br />
                                </div>
                                <button class="btn btn-primary waves-effect waves-light" type="submit">Tampilkan</button> 
                                <a href="senam_presensi_tampil.php" <button type="button" class="btn btn-danger waves-effect waves-light"> Reset Filter </button> </a>
                                </form>
                                <?php
                            if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
                                $filter = $_GET['filter']; // Ambil data filder yang dipilih user

                                if($filter == '1'){ // Jika filter nya 1 (per bulan)
                                     $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                                    echo '<h3>Data Presensi Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</h3>';
                                    echo '<a href="stalk_senam_cetak.php?filter=1&bulan='.$_GET['bulan'].'&tahun='.$_GET['tahun'].'" <button type="button" class="btn btn-warning waves-effect waves-light"> Cetak PDF</button></a> <br />';

                                    $query = "SELECT id_senam, tgl_senam, nik, nama, jabatan, departemen, ket FROM senam_presensi, karyawan, jabatan, departemen WHERE senam_presensi.id_karyawan=karyawan.id_karyawan AND karyawan.id_jabatan=jabatan.id_jabatan AND karyawan.id_departemen=departemen.id_departemen AND MONTH(tgl_senam)='".$_GET['bulan']."' AND YEAR(tgl_senam)='".$_GET['tahun']."'"; // Tampilkan data laporan sesuai bulan dan tahun yang diinput oleh user pada filter
                                }else{ // Jika filter nya 3 (per tahun)
                                    echo '<h3>Data Presensi Tahun '.$_GET['tahun'].'</h3>';
                                    echo '<a href="stalk_senam_cetak.php?filter=2&tahun='.$_GET['tahun'].'" <button type="button" class="btn btn-warning waves-effect waves-light"> Cetak PDF</button></a> <br />';

                                    $query = "SELECT id_senam, tgl_senam, nik, nama, jabatan, departemen, ket FROM senam_presensi, karyawan, jabatan, departemen WHERE senam_presensi.id_karyawan=karyawan.id_karyawan AND karyawan.id_jabatan=jabatan.id_jabatan AND karyawan.id_departemen=departemen.id_departemen AND YEAR(tgl_senam)='".$_GET['tahun']."'"; // Tampilkan data laporan sesuai tahun yang diinput oleh user pada filter
                                }
                            }else{ // Jika user tidak mengklik tombol tampilkan
                                echo '<h3>Semua Data Presensi </h3>';
                                echo '<a href="stalk_senam_cetak.php" button type="button" class="btn btn-warning waves-effect waves-light"> Cetak PDF</button></a> <br /> <br />';



                                $query = "SELECT id_senam, tgl_senam, nik, nama, jabatan, departemen, ket FROM senam_presensi, karyawan, jabatan, departemen WHERE senam_presensi.id_karyawan=karyawan.id_karyawan AND karyawan.id_jabatan=jabatan.id_jabatan AND karyawan.id_departemen=departemen.id_departemen ORDER BY tgl_senam"; // Tampilkan semua data laporan diurutkan berdasarkan tanggal
                            }
                            ?>
                             <script>
                            $(document).ready(function(){ // Ketika halaman selesai di load

                                $('#form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

                                $('#filter').change(function(){ // Ketika user memilih filter
                                    if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                                        $('#form-bulan, #form-tahun').show(); // Sembunyikan form bulan dan tahun
                                    }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                                       $('#form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                                        $('#form-tahun').show(); // Tampilkan form tahun
                                    }

                                    $('#form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
                                })
                            })
                            </script>
                            <script src="plugin/jquery-ui/jquery-ui.min.js"></script> <!-- Load file plugin js jquery-ui -->

                                <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                     <thead>
                                        <tr>
                                           <th>No</th>
                                                    <th>Tanggal</th>
                                                    <th>NIK</th>
                                                    <th>Nama</th>
                                                    <th>Jabatan</th>
                                                    <th>Departemen</th>
                                                    <th>Keterangan</th>
                                                    <th>Aksi</th>
                                        </tr>
                                    </thead>
                                     <tbody>
                                                <?php include ('koneksi.php'); 

                                              $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
                                              $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                                              $no=1;

                                              if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                                              while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                                                $tgl = date('d-m-y', strtotime($data['tgl_presensi'])); // Ubah format tanggal jadi dd-mm-yyyy
                                                $id_senam=$data['id_senam'];


                                                echo "<tr>
                                                <td>".$no++."</td>
                                                <td>".fungsi_tanggal($data['tgl_senam'])."</td>
                                                <td>".$data['nik']."</td>
                                                <td>".$data['nama']."</td>
                                                <td>".$data['jabatan']."</td>
                                                <td>".$data['departemen']."</td>
                                                <td>".$data['ket']."</td>
                                                   </td> 
                                                <td><a href='stalk_senam_hapus.php?id_senam=$data[id_senam]' class='btn btn-danger'><i class='fa fa-trash-o'></a></td>
                                                </tr>";
                                                 }
                                            }else{ // Jika data tidak ada
                                                echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                                            }
                                            ?>
                                             <!--<td> <a href='pc_hapus.php?id_pc=$data[id_pc]' onclick='javascript: return confirm(Anda Yakin Ingin Menghapusnya?)' <button class='btn btn-danger' title='Hapus'><i class='fa fa-trash-o '></i></button></a></td>-->
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
