<?php
include 'koneksi.php';

    $id_bahaya = $_POST['id_bahaya'];
    $bahaya  =$_POST['bahaya'];
    $tindakan  =$_POST['tindakan'];

    //query update
    $queryedit = mysqli_query($koneksi, "UPDATE bahaya SET bahaya='$bahaya', tindakan='$tindakan' WHERE id_bahaya='$id_bahaya'");

    if ($queryedit) {
        # credirect ke page index
         echo "<script>alert('Data Berhasil Disimpan')</script>";
        echo '<script type="text/javascript">window.location="bahaya_tampil.php"</script>';
    }
    else{
        echo "Data Gagal Disimpan!". mysqli_error($koneksi);
    }

?>