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

    move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);

    return $namaFileBaru;
    }


    $id_obsop=$_POST['id_obsop'];
    $tgl_obsop  =$_POST['tgl_obsop'];
    $due_obsop = $_POST['due_obsop'];
    $nama_kary = $_POST['nama_kary'];
    $id_lokasi =$_POST['id_lokasi'];
    $deskripsi =$_POST['deskripsi'];
    $rec =$_POST['rec'];
    $id_bahaya =$_POST['id_bahaya'];
    $observ= $_POST['observ'];
    $id_departemen = $_POST['id_departemen'];
    $fotolama = $_POST['fotolama'];

    // cek apakah user pilih gambar baru atau tidak
    if( $_FILES['bukti']['error'] === 4 ) {
        $bukti = $fotolama;
    } else {
        $bukti = upload();
    }

    //query update
    $queryedit = mysqli_query($koneksi, "UPDATE observasi_open SET tgl_obsop='$tgl_obsop', due_obsop='$due_obsop', nama_kary='$nama_kary', id_lokasi='$id_lokasi', deskripsi='$deskripsi', bukti='$bukti', id_bahaya ='$id_bahaya', rec='$rec', observ='$observ', id_departemen='$id_departemen', status=0 WHERE id_obsop='$id_obsop'");

    if ($queryedit) {
        # credirect ke page index
         echo "<script>alert('Data Berhasil Disimpan')</script>";
        echo '<script type="text/javascript">window.location="observasi_beranda.php"</script>';
    }
    else{
        echo "Data Gagal Disimpan!". mysqli_error($koneksi);
    }

?>