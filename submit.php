<?php
include "koneksi.php";
	
	$error_tawaran="";
	$error_alamat="";
	$error_provinsi="";
	$error_harga="";
	$error_kamar_tidur="";
	$error_luas="";
	$error_sertifikat="";
	$error_kata_kunci="";
	$error_foto_rumah="";

	$tawaran="";
	$alamat=""; 
	$provinsi=""; 
	$harga=""; 
	$kamar_tidur=""; 
	$luas=""; 
	$sertifikat=""; 
	$kata_kunci=""; 

	$username=$_SESSION['username'];
	$notelp=$_SESSION['notelp'];
	$email=$_SESSION['email'];

	if ($_SERVER["REQUEST_METHOD"]=="POST") 
	{
		//TAWARAN
		if(!isset($_POST['tawaran'])){ 
        	$error_tawaran = "No radio buttons were checked."; 
	    }else{
	    	$tawaran = cek_input($_POST["tawaran"]);
	    }

		//ALAMAT
		if (empty($_POST["alamat"])) {
			$error_alamat="alamat tidak boleh kosong";
		}else{
			$alamat = cek_input($_POST["alamat"]);
		}
	
		//PROVINSI
		if(empty($_POST["provinsi"])){
			$error_provinsi="Silahkan pilih salah satu";
		}else{
			$provinsi= cek_input($_POST["provinsi"]);
		}

		//Harga
		if (empty($_POST["harga"])) {
			$error_harga="Harga tidak boleh kosong";
		}else{
			$harga = cek_input($_POST["harga"]);
			if (!is_numeric($harga)) {
				$error_harga="Harga hanya Boleh angka";
			}
		}

		//Kamar Tidur
		if (empty($_POST["kamar_tidur"])) {
			$error_kamar_tidur="Kamar Tidur tidak boleh kosong";
		}else{
			$kamar_tidur = cek_input($_POST["kamar_tidur"]);
			if (!is_numeric($kamar_tidur)) {
				$error_kamar_tidur="kamar tidur hanya Boleh angka";
			}
		}

		//Luas
		if (empty($_POST["luas"])) {
			$error_luas="Luas Rumah tidak boleh kosong";
		}else{
			$luas = cek_input($_POST["luas"]);
			if (!is_numeric($luas)) {
				$error_luas="Luas Rumah hanya Boleh angka";
			}
		}

		//sertifikat
		if(empty($_POST["sertifikat"])){
			$error_sertifikat="Silahkan pilih salah satu";
		}else{
			$sertifikat= cek_input($_POST["sertifikat"]);
		}

		//Kata Kunci
		if (empty($_POST["kata_kunci"])) {
			$error_kata_kunci="kata kunci tidak boleh kosong";
		}else{
			$kata_kunci = cek_input($_POST["kata_kunci"]);
			if (!preg_match("/^[a-zA-Z ]*$/",$kata_kunci)) {
				$error_kata_kunci="Inputan hanya boleh huruf dan spasi";
			}
		}

		//Foto Rumah		
        $target_dir = "storage/";
		$imageFileType = pathinfo(basename($_FILES['foto_rumah']['name']), PATHINFO_EXTENSION);
		if ($imageFileType !== 'gif' || $imageFileType !== 'png' || $imageFileType !== 'jpg'){
		    $error_foto_rumah = 'Hanya gif/png/jpg';
		   }
		$filename = $kata_kunci.".".$imageFileType;
		$target_file = $target_dir.$filename;
		move_uploaded_file($_FILES["foto_rumah"]["tmp_name"], $target_file);
		
			if (isset($tawaran) && isset($alamat) && isset($provinsi) && isset($harga) && isset($kamar_tidur) && isset($luas) && isset($sertifikat) && isset($kata_kunci)  && isset($imageFileType)) {
			$sql = ("INSERT INTO tb_rumah (tawaran,alamat,provinsi,harga,kamar_tidur,luas,sertifikat,kata_kunci,foto_rumah,nama_user,notelp_user,email_user) VALUES ('$tawaran', '$alamat', '$provinsi', '$harga', '$kamar_tidur', '$luas', '$sertifikat', '$kata_kunci', '$filename','$username','$notelp','$email')");
			if(mysqli_query($koneksi,$sql)){
				header("location:list.php");
			}
		}
		
	}

	function cek_input($data){
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}

?>