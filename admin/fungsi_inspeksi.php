<?php
include 'koneksi.php';

 function upload() {

    $namaFile = $_FILES['gambar_perbaikan']['name'];
    $ukuranFile = $_FILES['gambar_perbaikan']['size'];
    $error = $_FILES['gambar_perbaikan']['error'];
    $tmpName = $_FILES['gambar_perbaikan']['tmp_name'];

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
    $id_insop = $_GET['id'];
    $tgl_inscl = date('Y-m-d');
   
    $gambar_perbaikan = upload();
    if( !$gambar_perbaikan ) {
        return false;
    }

    $query1 = mysqli_query($koneksi, "UPDATE inspeksi_open SET status=1 WHERE id_insop='$id_insop'");
    $query2 = mysqli_query($koneksi, "INSERT INTO inspeksi_close VALUES (NULL, '$tgl_inscl', '$gambar_perbaikan',0,'$id_insop')");


    if ($query2) {
        # code redicet setelah insert ke index
        echo "<script>alert('Perbaikan Berhasil!')</script>";
    	echo '<script type="text/javascript">window.location="inspeksi_validation.php"</script>';
    }
    else{
        echo "Data Gagal Diperbaiki!". mysqli_error($koneksi);
    }


}elseif ($_GET['act'] == 'hapusinspeksi'){
    $id_insop = $_GET['id'];

    //query hapus
    $queryhapus = mysqli_query($koneksi, "DELETE FROM inspeksi_open WHERE id_insop = '$id_insop'");

    if ($queryhapus) {
        # redirect ke index.php
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo '<script type="text/javascript">window.location="inspeksi_open.php"</script>';
    }
    else{
        echo "Data Gagal Dihapus". mysqli_error($koneksi);
    }
}



if($_GET['act'] == 'validasi'){
    $id_inscl = $_GET['id'];

    $query1 = mysqli_query($koneksi, "UPDATE inspeksi_close SET valid=1 WHERE id_inscl='$id_inscl'");


    if ($query1) {
        # code redicet setelah insert ke index
        echo "<script>alert('Data Berhasil Di validasi')</script>";
        echo '<script type="text/javascript">window.location="inspeksi_close.php"</script>';
    }
    else{
        echo "Data Gagal Di Validasi!". mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}

?>