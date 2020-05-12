<?php
include 'koneksi.php';

    $departemen = $_POST['departemen'];
    $head = $_POST['head'];

    $querytambah = mysqli_query($koneksi, "INSERT INTO departemen VALUES (NULL,'$departemen','$head')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        echo "<script>alert('Data Berhasil Disimpan')</script>";
        echo '<script type="text/javascript">window.location="departemen_tampil.php"</script>';
    }
    else{
        echo "Data Gagal Disimpan!". mysqli_error($koneksi);
    }

?>