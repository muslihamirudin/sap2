<?php
include 'koneksi.php';

    $tgl_presensi = date('Y-m-d');
    $id_karyawan = $_POST['id_karyawan'];

    if(isset($_POST['hadir'])){
    $absen=mysqli_query($koneksi, "SELECT * FROM stalk_presensi WHERE tgl_presensi='$tgl_presensi' 
    and id_karyawan='$id_karyawan'");
    if(mysqli_num_rows($absen)>0){
    echo "<script>alert('Anda telah menginputkan Kehadiran!'); window.location = 'stalk_presensi_tampil.php'</script>";
    }else { 
        mysqli_query($koneksi, "INSERT INTO stalk_presensi VALUES (NULL, '$id_karyawan', '$tgl_presensi', 'Hadir')");
        header('location: stalk_presensi_tampil.php');
    }
 }

 if(isset($_POST['tidak_hadir'])){
    $absen=mysqli_query($koneksi, "SELECT * FROM stalk_presensi WHERE tgl_presensi='$tgl_presensi' 
    and id_karyawan='$id_karyawan'");
    if(mysqli_num_rows($absen)>0){
    echo "<script>alert('Anda telah menginputkan Kehadiran!'); window.location = 'stalk_presensi_tampil.php'</script>";
    }else { 
        mysqli_query($koneksi, "INSERT INTO stalk_presensi VALUES (NULL, '$id_karyawan', '$tgl_presensi', 'Tidak Hadir')");
        header('location: stalk_presensi_tampil.php');
    }
 }
 

?>