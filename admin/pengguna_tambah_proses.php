<?php
include 'koneksi.php';
    $username  =$_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $id_karyawan = $_POST['id_karyawan'];

    $querytambah = mysqli_query($koneksi, "INSERT INTO info_login VALUES (NULL, '$username', '$password', '$level','$id_karyawan')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        echo "<script>alert('Data Berhasil Disimpan')</script>";
        echo '<script type="text/javascript">window.location="pengguna_tampil.php"</script>';
    }
    else{
        echo "Data Gagal Disimpan!". mysqli_error($koneksi);
    }

?>