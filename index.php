<?php
session_start();
$_SESSION['status']="";
?>
<!DOCTYPE html>
<html>
<head>
	<title>rumahpedia</title>
	<meta charset="UTF-8">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="css/css1.css"/>
    <link rel="stylesheet" href="css/css2.css"/>
</head>

<body>
<div class="rpheader">
	<div class="container">
		<div class="header-container header">
			<a class="navbar-brand logo" href="#"><img class="logo" src="gambar/logo.png"></a>
 			<div class="header-right">
				<a class="bar-item" href="index.php">Beranda</a>
				<a class="bar-item" href="rumahjual.php">Rumah Dijual</a>
				<a class="bar-item" href="rumahsewa.php">Rumah Sewa</a>
			</div>
		</div>
	</div>

	<div class="judul row">
		<div class="judul-tengah">
			<h1 class="header-judul bold"> Rumah Favorit </h1>
			<h4 class="header-subjudul white"> Temukan disini. </h4>
            <form method="get" action="index.php">
			<input class="combox" type="text" name="keyword" placeholder="contoh: Surabaya">
			<a href="cari.php">
				<button type="submit" class="btn-cari"> Cari </button>
			</a>
            </form>
			<br>
			<br>
			<h4 class="header-subjudul light white"> Pasang iklan gratis rumah kamu <br>
			<a href="masuk.php">
				<button class="btn-masuk"> Masuk </button>
			</a>
			<br>atau, buat akun sekarang. Daftar <a class="header-subjudul kuning" href="daftar.php">DISINI</a>
			</h4>
		</div>
	</div>
</div>

<div id="features" class="features-section">
    <div class="features-container row">
        <h2 class="features-headline light">FITUR</h2>
        
        <div class="col-sm-6 feature">
            <div class="feature-icon">
                <img class="feature-img" src="gambar/ikon1.png">
            </div>
            <h5 class="feature-head-text"> PASANG IKLAN </h5>
            <p class="feature-subtext light"> Pasang tawaran rumah yang akan kamu jual/sewa disini tanpa biaya. Pastikan foto rumah yang akan kamu pasang adalah asli. </p>
        </div>
        
        <div class="col-sm-6 feature">
            <div class="feature-icon">
                <img class="feature-img" src="gambar/ikon2.png">
            </div>
            <h5 class="feature-head-text"> CARI RUMAH </h5>
            <p class="feature-subtext light"> Temukan rumah favorit kamu disini. Hubungi penjual dari kontak yang tertera dan buat kesepakatan dengan detail. </p>
        </div>

    </div>
</div>

<div class="pisah" >
<?php
include 'koneksi.php';
    if(isset($_GET['keyword'])){
        $keyword=$_GET['keyword'];
        $query = "SELECT * FROM tb_rumah where kata_kunci like '%".$keyword."%' order by id desc";
    }else{
      $query = "SELECT * FROM tb_rumah order by id desc limit 6";
    }  $result = mysqli_query($koneksi, $query);
      
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }
      $no = 1;
      while($row = mysqli_fetch_assoc($result)){
?>
    <div class="grid-container">
        <div class="team-container col-sm-4">
            <div class="panel ">
                <div class="panel-heading">
                    <h4><?php echo "<b>".$row['kata_kunci']."</b>"; ?></h4>
                </div>
                <div class="panel-body">
                    <img src="storage/<?php echo $row['foto_rumah']; ?>" style="height: 130px;">
                </div>
                <div class="panel-footer">
                    <?php
                    echo "<b>".$row['harga']."</b><br>";
                    echo $row['alamat']." - ".$row['provinsi']."<br>";
                    echo "Luas : ".$row['luas']." "."Kamar Tidur : ".$row['kamar_tidur']."<br>".$row['sertifikat']."<br>";
                    echo "Hub : ".$row['notelp_user']."<br>".$row['email_user'];
                    ?>    
                </div>
            </div>
        </div>
        <?php $no++;  } ?>
    </div>
</div>

<p style="font-size: 14cm"><br></p>

<div class="pisah">
<div class="footer">
    <div class="container">
        <div class="row" align="center">
            <span class="webscope-text"> @rumahpedia.com </span>
        </div>
    </div>
</div>
</div>
</body>
</html>