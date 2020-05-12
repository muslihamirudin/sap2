<?php
include 'koneksi.php';

 function upload() {

    $namaFile = $_FILES['foto_perbaikan']['name'];
    $ukuranFile = $_FILES['foto_perbaikan']['size'];
    $error = $_FILES['foto_perbaikan']['error'];
    $tmpName = $_FILES['foto_perbaikan']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if( $error === 4 ) {
        echo "<script>
                alert('pilih foto terlebih dahulu!');
              </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiFotoValid = ['jpg', 'jpeg', 'png'];
    $ekstensiFoto = explode('.', $namaFile);
    $ekstensiFoto = strtolower(end($ekstensiFoto));
    if( !in_array($ekstensiFoto, $ekstensiFotoValid) ) {
        echo "<script>
                alert('yang anda upload bukan foto!');
              </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if( $ukuranFile > 10000000 ) {
        echo "<script>
                alert('ukuran foto terlalu besar!');
              </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFoto;

    move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);

    return $namaFileBaru;
    }

if($_GET['act'] == 'perbaikan'){
    $id_picao = $_GET['id'];
    $tanggal_perbaikan = date('Y-m-d');
   
    $foto_perbaikan = upload();
    if( !$foto_perbaikan ) {
        return false;
    }

    $query1 = mysqli_query($koneksi, "UPDATE pica_open SET status=1 WHERE id_picao='$id_picao'");
    $query2 = mysqli_query($koneksi, "INSERT INTO pica_close VALUES (NULL,'$foto_perbaikan', 0, '$id_picao', '$tanggal_perbaikan')");


    if ($query2) {
        # code redicet setelah insert ke index
        echo "<script>alert('Perbaikan Berhasil!')</script>";
    	echo '<script type="text/javascript">window.location="pica_validation.php"</script>';
    }
    else{
        echo "Data Gagal Diperbaiki!". mysqli_error($koneksi);
    }


}elseif ($_GET['act'] == 'hapuspicao'){
    $id_picao = $_GET['id'];

    //query hapus
    $queryhapus = mysqli_query($koneksi, "DELETE FROM pica_open WHERE id_picao = '$id_picao'");

    if ($queryhapus) {
        # redirect ke index.php
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo '<script type="text/javascript">window.location="pica_open.php"</script>';
    }
    else{
        echo "Data Gagal Dihapus". mysqli_error($koneksi);
    }
}



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