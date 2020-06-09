<?php
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="css/css4.css" rel="stylesheet" />
    
</head>
<body>
<?php
    if($_SESSION['status']!="masuk"){
        header("location:masuk.php?pesan=belum_masuk");
    }

    $u = $_SESSION['username'];
?>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"> <?php echo $u; ?></a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <?php date_default_timezone_set('Asia/Jakarta'); echo date("d F Y")."&nbsp; &nbsp; &nbsp;"; ?> <a href="logout.php" class="btn btn-danger square-btn-adjust">Keluar</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="gambar/profile.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a href="admin.php"><i class="fa fa-dashboard fa-3x"></i> Tentang Saya</a>
                    </li>
                    <li>
                        <a class="active-menu"  href="list.html"><i class="fa fa-desktop fa-3x"></i> Daftar Iklan Rumah</a>
                    </li>
					
				</ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Daftar Iklan Rumah Anda</h2>   
                        <h5></h5>
                    <div class="judul-tengah">
                    <a href="printpdf.php">
                    <button class="btn-daftar"> Cetak Daftar </button>
                    </a>     
                    <a href="tambah.php">
                    <button class="btn-masuk"> + Tambah </button>
                    </a>
                    </div>
                    
                    </div>
                </div>          
                  <br>
      <table>
      <thead>
        <tr>
          <th><center>No</center></th>
          <th><center>Tawaran</center></th>
          <th><center>Kata Kunci</center></th>
          <th><center>Alamat</center></th>
          <th><center>Provinsi</center></th>
          <th><center>Harga (Rp)</center></th>
          <th><center>Kamar Tidur</center></th>
          <th><center>Luas (m2)</center></th>
          <th><center>Sertifikat</center></th>
          <th><center>Foto Rumah</center></th>
          <th><center>Tindakan</center></th>
        </tr>
    </thead>
    <tbody>
      <?php
      include 'koneksi.php';
      $query = "SELECT * FROM tb_rumah where nama_user='$u'";
      $result = mysqli_query($koneksi, $query);
      
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      $no = 1; 
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['tawaran']; ?></td>
          <td><?php echo $row['kata_kunci']; ?></td>
          <td><?php echo $row['alamat']; ?></td>
          <td><?php echo $row['provinsi']; ?></td>
          <td><?php echo $row['harga']; ?></td>
          <td><?php echo $row['kamar_tidur']; ?></td>
          <td><?php echo $row['luas']; ?></td>
          <td><?php echo $row['sertifikat']; ?></td>
          <td style="text-align: center;"><img src="storage/<?php echo $row['foto_rumah']; ?>" style="width: 120px;"></td>
          <td>
              <a href="hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')" class="btn btn-danger">Hapus</a>
          </td>
      </tr>  
      <?php
        $no++;
      }
      ?>
    </tbody>
    </table>

            </div>
        </div>
</body>
</html>
