<?php
include 'koneksi.php';

    $id_departemen = $_POST['id_departemen'];
    $departemen  =$_POST['departemen'];
    $head = $_POST['head'];

    //query update
    $queryedit = mysqli_query($koneksi, "UPDATE departemen SET departemen='$departemen', head='$head' WHERE id_departemen='$id_departemen'");

    if ($queryedit) {
        # credirect ke page index
         echo "<script>alert('Data Berhasil Disimpan')</script>";
        echo '<script type="text/javascript">window.location="departemen_tampil.php"</script>';
    }
    else{
        echo "Data Gagal Disimpan!". mysqli_error($koneksi);
    }

?>