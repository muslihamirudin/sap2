<?php
include 'koneksi.php';

if($_GET['act'] == 'validasi'){
    $id_picac = $_GET['id'];

    $query1 = mysqli_query($koneksi, "UPDATE pica_close SET validasi=1 WHERE id_picac='$id_picac'");


    if ($query1) {
        # code redicet setelah insert ke index
        echo "<script>alert('Data Berhasil Di validasi')</script>";
        echo '<script type="text/javascript">window.location="pica_close.php"</script>';
    }
    else{
        echo "Data Gagal Di Validasi!". mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}

?>