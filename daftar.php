<!DOCTYPE html>
<html lang="en">
<head>
	<title>Daftar</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
	<link rel="stylesheet" type="text/css" href="css/css5.css">
<!--===============================================================================================-->
</head>
<body class="bgr">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('gambar/background3.jpg');"></div>
				<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">

					<form class="login100-form validate-form" method="POST" action="daftaract.php">
						<span class="login100-form-title p-b-59">
							Daftar
						</span>

						<div class="wrap-input100 validate-input" data-validate="Nama Pengguna wajib diisi">
							<span class="label-input100">Nama Pengguna</span>
							<input class="input100" type="text" id="username" name="username" placeholder="contoh: budi">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Kata Sandi wajib diisi">
							<span class="label-input100">Kata Sandi</span>
							<input class="input100" type="password" id="pass" name="pass" placeholder="********">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate="Anda wajib mengisi Nama">
							<span class="label-input100">Nama *sesuai kartu identitas</span>
							<input class="input100" type="text" id="nama" name="nama" placeholder="contoh: Budi Prasetyo">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate="Anda wajib mengisi Nomor Telepon">
							<span class="label-input100">Nomor Telepon</span>
							<input class="input100" type="text" id="notelp" name="notelp" placeholder="contoh: 081234567890">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Anda wajib mengisi Email">
							<span class="label-input100">Email</span>
							<input class="input100" type="text" id="email" name="email" placeholder="contoh: budi@xyz.com">
							<span class="focus-input100"></span>
						</div>
						
						<div class="flex-m w-full p-b-33"></div>
						<div class="container-login100-form-btn">
							<div class="wrap-login100-form-btn">
								<div class="login100-form-bgbtn"></div>
								<button type="submit" class="login100-form-btn" name="register">
									Daftar
								</button>
							</div>

							<a href="index.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
								Kembali
								<i class="fa fa-long-arrow-right m-l-5"></i>
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>

</body>
</html>