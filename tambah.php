<?php
session_start();
if($_SESSION['status']!="masuk"){
    header("location:masuk.php?pesan=tambah");}
include "submit.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Daftar Rumah Dijual</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="css/css3.css"/>
  </head>

  <body>
  <div class="rpheader">
    <div class="container">
    <div class="header-container header">
      <a class="navbar-brand logo" href="#"><img class="logo" src="gambar/logo.png"></a>
      <div class="header-right">
        <a class="bar-item" href="admin.php">Kembali ke dashboard</a>
      </div>
    </div>
  </div>

  <div class="judul row">
    <div class="judul-tengah">
      <h1 class="header-judul bold"> Pasang Iklan Rumah </h1>
    </div>
  </div>

    <form method="POST" enctype="multipart/form-data" >
      <section class="base">
        <div>
          <label class="col-25">Tawaran</label>
          <input type="radio" name="tawaran" value="Dijual" <?php if (isset($jk) && $jk=="Dijual")?> /> <label> Dijual </label>
          <input type="radio" name="tawaran" value="Disewa" <?php if (isset($jk) && $jk=="Disewa")?> style="margin-left: 2cm;" /> <label> Disewa</label>
          <span class="warning"><?php echo $error_tawaran; ?></span>
        </div>

        <div>
          <label class="col-25">Alamat</label>
          <input class="combox <?php echo ($error_alamat !="" ? "is-invalid":"");?>" type="text" name="alamat" id="alamat" value="<?php echo $alamat;?>" placeholder="Alamat" autofocus="" />
          <span class="warning"><?php echo $error_alamat; ?></span>
        </div>


        <div>
          <label class="col-25">Provinsi</label>
          <select class="combox <?php echo ($error_provinsi !="" ? "is-invalid":"");?>" name="provinsi" id="provinsi">
            <option value="Aceh">Aceh</option>
            <option value="Sumatera Utara">Sumatera Utara</option>
            <option value="Sumatera Barat">Sumatera Barat</option>
            <option value="Riau">Riau</option>
            <option value="Kepulauan Riau">Kepulauan Riau</option>
            <option value="Jambi">Jambi</option>
            <option value="Sumatera Selatan">Sumatera Selatan</option>
            <option value="Bangka Belitung">Bangka Belitung</option>
            <option value="Bengkulu">Bengkulu</option>
            <option value="Lampung">Lampung</option>
            <option value="DKI Jakarta">DKI Jakarta</option>
            <option value="Jawa Barat">Jawa Barat</option>
            <option value="Banten">Banten</option>
            <option value="Jawa Tengah">Jawa Tengah</option>
            <option value="DI Yogyakarta">DI Yogyakarta</option>
            <option value="Jawa Timur">Jawa Timur</option>
            <option value="Bali">Bali</option>
            <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
            <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
            <option value="Kalimantan Barat">Kalimantan Barat</option>
            <option value="Kalimantan Tengah">Kalimantan Tengah</option>
            <option value="Kalimantan Timur">Kalimantan Timur</option>
            <option value="Kalimantan Selatan">Kalimantan Selatan</option>
            <option value="Kalimantan Utara">Kalimantan Utara</option>
            <option value="Sulawesi Utara">Sulawesi Utara</option>
            <option value="Sulawesi Barat">Sulawesi Barat</option>
            <option value="Sulawesi Tengah">Sulawesi Tengah</option>
            <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
            <option value="Sulawesi Selatan">Sulawesi Selatan</option>
            <option value="Gorontalo">Gorontalo</option>
            <option value="Maluku">Maluku</option>
            <option value="Maluku Utara">Maluku Utara</option>
            <option value="Papua">Papua</option>
            <option value="Papua Barat">Papua Barat</option>
          </select>
           <span class="warning"><?php echo $error_provinsi; ?></span>
        </div>

        <div>
          <label class="col-25">Harga</label>
          <input class="combox <?php echo ($error_harga !="" ? "is-invalid":"");?>" type="number" name="harga" id="harga" value="<?php echo $harga;?>" placeholder="10000000" autofocus=""  />
          <span class="warning"><?php echo $error_harga; ?></span>
        </div>

        <div>
          <label class="col-25">Kamar tidur</label>
          <input class="combox <?php echo ($error_kamar_tidur !="" ? "is-invalid":"");?>" type="number" name="kamar_tidur" id="kamar_tidur" value="<?php echo $kamar_tidur;?>" placeholder="2" autofocus="" />
          <span class="warning"><?php echo $error_kamar_tidur; ?></span>
        </div>


        <div>
          <label class="col-25">Luas</label>
          <input class="combox <?php echo ($error_luas !="" ? "is-invalid":"");?>" type="number" name="luas" id="luas" value="<?php echo $luas;?>" placeholder="50m2" autofocus="" />
          <span class="warning"><?php echo $error_luas; ?></span>
        </div>

        <div>
          <label class="col-25">Sertifikat</label>
          <select class="combox <?php echo ($error_sertifikat !="" ? "is-invalid":"");?>" name="sertifikat" id="sertifikat" autofocus="" >
            <option value="SHM">Sertifikat Hak Milik</option>
            <option value="SHGB">Sertifikat Hak Guna Bangun</option>
            <option value="Girik/Petok">Girik/Petok</option>
            <option value="SHSRS">Sertifikat Hak Satuan Rumah Susun</option>
          </select>
          <span class="warning"><?php echo $error_sertifikat; ?></span>
        </div>

        <div>
          <label class="col-25">Kata Kunci</label>
         <input class="combox <?php echo ($error_kata_kunci !="" ? "is-invalid":"");?>" type="text" id="kata_kunci" placeholder="Rumah bagus di sekitar...." name="kata_kunci" value="<?php echo $kata_kunci;?>" autofocus="" />
         <span class="warning"><?php echo $error_kata_kunci; ?></span>
        </div>

        <div>
          <label class="fotorumah <?php echo ($error_foto_rumah !="" ? "is-invalid":"");?>">Foto Rumah</label>
         <input  type="file" name="foto_rumah" id="foto_rumah" value="<?php echo $foto_rumah;?>"/>
         <span class="warning"><?php echo $error_foto_rumah; ?></span>
        </div>

        <div class="kanan">
         <button class="btn-masuk" type="submit"> Kirim </button>
        </div>
        </section>
    </form>
      
</div>
</body>
</html>