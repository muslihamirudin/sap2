<?php
include 'koneksi.php';

    $id_senam = $_GET['id_senam'];

    //query hapus
    $queryhapus = mysqli_query($koneksi, "DELETE FROM senam_presensi WHERE id_senam ='$id_senam'");

    if ($queryhapus) {
        # redirect ke index.php
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo '<script type="text/javascript">window.location="stalk_senam_tampil.php"</script>';
    }
    else{
        echo "Data Gagal Dihapus". mysqli_error($koneksi);
    }

?>