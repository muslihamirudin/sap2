<?php
include 'koneksi.php';

    $id_picao = $_GET['id_picao'];

    //query hapus
    $queryhapus = mysqli_query($koneksi, "DELETE FROM pica_open WHERE id_picao ='$id_picao'");

    if ($queryhapus) {
        # redirect ke index.php
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo '<script type="text/javascript">window.location="pica_beranda.php"</script>';
    }
    else{
        echo "Data Gagal Dihapus". mysqli_error($koneksi);
    }

?>