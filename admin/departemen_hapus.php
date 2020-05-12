<?php
include 'koneksi.php';

    $id_departemen = $_GET['id_departemen'];

    //query hapus
    $queryhapus = mysqli_query($koneksi, "DELETE FROM departemen WHERE id_departemen ='$id_departemen'");

    if ($queryhapus) {
        # redirect ke index.php
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo '<script type="text/javascript">window.location="departemen_tampil.php"</script>';
    }
    else{
        echo "Data Gagal Dihapus". mysqli_error($koneksi);
    }

?>