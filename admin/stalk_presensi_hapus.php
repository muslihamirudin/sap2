<?php
include 'koneksi.php';

    $id_presensi = $_GET['id_presensi'];

    //query hapus
    $queryhapus = mysqli_query($koneksi, "DELETE FROM stalk_presensi WHERE id_presensi ='$id_presensi'");

    if ($queryhapus) {
        # redirect ke index.php
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo '<script type="text/javascript">window.location="stalk_presensi_tampil.php"</script>';
    }
    else{
        echo "Data Gagal Dihapus". mysqli_error($koneksi);
    }

?>