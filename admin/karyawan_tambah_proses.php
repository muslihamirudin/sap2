<?php
include 'koneksi.php';
    $nik = $_POST['nik'];
    $nama  =$_POST['nama'];
    $id_jabatan = $_POST['id_jabatan'];
    $id_departemen = $_POST['id_departemen'];

    $querytambah = mysqli_query($koneksi, "INSERT INTO karyawan VALUES (NULL, '$nik', '$nama', '$id_jabatan','$id_departemen')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        echo "<script>alert('Data Berhasil Disimpan')</script>";
        echo '<script type="text/javascript">window.location="karyawan_tampil.php"</script>';
    }
    else{
        echo "Data Gagal Disimpan!". mysqli_error($koneksi);
    }

?>