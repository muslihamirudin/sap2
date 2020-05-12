<?php
include 'koneksi.php';

    $id_jabatan = $_POST['id_jabatan'];
    $jabatan  =$_POST['jabatan'];

    //query update
    $queryedit = mysqli_query($koneksi, "UPDATE jabatan SET jabatan='$jabatan' WHERE id_jabatan='$id_jabatan'");

    if ($queryedit) {
        # credirect ke page index
         echo "<script>alert('Data Berhasil Disimpan')</script>";
        echo '<script type="text/javascript">window.location="jabatan_tampil.php"</script>';
    }
    else{
        echo "Data Gagal Disimpan!". mysqli_error($koneksi);
    }

?>