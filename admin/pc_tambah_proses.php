<?php
include 'koneksi.php';

    $tgl_pc =$_POST['tgl_pc'];
    $name_karyawan = $_POST['name_karyawan'];
    $masalah= $_POST['masalah'];
    $rec_solusi =$_POST['rec_solusi'];
    $contacter= $_POST['contacter'];


    $querytambahpc = mysqli_query($koneksi, "INSERT INTO personal_contact VALUES (NULL,'$tgl_pc', '$name_karyawan','$masalah', '$rec_solusi','$contacter')");

    if ($querytambahpc) {
        # code redicet setelah insert ke index
        echo "<script>alert('Data Berhasil Disimpan')</script>";
        echo '<script type="text/javascript">window.location="pc_beranda.php"</script>';
    }
    else{
        echo "Data Gagal Disimpan!". mysqli_error($koneksi);
    }

?>