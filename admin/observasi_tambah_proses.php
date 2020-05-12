<?php
include 'koneksi.php';

 function upload() {

    $namaFile = $_FILES['bukti']['name'];
    $ukuranFile = $_FILES['bukti']['size'];
    $error = $_FILES['bukti']['error'];
    $tmpName = $_FILES['bukti']['tmp_name'];

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

    move_uploaded_file($tmpName, 'assets/img/'. $namaFileBaru);

    return $namaFileBaru;
    }


    $tgl_obsop =$_POST['tgl_obsop'];
    $due_obsop = $_POST['due_obsop'];
    $jenis_obsop = $_POST['jenis_obsop'];
    $nama_kary = $_POST['nama_kary'];
    $lokasi =$_POST['id_lokasi'];
    $deskripsi =$_POST['deskripsi'];
    $rec =$_POST['rec'];
    $id_bahaya =$_POST['id_bahaya'];
    $observ= $_POST['observ'];
    $id_departemen = $_POST['id_departemen'];
   
    $bukti = upload();
    if( !$bukti ) {
        return false;
    }

    $querylapor = mysqli_query($koneksi, "INSERT INTO observasi_open VALUES (NULL,'$tgl_obsop', '$due_obsop', '$jenis_obsop','$nama_kary', '$lokasi', '$deskripsi', '$bukti', '$id_bahaya', '$rec', '$observ','$id_departemen','0')");

    if ($querylapor) {
        # code redicet setelah insert ke index
        echo "<script>alert('Data Berhasil Disimpan')</script>";
        echo '<script type="text/javascript">window.location="observasi_beranda.php"</script>';
    }
    else{
        echo "Data Gagal Disimpan!". mysqli_error($koneksi);
    }

?>