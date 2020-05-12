<?php
include 'koneksi.php';

    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $password  =$_POST['password'];
    $level = $_POST['level'];
    $id_karyawan = $_POST['id_karyawan'];

    //query update
    $queryedit = mysqli_query($koneksi, "UPDATE info_login SET username= '$username', password='$password', level='$level', id_karyawan='$id_karyawan' WHERE id_user='$id_user'");

    if ($queryedit) {
        # credirect ke page index
         echo "<script>alert('Data Berhasil Disimpan')</script>";
        echo '<script type="text/javascript">window.location="pengguna_tampil.php"</script>';
    }
    else{
        echo "Data Gagal Disimpan!". mysqli_error($koneksi);
    }

?>