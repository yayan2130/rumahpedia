<?php

include "koneksi.php";

	$username = $_POST['username'];
	$pass = $_POST['pass'];
	$nama = $_POST['nama'];
	$notelp = $_POST['notelp'];
	$email = $_POST['email'];

	$sql = "INSERT INTO tb_user (username, pass, nama, notelp, email) VALUES ('$username','$pass','$nama','$notelp','$email') ";
	if(mysqli_query($koneksi,$sql)){
		echo "<script>alert('Anda berhasil terdaftar. Masuk sekarang')</script>";
		?> <meta http-equiv="refresh" content="0; url=masuk.php">
<?php
		header('location:masuk.php');
	}
	else {
		echo "<script>alert('Anda gagal terdaftar. Coba lagi')</script>";
		?> <meta http-equiv="refresh" content="0; url=daftar.php">
<?php
		header('location:daftar.php');
	}
?>