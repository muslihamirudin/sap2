<?php
include 'koneksi.php';

    $id_pc=$_POST['id_pc'];
    $tgl_pc  =$_POST['tgl_pc'];
    $name_karyawan = $_POST['name_karyawan'];
    $masalah =$_POST['masalah'];
    $rec_solusi =$_POST['rec_solusi'];
    $contacter =$_POST['contacter'];

    //query update
    $queryedit = mysqli_query($koneksi, "UPDATE personal_contact SET tgl_pc='$tgl_pc', name_karyawan='$name_karyawan', masalah='$masalah' , rec_solusi='$rec_solusi', contacter='$contacter' WHERE id_pc='$id_pc'");

    if ($queryedit) {
        # credirect ke page index
         echo "<script>alert('Data Berhasil Disimpan')</script>";
        echo '<script type="text/javascript">window.location="pc_beranda.php"</script>';
    }
    else{
        echo "Data Gagal Disimpan!". mysqli_error($koneksi);
    }

?>