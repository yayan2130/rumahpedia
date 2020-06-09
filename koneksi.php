<?php
  $server = "localhost"; 
  $user = "id13972364_rumahpedia_user";
  $pass = "Januar27=Carena42";
  $nama_db = "id13972364_rumahpedia";
  $koneksi = mysqli_connect($server,$user,$pass,$nama_db);

  if(!$koneksi){
  	die ("Koneksi dengan database gagal: ".mysql_connect_error());
  }
?>