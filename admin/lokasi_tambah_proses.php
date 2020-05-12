<?php
include 'koneksi.php';

    $lokasi = $_POST['lokasi'];

    $querytambah = mysqli_query($koneksi, "INSERT INTO lokasi VALUES (NULL,'$lokasi')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        echo "<script>alert('Data Berhasil Disimpan')</script>";
        echo '<script type="text/javascript">window.location="lokasi_tampil.php"</script>';
    }
    else{
        echo "Data Gagal Disimpan!". mysqli_error($koneksi);
    }

?>