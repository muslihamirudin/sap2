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
     margin-left:500px;
     margin-top:-50px;
  }

  div.tgg {
     width:300px;
   float:right;
     margin-left:920px;
     margin-top:-50px;
  }

  div.head {
     width:1020px;
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

<div class="kanan">

  	<table class="tabel2">
  		<tr>
  		<td>Nomor Formulir</td>
  		<td align="center" rowspan="2" >ALE-SHE-FO-11</td>
  		</tr>

  		<tr>
  		<td>Form Number</td>
  		</tr>
  	</table>
</div>

<br>

 <div class="head" style="padding: 3mm; border: 1px solid;" align="center"><span style="font-size: 14px" >OBSERVASI CLOSE</span> </div>

 	<?php
 	if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter
		$filter = $_GET['filter']; // Ambil data filder yang dipilih user

        if($filter == '1'){ // Jika filter nya 1 (per tanggal)
            $tgl = date('d-m-y', strtotime($_GET['tgl_obscl']));

            echo '<br /> <p align="center" style="font-weight: bold; font-size: 18px;"><u>DATA LAPORAN TANGGAL '.$tgl.'</u></p>';

            $query = "SELECT id_obscl, tgl_obscl, bukti_perbaikan, tgl_obsop, due_obsop, jenis_obsop, a.nama AS nama_kary, lokasi, deskripsi, bukti, bahaya, rec, b.nama AS observator, head FROM observasi_close, observasi_open, karyawan AS a, karyawan AS b, lokasi, bahaya, departemen WHERE observasi_close.id_obsop=observasi_open.id_obsop AND observasi_open.nama_kary=a.id_karyawan AND observasi_open.id_lokasi=lokasi.id_lokasi AND observasi_open.id_bahaya=bahaya.id_bahaya AND observasi_open.observ=b.id_karyawan AND observasi_open.id_departemen = departemen.id_departemen AND valid=1 AND DATE(tgl_obscl)='".$_GET['tgl_obscl']."'"; // Tampilkan data laporan sesuai tanggal yang diinput oleh user pada filter

        }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
            $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

             echo '<br /> <p align="center" style="font-weight: bold; font-size: 18px;"><u>DATA LAPORAN BULAN '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</u></p>';

            $query = "SELECT id_obscl, tgl_obscl, bukti_perbaikan, tgl_obsop, due_obsop, jenis_obsop, a.nama AS nama_kary, lokasi, deskripsi, bukti, bahaya, rec, b.nama AS observator, head FROM observasi_close, observasi_open, karyawan AS a, karyawan AS b, lokasi, bahaya, departemen WHERE observasi_close.id_obsop=observasi_open.id_obsop AND observasi_open.nama_kary=a.id_karyawan AND observasi_open.id_lokasi=lokasi.id_lokasi AND observasi_open.id_bahaya=bahaya.id_bahaya AND observasi_open.observ=b.id_karyawan AND observasi_open.id_departemen = departemen.id_departemen AND valid=1 AND MONTH(tgl_obscl)='".$_GET['bulan']."' AND YEAR(tgl_obscl)='".$_GET['tahun']."'"; // Tampilkan data laporan sesuai bulan dan tahun yang diinput oleh user pada filter

        }else{ // Jika filter nya 3 (per tahun)
            echo '<br /> <p align="center" style="font-weight: bold; font-size: 18px;"><u>DATA LAPORAN TAHUN '.$_GET['tahun'].'</u></p>';

            $query = "SELECT id_obscl, tgl_obscl, bukti_perbaikan, tgl_obsop, due_obsop, jenis_obsop, a.nama AS nama_kary, lokasi, deskripsi, bukti, bahaya, rec, b.nama AS observator, head FROM observasi_close, observasi_open, karyawan AS a, karyawan AS b, lokasi, bahaya, departemen WHERE observasi_close.id_obsop=observasi_open.id_obsop AND observasi_open.nama_kary=a.id_karyawan AND observasi_open.id_lokasi=lokasi.id_lokasi AND observasi_open.id_bahaya=bahaya.id_bahaya AND observasi_open.observ=b.id_karyawan AND observasi_open.id_departemen = departemen.id_departemen AND valid=1 AND YEAR(tgl_obscl)='".$_GET['tahun']."'"; // Tampilkan data laporan sesuai tahun yang diinput oleh user pada filter
        }
    }else{ // Jika user tidak mengklik tombol tampilkan
        echo '<br /> <p align="center" style="font-weight: bold; font-size: 18px;"><u>DATA SEMUA LAPORAN</u></p>';

        $query = "SELECT id_obscl, tgl_obscl, bukti_perbaikan, tgl_obsop, due_obsop, jenis_obsop, a.nama AS nama_kary, lokasi, deskripsi, bukti, bahaya, rec, b.nama AS observator, head FROM observasi_close, observasi_open, karyawan AS a, karyawan AS b, lokasi, bahaya, departemen WHERE observasi_close.id_obsop=observasi_open.id_obsop AND observasi_open.nama_kary=a.id_karyawan AND observasi_open.id_lokasi=lokasi.id_lokasi AND observasi_open.id_bahaya=bahaya.id_bahaya AND observasi_open.observ=b.id_karyawan AND observasi_open.id_departemen = departemen.id_departemen AND valid=1"; // Tampilkan semua data laporan diurutkan berdasarkan tanggal
    }
    ?>

    <table class="tabel2">
      <tr>
		<td style="text-align: center; "><b>Tgl Perbaikan</b></td>
        <td style="text-align: center; "><b>Foto Perbaikan</b></td>
        <td style="text-align: center; "><b>Tanggal</b></td>
        <td style="text-align: center; "><b>Tenggat</b></td>
        <td style="text-align: center; "><b>Jenis</b></td>
        <td style="text-align: center; "><b>Nama</b></td>
		    <td style="text-align: center; "><b>Lokasi</b></td>
        <td style="text-align: center; "><b>Deskripsi</b></td>
        <td style="text-align: center; "><b>Foto</b></td>
        <td style="text-align: center; "><b>Bahaya</b></td>
        <td style="text-align: center; "><b>Tindakan</b></td>
        <td style="text-align: center; "><b>Observator</b></td>
        <td style="text-align: center; "><b>PJ</b></td>
      </tr>

    <?php include ('koneksi.php'); 
	$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
	$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

	if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
		while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
			$tgl = date('d-m-Y', strtotime($data['tgl_obscl'])); // Ubah format tanggal jadi dd-mm-yyyy

			echo "<tr>";
            echo "<td style= 'text-align: center; width=30px;'>".fungsi_tanggal($data['tgl_obscl'])."</td>";
            echo "<td style= 'text-align: center; width=85px;'><img src=assets/img/".$data['bukti_perbaikan']."></td>";
            echo "<td style= 'text-align: center; width=55px;'>".fungsi_tanggal($data['tgl_obsop'])."</td>";
            echo "<td style= 'text-align: center; width=55px;'>".fungsi_tanggal($data['due_obsop'])."</td>";
            echo "<td style= 'text-align: center; width=50px;'>".$data['jenis_obsop']."</td>";
            echo "<td style= 'text-align: center; width=40px;'>".$data['nama_kary']."</td>";
            echo "<td style= 'text-align: center; width=40px;'>".$data['lokasi']."</td>";
            echo "<td style= 'text-align: center; width=75px;'>".$data['deskripsi']."</td>";
            echo "<td style= 'text-align: center; width=85px;'><img src=assets/img/".$data['bukti']."></td>";
            echo "<td style= 'text-align: center; width=40px;'>".$data['bahaya']."</td>";
            echo "<td style= 'text-align: center; width=70px;'>".$data['rec']."</td>";
            echo "<td style= 'text-align: center; width=50px;'>".$data['observator']."</td>";
            echo "<td style= 'text-align: center; width=35px;'>".$data['head']."</td>";
            echo "</tr>";
		}
	}else{ // Jika data tidak ada
		echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
	}
	?>
	</table>

	<div class="tgg">
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
$pdf = new HTML2PDF('L','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Data Laporan-OBSERVASI-Close.pdf', 'D');
?>