<?php
include 'koneksi.php';

    $tgl_senam = date('Y-m-d');
    $id_karyawan = $_POST['id_karyawan'];

    if(isset($_POST['hadir'])){
    $absen=mysqli_query($koneksi, "SELECT * FROM senam_presensi WHERE tgl_senam='$tgl_senam' 
    and id_karyawan='$id_karyawan'");
    if(mysqli_num_rows($absen)>0){
    echo "<script>alert('Anda telah menginputkan Kehadiran!'); window.location = 'stalk_senam_tampil.php'</script>";
    }else { 
        mysqli_query($koneksi, "INSERT INTO senam_presensi VALUES (NULL, '$id_karyawan', '$tgl_senam', 'Hadir')");
        header('location: stalk_senam_tampil.php');
    }
 }

 if(isset($_POST['tidak_hadir'])){
    $absen=mysqli_query($koneksi, "SELECT * FROM senam_presensi WHERE tgl_senam='$tgl_senam' 
    and id_karyawan='$id_karyawan'");
    if(mysqli_num_rows($absen)>0){
    echo "<script>alert('Anda telah menginputkan Kehadiran!'); window.location = 'stalk_senam_tampil.php'</script>";
    }else { 
        mysqli_query($koneksi, "INSERT INTO senam_presensi VALUES (NULL, '$id_karyawan', '$tgl_senam', 'Tidak Hadir')");
        header('location: stalk_senam_tampil.php');
    }
 }
 

?>