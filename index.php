<?php
//Mulai Sesion
session_start();
if (isset($_SESSION["ses_username"]) == "") {
	header("location: home.php");
} else {
	$data_id = $_SESSION["ses_id"];
	$data_nama = $_SESSION["ses_nama"];
	$data_user = $_SESSION["ses_username"];
	$data_level = $_SESSION["ses_level"];
}

//KONEKSI DB
include "inc/koneksi.php";
?>

<!-- fungsi untuk menambahkan title sesuai menu ketika di click -->
<?php
$judul = "Dashboard";
if (isset($_GET['page'])) {
	switch ($_GET['page']) {
		case 'data-pengguna':
			$judul = "Setting User";
			break;
		case 'add-pengguna':
			$judul = "Add User";
			break;
		case 'edit-pengguna':
			$judul = "Edit User";
			break;

			//kartu KK
		case 'data-kartu':
			$judul = "Data Kartu Keluarga";
			break;
		case 'add-kartu':
			$judul = "Tambah Kartu Keluarga";
			break;
		case 'edit-kartu':
			$judul = "Edit Kartu Keluarga";
			break;
		case 'anggota':
			$judul = "Tambah Anggota Keluarga";
			break;

			//siskam
		case 'data-siskam':
			$judul = "Jadwal Siskamling";
			break;
		case 'add-siskam':
			$judul = "Tambah Data Siskamling";
			break;
		case 'edit-siskam':
			$judul = "Edit Data Siskamling";
			break;

			//pengumuman
		case 'data_pengu':
			$judul = "Pengumuman";
			break;
		case 'add_pengu':
			$judul = "Tambah Pengumuman";
			break;
		case 'edit_pengu':
			$judul = "Edit Pengumuman";
			break;

			//penduduk
		case 'data-pend':
			$judul = "Data Penduduk";
			break;
		case 'add-pend':
			$judul = "Tambah Data Penduduk";
			break;
		case 'edit-pend':
			$judul = "Edit Data Penduduk";
			break;
		case 'view-pend':
			$judul = "Detail Data Penduduk";
			break;

			//lahir
		case 'data-lahir':
			$judul = "Data Kelahiran";
			break;
		case 'add-lahir':
			$judul = "Tambah Data Kelahiran";
			break;
		case 'edit-lahir':
			$judul = "Edit Data Kelahiran";
			break;
		case 'view-lahir':
			$judul = "Detail Data Kelahiran";
			break;

			//mendu
		case 'data-mendu':
			$judul = "Data Kematian";
			break;
		case 'add-mendu':
			$judul = "Tambah Data Kematian";
			break;
		case 'edit-mendu':
			$judul = "Tambah Data Kematian";
			break;
		case 'view-mendu':
			$judul = "Detail Data Kematian";
			break;

			//pindah
		case 'data-pindah':
			$judul = "Data Perpindahan Penduduk";
			break;
		case 'add-pindah':
			$judul = "Tambah Data Perpindahan Penduduk";
			break;
		case 'edit-pindah':
			$judul = "Edit Data Perpindahan Penduduk";
			break;

			//datang
		case 'data-datang':
			$judul = "Data Tamu";
			break;
		case 'add-datang':
			$judul = "Tambah Data Tamu";
			break;
		case 'edit-datang':
			$judul = "Edit Data Tamu";
			break;

			//suket
		case 'suket-domisili':
			$judul = "Surat Domisili";
			break;
		case 'suket-lahir':
			$judul = "Surat Kelahiran";
			break;
		case 'suket-mati':
			$judul = "Surat Kematian";
			break;
		case 'suket-datang':
			$judul = "Surat Tamu";
			break;
		case 'suket-pindah':
			$judul = "Surat Perpindahan";
			break;
		case '':
			include "surat/suket_domisili.php";
			break;
		case 'data-edit':
			include "admin/edit/data_edit.php";
			break;

			//Iuran
		case 'data-iuran':
			$judul = "Data Iuran Bulanan";
			break;
		case 'add-iuran':
			$judul = "Tambah Data Iuran Bulanan";
			break;
		case 'edit-iuran':
			$judul = "Edit Data Iuran Bulanan";
			break;
		case 'view-iuran':
			$judul = "Detail Data Iuran Bulanan";
			break;

			//keuangan
		case 'data-keuangan':
			$judul = "Data Keuangan";
			break;
		case 'add-keuangan':
			$judul = "Tambah Data Keuangan";
			break;
		case 'edit-keuangan':
			$judul = "Edit Data Keuangan";
			break;
	}
}
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $judul; ?></title>
	<link rel="icon" href="assets/web/img/izin.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- icons -->
	<link href="assets/bizpage/img/rt.png" rel="icon">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<!-- Alert -->
	<script src="plugins/alert.js"></script>

	<style>
		/* CSS untuk dark mode */
		body.dark-mode {
			background-color: #111;
			color: #fff;
		}

		body.dark-mode button.btn-primary {
			background-color: #4e4e4e;
			color: #fff;
		}
	</style>
