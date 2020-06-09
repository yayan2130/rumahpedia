<?php 
session_start(); 
ob_start();
?>
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
include 'koneksi.php';
if($_SESSION['status']!="masuk"){
    header("location:masuk.php?pesan=belum_masuk");
    exit();
}
$u = $_SESSION['username'];
$n = $_SESSION['nama'];
$t = $_SESSION['notelp'];
$e = $_SESSION['email'];
$query = mysqli_query($koneksi,"SELECT * FROM tb_rumah where nama_user='$u'");
$result = mysqli_num_rows($query);
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
font-size: 16px;"><?php date_default_timezone_set('Asia/Jakarta'); echo date("d F Y")."&nbsp; &nbsp; &nbsp;"; ?><a href="logout.php" class="btn btn-danger square-btn-adjust">Keluar</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="gambar/profile.png" class="user-image img-responsive"/>
					</li>
                    <li>
                        <a class="active-menu"  href="admin.php"><i class="fa fa-dashboard fa-3x"></i> Tentang Saya</a>
                    </li>
                    <li>
                        <a  href="list.php"><i class="fa fa-desktop fa-3x"></i> Daftar Iklan Rumah</a>
                    </li>	
				</ul>
            </div>
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Tentang Saya</h2>   
                        <h5></h5>
                        <br>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="panel">
                        <div class="panel-heading">
                            Informasi Akun
                        </div>
                        <div class="panel-body">
                            Nama Akun : <?php echo $u; ?><br>
                            Nama : <?php echo $n; ?><br>
                            No. Telepon : <?php echo $t; ?><br>
                            Email : <?php echo $e; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">           
                <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-yellow set-icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo $result; ?></p>
                    <p class="text-muted">Iklan Rumah</p>
                </div>
             </div>
             </div>
            </div>
        </div>
</body>
</html>
