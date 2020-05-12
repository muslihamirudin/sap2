<?php
include 'koneksi.php';

 function upload() {

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

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


    $tgl_insop =$_POST['tgl_insop'];
    $due_insop = $_POST['due_insop'];
    $jenis_insop = $_POST['jenis_insop'];
    $id_lokasi = $_POST['id_lokasi'];
    $desk =$_POST['desk'];
    $rekomendasi =$_POST['rekomendasi'];
    $id_bahaya =$_POST['id_bahaya'];
    $inspektor= $_POST['inspektor'];
    $id_departemen = $_POST['id_departemen'];
   
    $gambar = upload();
    if( !$gambar ) {
        return false;
    }

    $querylapor = mysqli_query($koneksi, "INSERT INTO inspeksi_open VALUES (NULL,'$tgl_insop', '$due_insop', '$jenis_insop','$id_lokasi', '$desk', '$gambar', '$id_bahaya', '$rekomendasi', '$inspektor','$id_departemen','0')");

    if ($querylapor) {
        # code redicet setelah insert ke index
        echo "<script>alert('Data Berhasil Disimpan')</script>";
        echo '<script type="text/javascript">window.location="inspeksi_beranda.php"</script>';
    }
    else{
        echo "Data Gagal Disimpan!". mysqli_error($koneksi);
    }

?>