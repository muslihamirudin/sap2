<?php
include('koneksi.php');
session_start();
if(isset($_POST['login'])){
	$user = $_POST['username'];
	$pass = $_POST['password'];
 
	$perintah= "SELECT * FROM info_login WHERE username='$user' AND password='$pass'"; 
	$sql=mysqli_query($koneksi, $perintah)or die(mysqli_error()); //simpan variabel pilih user
	if(mysqli_num_rows($sql) == 0){ //jika tidak ditemukan
		echo '<script language="javascript">alert("User tidak ada!"); document.location="index.php";</script>';
	}else{ //jika ditemukan
		$row = mysqli_fetch_assoc($sql);
		if($row['level'] == 'admin' ){ // berdasarkan jabatan 
			$_SESSION['admin']=$user;
            $_SESSION["id_user"] = $row["id_user"];
			$_SESSION['username'] = $row['username']; // Set session untuk username (simpan username di session)
			$_SESSION['id_karyawan'] = $row['id_karyawan']; // Set session untuk nama (simpan nama di session)

			header("location: admin/menu/menu.php"); // Kita redirect ke halaman welcome.php
		
		}else if($row['level'] == 'supervisor'){
			$_SESSION['supervisor']=$user;
            $_SESSION["id_user"] = $row["id_user"];
			$_SESSION['username'] = $row['username']; // Set session untuk username (simpan username di session)
			$_SESSION['id_karyawan'] = $row['id_karyawan']; // Set session untuk nama (simpan nama di session)

			header("location: supervisor/menu/menu.php"); // Kita redirect ke halaman welcome.php	

		}else{
			header('location:index.php');
		}
	}
}
?>
