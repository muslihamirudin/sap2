<?php
include 'koneksi.php';

    $id_lokasi = $_POST['id_lokasi'];
    $lokasi  =$_POST['lokasi'];

    //query update
    $queryedit = mysqli_query($koneksi, "UPDATE lokasi SET lokasi='$lokasi' WHERE id_lokasi='$id_lokasi'");

    if ($queryedit) {
        # credirect ke page index
         echo "<script>alert('Data Berhasil Disimpan')</script>";
        echo '<script type="text/javascript">window.location="lokasi_tampil.php"</script>';
    }
    else{
        echo "Data Gagal Disimpan!". mysqli_error($koneksi);
    }

?>