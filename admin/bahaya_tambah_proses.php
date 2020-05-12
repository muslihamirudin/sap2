<?php
include 'koneksi.php';

    $bahaya = $_POST['bahaya'];
    $tindakan = $_POST['tindakan'];

    $querytambah = mysqli_query($koneksi, "INSERT INTO bahaya VALUES (NULL,'$bahaya','$tindakan')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        echo "<script>alert('Data Berhasil Disimpan')</script>";
        echo '<script type="text/javascript">window.location="bahaya_tampil.php"</script>';
    }
    else{
        echo "Data Gagal Disimpan!". mysqli_error($koneksi);
    }

?>