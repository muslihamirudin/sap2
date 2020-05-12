<?php
include 'koneksi.php';

    $id_karyawan = $_POST['id_karyawan'];
    $nik = $_POST['nik'];
    $nama  =$_POST['nama'];
    $id_jabatan = $_POST['id_jabatan'];
    $id_departemen = $_POST['id_departemen'];

    //query update
    $queryedit = mysqli_query($koneksi, "UPDATE karyawan SET nik= '$nik', nama='$nama', id_jabatan='$id_jabatan', id_departemen='$id_departemen' WHERE id_karyawan='$id_karyawan'");

    if ($queryedit) {
        # credirect ke page index
         echo "<script>alert('Data Berhasil Disimpan')</script>";
        echo '<script type="text/javascript">window.location="karyawan_tampil.php"</script>';
    }
    else{
        echo "Data Gagal Disimpan!". mysqli_error($koneksi);
    }

?>