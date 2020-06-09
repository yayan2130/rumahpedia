<!DOCTYPE html>
<html>
  <head>
    <title>Daftar Rumah Dijual</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/css1.css"/>
    <link rel="stylesheet" href="css/css2.css"/>
    <link rel="stylesheet" href="css/css3.css"/>
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
    <div class="judul-kiri">
      <h1 class="header-judul bold"> Daftar Rumah Dijual </h1>
      <div class="kurangkiri">
      <form method="get" action="rumahjual.php">
      <input class="combox" type="text" name="keyword" placeholder="contoh: Surabaya">
      <a href="carirumahjual.php">
        <button class="btn-cari"> Cari </button>
      </a>
      </form>
    </div>
    </div>
    <div class="judul-kanan">
    <p class="header-subjudul2">Tambah Iklan Rumah     
      <a href="tambah.php">
        <button class="btn-masuk"> + Tambah </button>
      </a>
    </div>
  </div>
</div>

<div class="pisah">
<?php
include 'koneksi.php';
      if(isset($_GET['keyword'])){
        $keyword=$_GET['keyword'];
        $query = "SELECT * FROM tb_rumah where tawaran='Dijual' and kata_kunci like '%".$keyword."%' order by id desc";
    }else{
      $query = "SELECT * FROM tb_rumah where tawaran='Dijual'";
    } $result = mysqli_query($koneksi, $query);
      
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }
      $no = 1;
      while($row = mysqli_fetch_assoc($result)){
?>
    <div class="grid-container">
       <div class="team-container col-sm-4">
        <div class="panel">
                <div class="panel-heading">
                    <h4><?php echo $row['kata_kunci']; ?></h4>
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
        <?php $no++; } ?>
    </div>
</div>
</body>
</html>