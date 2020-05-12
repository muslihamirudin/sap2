<?php
include 'koneksi.php';

    $id_obsop = $_GET['id_obsop'];

    //query hapus
    $queryhapus = mysqli_query($koneksi, "DELETE FROM observasi_open WHERE id_obsop ='$id_obsop'");

    if ($queryhapus) {
        # redirect ke index.php
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo '<script type="text/javascript">window.location="observasi_beranda.php"</script>';
    }
    else{
        echo "Data Gagal Dihapus". mysqli_error($koneksi);
    }

?>