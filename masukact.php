<?php 
ob_start();
session_start();
$_SESSION['status']="";
include "koneksi.php";

$username = $_POST['username'];
$pass = $_POST['pass'];

$data = mysqli_query($koneksi,"SELECT * from tb_user where username='$username' and pass='$pass'");

$cek = mysqli_num_rows($data);

$row = mysqli_fetch_assoc($data);

if($cek > 0){
  $_SESSION['username'] = $username;
  $_SESSION['nama'] = $row['nama'];
  $_SESSION['notelp'] = $row['notelp'];
  $_SESSION['email'] = $row['email'];

	if($_SESSION['status'] == "tambah"){
	$_SESSION['status'] = "masuk";	
	header("location:tambah.php");
	exit();
	}else{
	$_SESSION['status'] = "masuk";
	header("location:admin.php");
	exit();
	}
}else{
  header("location:masuk.php?pesan=gagal");
}

?>