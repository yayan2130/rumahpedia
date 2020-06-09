<?php
ob_start();
include "koneksi.php";

$id=$_GET['id'];

$sql="DELETE FROM tb_rumah WHERE id='$id'";
if(mysqli_query($koneksi,$sql)){
	mysqli_close($koneksi);
	echo "<script>alert('Berhasil terhapus')</script>";
	header("location:list.php");
}
?>