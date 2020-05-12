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
    <title>S A P | Personal Contact </title>
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
                        <a href="pc_beranda.php"><i class="fa fa-dashboard fa-fw"></i>Dashboard Personal Contact</a>
                    </li>
                    <li class="selected">
                        <a href="personal_contact.php"><i class="fa fa-file-o fa-fw"></i>Personal Contact</a>
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
                    <h1 class="page-header">Data Personal Contact</h1>
                </div>
                 <!-- end  page header -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                  <div class="panel panel-primary">
                     <div class="panel-heading">
                            <i class="fa fa-flag fa-fw"></i> Berikut merupakan Data Personal Contact
                            <div class="pull-right">
                            </div>
                        </div>

                       <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                <link rel="stylesheet" href="plugin/jquery-ui/jquery-ui.min.css" /> <!-- Load file css jquery-ui -->
                        <script src="js/jquery.min.js"></script> <!-- Load file jquery -->

                         <form method="get" action="">
                            <h4>Menu Cetak</h4>

                             <label>Filter Berdasarkan</label><br>
                            <select name="filter" id="filter">
                            <option value="">Pilih</option>
                            <option value="1">Per Bulan</option>
                            <option value="2">Per Tahun</option>
                            </select>
                            <br /><br />

                            <div id="form-bulan">
                            <label>Bulan</label><br>
                            <select name="bulan">
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
                            <br /> <br />
                            </div>

                            <div id="form-tahun">
                            <label>Tahun</label><br>
                            <select name="tahun">
                            <option value="">Pilih</option>
                            <?php
                            $query = "SELECT YEAR(tgl_pc) AS tahun FROM personal_contact GROUP BY YEAR(tgl_pc)"; // Tampilkan tahun sesuai di tabel transaksi
                            $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query

                            while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                            echo '<option value="'.$data['tahun'].'">'.$data['tahun'].'</option>';
                            } ?>
                            </select>
                            <br /> <br />
                            </div>
                            <button class="btn btn-primary waves-effect waves-light" type="submit">Tampilkan</button> 
                            <a href="personal_contact.php" <button type="button" class="btn btn-danger waves-effect waves-light"> Reset Filter </button> </a>
                        </form>

                        <?php
                            if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
                                $filter = $_GET['filter']; // Ambil data filder yang dipilih user

                                if($filter == '1'){ // Jika filter nya 1 (per bulan)
                                     $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                                    echo '<h3>Data Personal Contact Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</h3>';
                                    echo '<a href="personal_contact_cetak.php?filter=1&bulan='.$_GET['bulan'].'&tahun='.$_GET['tahun'].'" <button type="button" class="btn btn-warning waves-effect waves-light"> Cetak PDF</button></a>';

                                    $query = "SELECT id_pc, tgl_pc, a.nama AS name_karyawan, departemen, masalah, rec_solusi, b.nama AS contacter FROM personal_contact, karyawan AS a, karyawan AS b, departemen WHERE personal_contact.name_karyawan=a.id_karyawan AND a.id_departemen=departemen.id_departemen AND personal_contact.contacter=b.id_karyawan AND MONTH(tgl_pc)='".$_GET['bulan']."' AND YEAR(tgl_pc)='".$_GET['tahun']."'"; // Tampilkan data laporan sesuai bulan dan tahun yang diinput oleh user pada filter
                                }else{ // Jika filter nya 3 (per tahun)
                                    echo '<h3>Data Personal Contact Tahun '.$_GET['tahun'].'</h3>';
                                    echo '<a href="personal_contact_cetak.php?filter=2&tahun='.$_GET['tahun'].'" <button type="button" class="btn btn-warning waves-effect waves-light"> Cetak PDF</button></a>';

                                    $query = "SELECT id_pc, tgl_pc, a.nama AS name_karyawan, departemen, masalah, rec_solusi, b.nama AS contacter FROM personal_contact, karyawan AS a, karyawan AS b, departemen WHERE personal_contact.name_karyawan=a.id_karyawan AND a.id_departemen=departemen.id_departemen AND personal_contact.contacter=b.id_karyawan AND YEAR(tgl_pc)='".$_GET['tahun']."'"; // Tampilkan data laporan sesuai tahun yang diinput oleh user pada filter
                                }
                            }else{ // Jika user tidak mengklik tombol tampilkan
                                echo '<h3>Semua Data Personal Contact </h3>';
                                echo '<a href="personal_contact_cetak.php" button type="button" class="btn btn-warning waves-effect waves-light"> Cetak PDF</button></a>';

                                $query = "SELECT id_pc, tgl_pc, a.nama AS name_karyawan, departemen, masalah, rec_solusi, b.nama AS contacter FROM personal_contact, karyawan AS a, karyawan AS b, departemen WHERE personal_contact.name_karyawan=a.id_karyawan AND a.id_departemen=departemen.id_departemen AND personal_contact.contacter=b.id_karyawan"; // Tampilkan semua data laporan diurutkan berdasarkan tanggal
                            }
                            ?>
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                     <thead>
                                        <tr>
                                          <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Nama Karyawan</th>
                                            <th>Departemen</th>
                                            <th>Masalah</th>
                                            <th>Solusi</th>
                                            <th>Contacter</th>
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
                                                $tgl = date('d-m-y', strtotime($data['tgl_pc'])); // Ubah format tanggal jadi dd-mm-yyyy
                                                $id_pc=$data['id_pc'];


                                                echo "<tr>
                                                <td>".$no++."</td>
                                                <td>".fungsi_tanggal($data['tgl_pc'])."</td>
                                                <td>".$data['name_karyawan']."</td>
                                                <td>".$data['departemen']."</td>
                                                <td>".$data['masalah']."</td>
                                                <td>".$data['rec_solusi']."</td>
                                                <td>".$data['contacter']."</td>
                                                <td><a href='personal_contact_hapus.php?id_pc=$data[id_pc]' class='btn btn-danger'><i class='fa fa-trash-o'></a></td>
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

</body>

</html>
