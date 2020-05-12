<?php
include 'koneksi.php';

    $id_jabatan = $_GET['id_jabatan'];

    //query hapus
    $queryhapus = mysqli_query($koneksi, "DELETE FROM jabatan WHERE id_jabatan ='$id_jabatan'");

    if ($queryhapus) {
        # redirect ke index.php
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo '<script type="text/javascript">window.location="jabatan_tampil.php"</script>';
    }
    else{
        echo "Data Gagal Dihapus". mysqli_error($koneksi);
    }

?>