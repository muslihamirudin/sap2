<?php
include 'koneksi.php';

    $id_bahaya = $_GET['id_bahaya'];

    //query hapus
    $queryhapus = mysqli_query($koneksi, "DELETE FROM bahaya WHERE id_bahaya ='$id_bahaya'");

    if ($queryhapus) {
        # redirect ke index.php
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo '<script type="text/javascript">window.location="bahaya_tampil.php"</script>';
    }
    else{
        echo "Data Gagal Dihapus". mysqli_error($koneksi);
    }

?>