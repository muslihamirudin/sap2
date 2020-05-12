<?php
include 'koneksi.php';
if($_GET['act'] == 'validasi'){
    $id_obscl = $_GET['id'];

    $query1 = mysqli_query($koneksi, "UPDATE observasi_close SET valid=1 WHERE id_obscl='$id_obscl'");


    if ($query1) {
        # code redicet setelah insert ke index
        echo "<script>alert('Data Berhasil Di validasi')</script>";
        echo '<script type="text/javascript">window.location="observasi_close.php"</script>';
    }
    else{
        echo "Data Gagal Di Validasi!". mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}

?>