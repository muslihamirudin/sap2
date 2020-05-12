<?php
include 'koneksi.php';

    $id_lokasi = $_GET['id_lokasi'];

    //query hapus
    $queryhapus = mysqli_query($koneksi, "DELETE FROM lokasi WHERE id_lokasi ='$id_lokasi'");

    if ($queryhapus) {
        # redirect ke index.php
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo '<script type="text/javascript">window.location="lokasi_tampil.php"</script>';
    }
    else{
        echo "Data Gagal Dihapus". mysqli_error($koneksi);
    }

?>