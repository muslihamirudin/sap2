<?php
include 'koneksi.php';

    $id_karyawan = $_GET['id_karyawan'];

    //query hapus
    $queryhapus = mysqli_query($koneksi, "DELETE FROM karyawan WHERE id_karyawan ='$id_karyawan'");

    if ($queryhapus) {
        # redirect ke index.php
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo '<script type="text/javascript">window.location="karyawan_tampil.php"</script>';
    }
    else{
        echo "Data Gagal Dihapus". mysqli_error($koneksi);
    }

?>