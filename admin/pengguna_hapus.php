<?php
include 'koneksi.php';

    $id_user = $_GET['id_user'];

    //query hapus
    $queryhapus = mysqli_query($koneksi, "DELETE FROM info_login WHERE id_user ='$id_user'");

    if ($queryhapus) {
        # redirect ke index.php
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo '<script type="text/javascript">window.location="pengguna_tampil.php"</script>';
    }
    else{
        echo "Data Gagal Dihapus". mysqli_error($koneksi);
    }

?>