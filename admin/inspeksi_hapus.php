<?php
include 'koneksi.php';

    $id_insop = $_GET['id_insop'];

    //query hapus
    $queryhapus = mysqli_query($koneksi, "DELETE FROM inspeksi_open WHERE id_insop ='$id_insop'");

    if ($queryhapus) {
        # redirect ke index.php
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo '<script type="text/javascript">window.location="inspeksi_beranda.php"</script>';
    }
    else{
        echo "Data Gagal Dihapus". mysqli_error($koneksi);
    }

?>