<?php
include 'koneksi.php';

    $jabatan = $_POST['jabatan'];

    $querytambah = mysqli_query($koneksi, "INSERT INTO jabatan VALUES (NULL,'$jabatan')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        echo "<script>alert('Data Berhasil Disimpan')</script>";
        echo '<script type="text/javascript">window.location="jabatan_tampil.php"</script>';
    }
    else{
        echo "Data Gagal Disimpan!". mysqli_error($koneksi);
    }

?>