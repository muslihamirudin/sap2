<?php
include 'koneksi.php';

 function upload() {

    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

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


    $id_picao=$_POST['id_picao'];
    $tanggal  =$_POST['tanggal'];
    $due_tanggal = $_POST['due_tanggal'];
    $lokasi =$_POST['id_lokasi'];
    $desc_bahaya =$_POST['desc_bahaya'];
    $rec_tindakan =$_POST['rec_tindakan'];
    $id_bahaya =$_POST['id_bahaya'];
    $id_karyawan= $_POST['id_karyawan'];
    $id_departemen = $_POST['id_departemen'];
    $fotolama = $_POST['fotolama'];

    // cek apakah user pilih gambar baru atau tidak
    if( $_FILES['foto']['error'] === 4 ) {
        $foto = $fotolama;
    } else {
        $foto = upload();
    }

    //query update
    $queryedit = mysqli_query($koneksi, "UPDATE pica_open SET tanggal='$tanggal' , id_lokasi='$lokasi' , desc_bahaya='$desc_bahaya' , foto='$foto', id_bahaya ='$id_bahaya', due_tanggal='$due_tanggal', rec_tindakan='$rec_tindakan', id_karyawan='$id_karyawan', id_departemen='$id_departemen', status=0 WHERE id_picao='$id_picao'");

    if ($queryedit) {
        # credirect ke page index
         echo "<script>alert('Data Berhasil Disimpan')</script>";
        echo '<script type="text/javascript">window.location="pica_beranda.php"</script>';
    }
    else{
        echo "Data Gagal Disimpan!". mysqli_error($koneksi);
    }

?>