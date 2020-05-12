<?php
include 'koneksi.php';

 function upload() {

    $namaFile = $_FILES['bukti_perbaikan']['name'];
    $ukuranFile = $_FILES['bukti_perbaikan']['size'];
    $error = $_FILES['bukti_perbaikan']['error'];
    $tmpName = $_FILES['bukti_perbaikan']['tmp_name'];

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
    $id_obsop = $_GET['id'];
    $tgl_obscl = date('Y-m-d');
   
    $bukti_perbaikan = upload();
    if( !$bukti_perbaikan ) {
        return false;
    }

    $query1 = mysqli_query($koneksi, "UPDATE observasi_open SET status=1 WHERE id_obsop='$id_obsop'");
    $query2 = mysqli_query($koneksi, "INSERT INTO observasi_close VALUES (NULL,'$bukti_perbaikan', 0, '$tgl_obscl', '$id_obsop')");


    if ($query2) {
        # code redicet setelah insert ke index
        echo "<script>alert('Perbaikan Berhasil!')</script>";
    	echo '<script type="text/javascript">window.location="observasi_validation.php"</script>';
    }
    else{
        echo "Data Gagal Diperbaiki!". mysqli_error($koneksi);
    }


}elseif ($_GET['act'] == 'hapusobsrv'){
    $id_obsop = $_GET['id'];

    //query hapus
    $queryhapus = mysqli_query($koneksi, "DELETE FROM observasi_open WHERE id_obsop = '$id_obsop'");

    if ($queryhapus) {
        # redirect ke index.php
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo '<script type="text/javascript">window.location="observasi_open.php"</script>';
    }
    else{
        echo "Data Gagal Dihapus". mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
}

?>