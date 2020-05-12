 <?php
function query($sql){
	global $koneksi;
	$perintah=mysqli_query($koneksi,$sql);
	if(!$perintah) die("Gagal melakukan koneksi".mysqli_connect_error());
	return $perintah;
}

function Chart_Tampil_Bahaya(){
	$sql="SELECT SUM(IF(id_bahaya=1,1,0)) AS jumlah_ekstrim, SUM(IF(id_bahaya=2,1,0)) AS jumlah_high, SUM(IF(id_bahaya=3,1,0)) AS jumlah_moderate, SUM(IF(id_bahaya=4,1,0)) AS jumlah_low FROM pica_open";
	$perintah=query($sql);
	return $perintah;
}


function Chart_Tampil_Dept(){
	$sql="SELECT SUM(IF(id_departemen=1,1,0)) AS Safety, SUM(IF(id_departemen=2,1,0)) AS Produksi, SUM(IF(id_departemen=3,1,0)) AS HRGA, SUM(IF(id_departemen=4,1,0)) AS Plant, SUM(IF(id_departemen=5,1,0)) AS Engineering FROM pica_open";
	$perintah=query($sql);
	return $perintah;
}

function Chart_Tampil_Status(){
	$sql="SELECT SUM(IF(status=0,1,0)) AS Belum, SUM(IF(status=1,1,0)) AS Sudah FROM pica_open";
	$perintah=query($sql);
	return $perintah;
}

function Chart_Tampil_Bahaya_Obs(){
	$sql="SELECT SUM(IF(id_bahaya=1,1,0)) AS jumlah_ekstrim, SUM(IF(id_bahaya=2,1,0)) AS jumlah_high, SUM(IF(id_bahaya=3,1,0)) AS jumlah_moderate, SUM(IF(id_bahaya=4,1,0)) AS jumlah_low FROM observasi_open";
	$perintah=query($sql);
	return $perintah;
}

function Chart_Tampil_Dept_Obs(){
	$sql="SELECT SUM(IF(id_departemen=1,1,0)) AS Safety, SUM(IF(id_departemen=2,1,0)) AS Produksi, SUM(IF(id_departemen=3,1,0)) AS HRGA, SUM(IF(id_departemen=4,1,0)) AS Plant, SUM(IF(id_departemen=5,1,0)) AS Engineering FROM observasi_open";
	$perintah=query($sql);
	return $perintah;
}

function Chart_Tampil_Status_Obs(){
	$sql="SELECT SUM(IF(status=0,1,0)) AS Belum, SUM(IF(status=1,1,0)) AS Sudah FROM observasi_open";
	$perintah=query($sql);
	return $perintah;
}

function Chart_Tampil_Bahaya_Ins(){
	$sql="SELECT SUM(IF(id_bahaya=1,1,0)) AS jumlah_ekstrim, SUM(IF(id_bahaya=2,1,0)) AS jumlah_high, SUM(IF(id_bahaya=3,1,0)) AS jumlah_moderate, SUM(IF(id_bahaya=4,1,0)) AS jumlah_low FROM inspeksi_open";
	$perintah=query($sql);
	return $perintah;
}

function Chart_Tampil_Dept_Ins(){
	$sql="SELECT SUM(IF(id_departemen=1,1,0)) AS Safety, SUM(IF(id_departemen=2,1,0)) AS Produksi, SUM(IF(id_departemen=3,1,0)) AS HRGA, SUM(IF(id_departemen=4,1,0)) AS Plant, SUM(IF(id_departemen=5,1,0)) AS Engineering FROM inspeksi_open";
	$perintah=query($sql);
	return $perintah;
}

function Chart_Tampil_Status_Ins(){
	$sql="SELECT SUM(IF(status=0,1,0)) AS Belum, SUM(IF(status=1,1,0)) AS Sudah FROM inspeksi_open";
	$perintah=query($sql);
	return $perintah;
}

function Jumlah_data($nilai_1, $nilai_2){
 return($nilai_1+$nilai_2);
}
function Nilai_Persen($nilai_1, $nilai_2){
 return round((($nilai_1/$nilai_2)*100), 2).'%';
}

function Jumlah_databahaya($nilai_1, $nilai_2, $nilai_3, $nilai_4){
 return($nilai_1+$nilai_2+$nilai_3+$nilai_4);
}

function Jumlah_datadepartemen($nilai_1, $nilai_2, $nilai_3, $nilai_4, $nilai_5){
 return($nilai_1+$nilai_2+$nilai_3+$nilai_4+$nilai_5);
}

function Jumlah_databahaya_obs($nilai_1, $nilai_2, $nilai_3, $nilai_4){
 return($nilai_1+$nilai_2+$nilai_3+$nilai_4);
}

function Jumlah_datadepartemen_obs($nilai_1, $nilai_2, $nilai_3, $nilai_4, $nilai_5){
 return($nilai_1+$nilai_2+$nilai_3+$nilai_4+$nilai_5);
}

function Jumlah_databahaya_ins($nilai_1, $nilai_2, $nilai_3, $nilai_4){
 return($nilai_1+$nilai_2+$nilai_3+$nilai_4);
}

function Jumlah_datadepartemen_ins($nilai_1, $nilai_2, $nilai_3, $nilai_4, $nilai_5){
 return($nilai_1+$nilai_2+$nilai_3+$nilai_4+$nilai_5);
}

?>