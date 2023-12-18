<?php
include "inc/koneksi.php";

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- icons -->
	<link href="assets/bizpage/img/rt.png" rel="icon">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page bg-white">
	<div class="login-box">
		<div class="login-logo">
		</div>
		<!-- /.login-logo -->
		<img style="height:160px;" src="assets/web/images/rt.png" class="d-block mx-auto">
		<h3 class="text-center fw-bold text-primary">Permadi Graha Chemco</h3>

		<div class="card">
			<div class="card-header text-center bg-primary"><strong>LOGIN</strong></div>
			<form action="" method="post">
				<div class="card-body login-card-body">
					<label for="username" class="form-label">Username</label>
					<div class="input-group-append">
						<span class="input-group-text bg-primary" id="basic-addon3">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-person-fill" viewBox="0 0 16 16">
								<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
							</svg>
						</span>
						<input type="text" class="form-control" id="username" name="username" required placeholder=" Username" aria-describedby="basic-addon3">
					</div>
					<label for="password" class="form-label" onclick="togglePasswordVisibility();">Password</label>
					<div class="input-group-append">
						<span class="input-group-text bg-primary" id="basic-addon3">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-lock-fill" viewBox="0 0 16 16">
								<path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
							</svg>
						</span>

						<input type="password" class="form-control" id="password" name="password" required placeholder=" Password" aria-describedby="basic-addon3">
						<div class="input-group-append">
							<button type="button" class="btn btn-default" onclick="togglePasswordVisibility()">
								<span id="passwordToggle" class="fas fa-eye"></span>
							</button>
						</div>
					</div>
					<br>
					<br>
					<div class="row">
						<div class="col-12">
							<button type="submit" class="btn btn-primary btn-block btn-flat" name="btnLogin" title="Masuk Sistem">
								<b>Login</b>
							</button>
						</div>
			</form>

		</div>
	</div>
	</div>

	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- Alert -->
	<script src="plugins/alert.js"></script>
	<script>
		function togglePasswordVisibility() {
			var passwordInput = document.getElementsByName('password')[0];
			var passwordToggle = document.getElementById('passwordToggle');

			if (passwordInput.type === 'password') {
				passwordInput.type = 'text';
				passwordToggle.classList.remove('fa-eye');
				passwordToggle.classList.add('fa-eye-slash');
			} else {
				passwordInput.type = 'password';
				passwordToggle.classList.remove('fa-eye-slash');
				passwordToggle.classList.add('fa-eye');
			}
		}
	</script>

</body>

</html>

<?php


if (isset($_POST['btnLogin'])) {
	//anti inject sql
	$username = mysqli_real_escape_string($koneksi, $_POST['username']);
	$password = mysqli_real_escape_string($koneksi, $_POST['password']);

	//query login
	$sql_login = "SELECT * FROM tb_pengguna WHERE BINARY username='$username' AND password='$password'";
	$query_login = mysqli_query($koneksi, $sql_login);
	$data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
	$jumlah_login = mysqli_num_rows($query_login);


	if ($jumlah_login == 1) {
		session_start();
		$_SESSION["ses_id"] = $data_login["id_pengguna"];
		$_SESSION["ses_nama"] = $data_login["nama_pengguna"];
		$_SESSION["ses_username"] = $data_login["username"];
		$_SESSION["ses_password"] = $data_login["password"];
		$_SESSION["ses_level"] = $data_login["level"];

		echo "<script>
            Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'index.php';}
            })</script>";
	} else {
		echo "<script>
            Swal.fire({title: 'Login Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'login.php';}
            })</script>";
	}
}
