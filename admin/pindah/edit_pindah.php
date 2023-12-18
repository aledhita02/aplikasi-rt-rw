<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT p.nama, d.id_pindah, d.id_kk, d.tgl_pindah, d.alasan ,d.alamat_sekarang, d.alamat_pindah FROM tb_pindah d join tb_pdd p on d.id_pdd=p.id_pend WHERE id_pindah='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Edit Data
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Sistem</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="id_pindah" name="id_pindah" value="<?php echo $data_cek['id_pindah']; ?>" readonly />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No. KK</label>
				<div class="col-sm-6">
					<select name="id_kk" id="id_kk" class="form-control select2bs4" required>
						<option selected="">- Pilih -</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_kk";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<option value="<?php echo $row['id_kk'] ?>" <?= $data_cek['id_kk'] == $row['id_kk'] ? "selected" : null ?>>
								<?php echo $row['no_kk'] ?>
								-
								<?php echo $row['kepala'] ?>
							</option>
						<?php
						}
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Penduduk</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>" readonly required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Perpindahan</label>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tgl_pindah" name="tgl_pindah" value="<?php echo $data_cek['tgl_pindah']; ?>" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alasan Perpindahan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alasan" name="alasan" value="<?php echo $data_cek['alasan']; ?>" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat Sekarang</label>
				<div class="col-sm-6">
					<select name="alamat_sekarang" id="alamat_sekarang" class="form-control select2bs4" required>
						<option selected="">- Pilih Alamat -</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_kk";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<option value="<?php echo $row['alamat'] ?>" <?= $data_cek['id_kk'] == $row['id_kk'] ? "selected" : null ?>>
								<?php echo $row['alamat'] ?>
								-
								<?php echo $row['kepala'] ?>
							</option>
						<?php
						}
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat Perpindahan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_pindah" name="alamat_pindah" value="<?php echo $data_cek['alamat_pindah']; ?>" required>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-pindah" title="Kembali" class="btn btn-danger">Batal</a>
		</div>
	</form>
</div>

<?php

if (isset($_POST['Ubah'])) {
	$sql_ubah = "UPDATE tb_pindah SET 
		id_kk='" . $_POST['id_kk'] . "',
		tgl_pindah='" . $_POST['tgl_pindah'] . "',
		alasan='" . $_POST['alasan'] . "',
		alamat_sekarang='" . $_POST['alamat_sekarang'] . "',
		alamat_pindah='" . $_POST['alamat_pindah'] . "'
		WHERE id_pindah='" . $_POST['id_pindah'] . "'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
	mysqli_close($koneksi);

	if ($query_ubah) {
		echo "<script>
      Swal.fire({title: 'Edit Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pindah';
        }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Edit Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pindah';
        }
      })</script>";
	}
}
