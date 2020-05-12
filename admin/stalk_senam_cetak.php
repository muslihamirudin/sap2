<?php ob_start();

 ?>

 <?php 
include 'koneksi.php';
include 'fungsi_tanggal.php'
?>

<html>
<head>
	<title>Cetak PDF</title>

<style>
  table.page_header {width: 1020px; border: none; background-color: #3C8DBC; color: #fff; border-bottom: solid 1mm #AAAADD; padding: 2mm }
  table.page_footer {width: 1020px; border: none; background-color: #3C8DBC; border-top: solid 1mm #AAAADD; padding: 2mm}
  h1 {color: #000033}
  h2 {color: #000055}
  h3 {color: #000077}
</style>
<!-- Setting Margin header/ kop -->
  <!-- Setting CSS Tabel data yang akan ditampilkan -->
  <style type="text/css">
  .tabel2 {
    border-collapse: collapse;
    margin-left: 20px;    
  }
  .tabel2 th, .tabel2 td {
      padding: 5px 5px;
      border: 1px solid #959595;
  }

   div.kanan {
     width:300px;
	 float:right;
     margin-left:600px;
     margin-top:-50px;
  }

  div.head {
     width:715px;
	 float:left;
     margin-left:20px;
     margin-top: 50px;
     display:inline;
     background-color: #27b70d;
  }

  div.kiri {
	  width:300px;
	  float:left;
	  margin-left:20px;
	  display:inline;
  }

  img { width: 100px; }
	</style>

</head>
<body>

<div class="kiri">
<table>
    <tr>
      <th><img src="assets/img/sapale.jpg" style="width:105px;height:40px" /></th>
     </tr>
</table>
</div>

<br>

 <div class="head" style="padding: 3mm; border: 1px solid;" align="center"><span style="font-size: 20px" >DATA PRESENSI SENAM</span> </div>

 	<?php
 	if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter
		$filter = $_GET['filter']; // Ambil data filder yang dipilih user

        if($filter == '1'){ // Jika filter nya 1 (per bulan)
            $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

             echo '<br /> <p align="center" style="font-weight: bold; font-size: 18px;"><u>DATA PRESENSI BULAN '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</u></p>';

             $query = "SELECT id_senam, tgl_senam, nik, nama, jabatan, departemen, ket FROM senam_presensi, karyawan, jabatan, departemen WHERE senam_presensi.id_karyawan=karyawan.id_karyawan AND karyawan.id_jabatan=jabatan.id_jabatan AND karyawan.id_departemen=departemen.id_departemen AND MONTH(tgl_senam)='".$_GET['bulan']."' AND YEAR(tgl_senam)='".$_GET['tahun']."'"; // Tampilkan data laporan sesuai tanggal yang diinput oleh user pada filter

        }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
            echo '<br /> <p align="center" style="font-weight: bold; font-size: 18px;"><u>DATA LAPORAN TAHUN '.$_GET['tahun'].'</u></p>';

            $query = "SELECT id_senam, tgl_senam, nik, nama, jabatan, departemen, ket FROM senam_presensi, karyawan, jabatan, departemen WHERE senam_presensi.id_karyawan=karyawan.id_karyawan AND karyawan.id_jabatan=jabatan.id_jabatan AND karyawan.id_departemen=departemen.id_departemen AND YEAR(tgl_senam)='".$_GET['tahun']."'"; // Tampilkan data laporan sesuai tahun yang diinput oleh user pada filter
        }
    }else{ // Jika user tidak mengklik tombol tampilkan
        echo '<br /> <p align="center" style="font-weight: bold; font-size: 18px;"><u>DATA SEMUA PRESENSI</u></p>';

        $query = "SELECT id_senam, tgl_senam, nik, nama, jabatan, departemen, ket FROM senam_presensi, karyawan, jabatan, departemen WHERE senam_presensi.id_karyawan=karyawan.id_karyawan AND karyawan.id_jabatan=jabatan.id_jabatan AND karyawan.id_departemen=departemen.id_departemen"; // Tampilkan semua data laporan diurutkan berdasarkan tanggal
    }
    ?>

    <table class="tabel2">
      <tr>
		    <td style="text-align: center; "><b>Tanggal</b></td>
        <td style="text-align: center; "><b>NIK</b></td>
        <td style="text-align: center; "><b>Nama Karyawan</b></td>
        <td style="text-align: center; "><b>Jabatan</b></td>
        <td style="text-align: center; "><b>Departemen</b></td>
        <td style="text-align: center; "><b>Keterangan</b></td>
      </tr>

    <?php include ('koneksi.php'); 
	$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
	$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

	if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
		while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
			$tgl = date('d-m-Y', strtotime($data['tgl_senam'])); // Ubah format tanggal jadi dd-mm-yyyy

			echo "<tr>";
            echo "<td style= 'text-align: center; width=90px;'>".fungsi_tanggal($data['tgl_senam'])."</td>";
            echo "<td style= 'text-align: center; width=80px;'>".$data['nik']."</td>";
            echo "<td style= 'text-align: center; width=150px;'>".$data['nama']."</td>";
            echo "<td style= 'text-align: center; width=90px;'>".$data['jabatan']."</td>";
            echo "<td style= 'text-align: center; width=100px;'>".$data['departemen']."</td>";
            echo "<td style= 'text-align: center; width=80px;'>".$data['ket']."</td>";
            echo "</tr>";
		}
	}else{ // Jika data tidak ada
		echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
	}
	?>
	</table>

	<div class="kanan">
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <p>Mengetahui :<br>Head Departemen SHE</p>
      <br>
      <br>
      <br>
      <p><b><u>Rudi Cahyadi</u></b></p>
  </div>
</body>
</html>

<?php
$html = ob_get_contents();
ob_end_clean();

require_once('plugin/html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Data Presensi-Senam.pdf', 'D');
?>