</head>

<body class="hold-transition sidebar-mini ">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#">
						<i class="fas fa-bars text-white"></i>
					</a>
				</li>

			</ul>

			<!-- SEARCH FORM -->
			<ul class="navbar-nav ml-auto">

				<li class="nav-item d-none d-sm-inline-block">
					<a href="index.php" class="nav-link">
						<font color="white">
							<b>APLIKASI PERMADI</b>
						</font>
					</a>
				</li>
			</ul>

		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index.php" class="brand-link">
				<img src="assets/web/images/rt.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
				<span class="brand-text"> APLIKASI PERMADI</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-2 pb-2 mb-2 d-flex">
					<?php
					if ($data_level == "Administrator") {
					?>
						<div class="image">
							<img src="assets/bizpage/img/admin.ico">
						</div>
					<?php
					} elseif ($data_level == "User") {
					?>
						<div class="image">
							<img src="assets/bizpage/img/user.png">
						</div>
					<?php
					}
					?>
					<div class="info">
						<a href="index.php" class="d-block">
							<?php echo $data_nama; ?>
						</a>
						<span class="badge badge-success">
							<?php echo $data_level; ?>
						</span>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

						<!-- Level  -->
						<?php
						if ($data_level == "Administrator") {
						?>
							<li class="nav-item">
								<a href="index.php" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>
										Dashboard
									</p>

								</a>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-table"></i>
									<p>
										Kelola Data
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>

								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=data-pend" class="nav-link">
											<i class="nav-icon far fa-circle text-yellow"></i>
											<p>Data Penduduk</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-kartu" class="nav-link">
											<i class="nav-icon far fa-circle text-yellow"></i>
											<p>Data Kartu Keluarga</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fa fa-calendar-check"></i>
									<p>
										Jadwal
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>

								<ul class="nav nav-treeview">

									<li class="nav-item">
										<a href="?page=data-siskam" class="nav-link">
											<i class="nav-icon far fa-circle text-yellow"></i>
											<p>Ronda Penduduk</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data_pengu" class="nav-link">
											<i class="nav-icon far fa-circle text-yellow"></i>
											<p>Pengumuman</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-chart-pie"></i>
									<p>
										Mobilitas Penduduk
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=data-lahir" class="nav-link">
											<i class="nav-icon far fa-circle text-yellow"></i>
											<p>Data Lahir</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-mendu" class="nav-link">
											<i class="nav-icon far fa-circle text-yellow"></i>
											<p>Data Meninggal</p>
										</a>
									</li>

									<li class="nav-item">
										<a href="?page=data-datang" class="nav-link">
											<i class="nav-icon far fa-circle text-yellow"></i>
											<p>Data Tamu 24 Jam</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-pindah" class="nav-link">
											<i class="nav-icon far fa-circle text-yellow"></i>
											<p>Data Pindah</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-file-alt"></i>
									<p>
										Administrasi Surat
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">

									<li class="nav-item">
										<a href="?page=suket-domisili" class="nav-link">
											<i class="nav-icon far fa-circle text-yellow"></i>
											<p>Su-Ket Domisili</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=suket-lahir" class="nav-link">
											<i class="nav-icon far fa-circle text-yellow"></i>
											<p>Su-Ket Kelahiran</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=suket-mati" class="nav-link">
											<i class="nav-icon far fa-circle text-yellow"></i>
											<p>Su-Ket Kematian</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=suket-datang" class="nav-link">
											<i class="nav-icon far fa-circle text-yellow"></i>
											<p>Su-Ket Tamu 24 Jam</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=suket-pindah" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Su-Ket Pindah</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-money-bill-wave"></i>
									<p>
										Keuangan
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">

									<li class="nav-item has-treeview">
										<a href="?page=data-iuran" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>
												Iuran Bulanan
											</p>
										</a>
									</li>

									<li class="nav-item has-treeview">
										<a href="?page=data-keuangan" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>
												Laporan Keuangan
											</p>
										</a>
									</li>

								</ul>
							</li>



							<li class="nav-header">Setting</li>

							<li class="nav-item">
								<a href="?page=data-pengguna" class="nav-link">
									<i class="nav-icon fas fa-user"></i>
									<p>
										User
									</p>
								</a>
							</li>

						<?php
						} elseif ($data_level == "User") {
						?>

							<li class="nav-item">
								<a href="index.php" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>
										Dashboard
									</p>

								</a>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-table"></i>
									<p>
										Kelola Data
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>

								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=data-pend" class="nav-link">
											<i class="nav-icon far fa-circle text-yellow"></i>
											<p>Data Penduduk</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-kartu" class="nav-link">
											<i class="nav-icon far fa-circle text-yellow"></i>
											<p>Data Kartu Keluarga</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fa fa-calendar-check"></i>
									<p>
										Jadwal
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>

								<ul class="nav nav-treeview">

									<li class="nav-item">
										<a href="?page=data-siskam" class="nav-link">
											<i class="nav-icon far fa-circle text-yellow"></i>
											<p>Ronda Penduduk</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-chart-pie"></i>
									<p>
										Mobilitas Penduduk
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=data-lahir" class="nav-link">
											<i class="nav-icon far fa-circle text-yellow"></i>
											<p>Data Lahir</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-mendu" class="nav-link">
											<i class="nav-icon far fa-circle text-yellow"></i>
											<p>Data Meninggal</p>
										</a>
									</li>

									<li class="nav-item">
										<a href="?page=data-datang" class="nav-link">
											<i class="nav-icon far fa-circle text-yellow"></i>
											<p>Data Tamu 24 Jam</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-pindah" class="nav-link">
											<i class="nav-icon far fa-circle text-yellow"></i>
											<p>Data Pindah</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-file-alt"></i>
									<p>
										Administrasi Surat
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">

									<li class="nav-item">
										<a href="?page=suket-domisili" class="nav-link">
											<i class="nav-icon far fa-circle text-yellow"></i>
											<p>Su-Ket Domisili</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=suket-lahir" class="nav-link">
											<i class="nav-icon far fa-circle text-yellow"></i>
											<p>Su-Ket Kelahiran</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=suket-mati" class="nav-link">
											<i class="nav-icon far fa-circle text-yellow"></i>
											<p>Su-Ket Kematian</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=suket-datang" class="nav-link">
											<i class="nav-icon far fa-circle text-yellow"></i>
											<p>Su-Ket Tamu 24 Jam</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=suket-pindah" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Su-Ket Pindah</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-money-bill-wave"></i>
									<p>
										Keuangan
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">

									<li class="nav-item has-treeview">
										<a href="?page=data-iuran" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>
												Iuran Bulanan
											</p>
										</a>
									</li>

									<li class="nav-item has-treeview">
										<a href="?page=data-keuangan" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>
												Laporan Keuangan
											</p>
										</a>
									</li>

								</ul>
							</li>



							<li class="nav-header">Setting</li>

						<?php
						}
						?>

						<li class="nav-item">
							<a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="logout.php" class="nav-link">
								<i class="nav-icon fas fa-arrow-circle-right"></i>
								<p>
									Logout
								</p>
							</a>

						</li>

				</nav>

				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			</section>

			<!-- Main content -->
			<section class="content">
				<!-- /. WEB DINAMIS DISINI ############################################################################### -->
				<div class="container-fluid">

					<?php
					if (isset($_GET['page'])) {
						$hal = $_GET['page'];

						switch ($hal) {

								//Pengguna
							case 'data-pengguna':
								include "admin/pengguna/data_pengguna.php";
								break;
							case 'add-pengguna':
								include "admin/pengguna/add_pengguna.php";
								break;
							case 'edit-pengguna':
								include "admin/pengguna/edit_pengguna.php";
								break;
							case 'del-pengguna':
								include "admin/pengguna/del_pengguna.php";
								break;

								//kartu KK
							case 'data-kartu':
								include "admin/kartu/data_kartu.php";
								break;
							case 'add-kartu':
								include "admin/kartu/add_kartu.php";
								break;
							case 'edit-kartu':
								include "admin/kartu/edit_kartu.php";
								break;
							case 'anggota':
								include "admin/kartu/anggota.php";
								break;
							case 'del-anggota':
								include "admin/kartu/del_anggota.php";
								break;
							case 'del-kartu':
								include "admin/kartu/del_kartu.php";
								break;

								//siskam
							case 'data-siskam':
								include "admin/siskam/data_siskam.php";
								break;
							case 'add-siskam':
								include "admin/siskam/add_siskam.php";
								break;
							case 'edit-siskam':
								include "admin/siskam/edit_siskam.php";
								break;
							case 'del-siskam':
								include "admin/siskam/del_siskam.php";
								break;

								//pengumuman
							case 'data_pengu':
								include "admin/pengu/data_pengu.php";
								break;
							case 'add_pengu':
								include "admin/pengu/add_pengu.php";
								break;
							case 'edit_pengu':
								include "admin/pengu/edit_pengu.php";
								break;
							case 'del_pengu':
								include "admin/pengu/del_pengu.php";
								break;

								//penduduk
							case 'data-pend':
								include "admin/pend/data_pend.php";
								break;
							case 'add-pend':
								include "admin/pend/add_pend.php";
								break;
							case 'edit-pend':
								include "admin/pend/edit_pend.php";
								break;
							case 'del-pend':
								include "admin/pend/del_pend.php";
								break;
							case 'view-pend':
								include "admin/pend/view_pend.php";
								break;

								//lahir
							case 'data-lahir':
								include "admin/lahir/data_lahir.php";
								break;
							case 'add-lahir':
								include "admin/lahir/add_lahir.php";
								break;
							case 'edit-lahir':
								include "admin/lahir/edit_lahir.php";
								break;
							case 'del-lahir':
								include "admin/lahir/del_lahir.php";
								break;
							case 'view-lahir':
								include "admin/lahir/view_lahir.php";
								break;

								//mendu
							case 'data-mendu':
								include "admin/mendu/data_mendu.php";
								break;
							case 'add-mendu':
								include "admin/mendu/add_mendu.php";
								break;
							case 'edit-mendu':
								include "admin/mendu/edit_mendu.php";
								break;
							case 'del-mendu':
								include "admin/mendu/del_mendu.php";
								break;
							case 'view-mendu':
								include "admin/mendu/view_mendu.php";
								break;

								//pindah
							case 'data-pindah':
								include "admin/pindah/data_pindah.php";
								break;
							case 'add-pindah':
								include "admin/pindah/add_pindah.php";
								break;
							case 'edit-pindah':
								include "admin/pindah/edit_pindah.php";
								break;
							case 'del-pindah':
								include "admin/pindah/del_pindah.php";
								break;

								//datang
							case 'data-datang':
								include "admin/datang/data_datang.php";
								break;
							case 'add-datang':
								include "admin/datang/add_datang.php";
								break;
							case 'edit-datang':
								include "admin/datang/edit_datang.php";
								break;
							case 'del-datang':
								include "admin/datang/del_datang.php";
								break;

								//suket
							case 'suket-domisili':
								include "surat/suket_domisili.php";
								break;
							case 'suket-lahir':
								include "surat/suket_lahir.php";
								break;
							case 'suket-mati':
								include "surat/suket_mati.php";
								break;
							case 'suket-datang':
								include "surat/suket_datang.php";
								break;
							case 'suket-pindah':
								include "surat/suket_pindah.php";
								break;

								//Iuran
							case 'data-iuran':
								include "admin/iuran/data_iuran.php";
								break;
							case 'add-iuran':
								include "admin/iuran/add_iuran.php";
								break;
							case 'edit-iuran':
								include "admin/iuran/edit_iuran.php";
								break;
							case 'del-iuran':
								include "admin/iuran/del_iuran.php";
								break;
							case 'view-iuran':
								include "admin/iuran/view_iuran.php";
								break;

								//Laporan Keuangan
							case 'data-keuangan':
								include "admin/uang/data_keuangan.php";
								break;
							case 'add-keuangan':
								include "admin/uang/add_keuangan.php";
								break;
							case 'edit-keuangan':
								include "admin/uang/edit_keuangan.php";
								break;
							case 'del-keuangan':
								include "admin/uang/del_keuangan.php";
								break;

								//default
							default:
								echo "<center><h1> Menu ERROR !</h1></center>";
								break;
						}
					} else {
						// Auto Halaman Home Pengguna
						if ($data_level == "Administrator") {
							include "home/admin.php";
						} elseif ($data_level == "User") {
							include "home/kaur.php";
						}
					}
					?>

				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
				Copyright &copy;
				<a target="_blank">
					<strong> Alpraz</strong>
				</a>
				All rights reserved.
			</div>
			<b>Version 1.0</b>
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="plugins/select2/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- page script -->
	<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

	<script>
		$(function() {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>

	<script>
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
	</script>

	<!-- //fungsi untuk mennambahkan dark-mode -->
	<script>
		// Mengubah mode ke dark mode
		function enableDarkMode() {
			document.body.classList.add('dark-mode');
		}

		// Mengubah mode ke light mode
		function disableDarkMode() {
			document.body.classList.remove('dark-mode');
		}
	</script>

</body>

</html>