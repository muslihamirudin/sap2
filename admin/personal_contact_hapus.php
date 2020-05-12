<?php
include 'koneksi.php';

    $id_pc = $_GET['id_pc'];

    //query hapus
    $queryhapus = mysqli_query($koneksi, "DELETE FROM personal_contact WHERE id_pc ='$id_pc'");

    if ($queryhapus) {
        # redirect ke index.php
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo '<script type="text/javascript">window.location="pc_beranda.php"</script>';
    }
    else{
        echo "Data Gagal Dihapus". mysqli_error($koneksi);
    }

?>