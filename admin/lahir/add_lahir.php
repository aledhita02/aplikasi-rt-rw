<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Bayi" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">TTL</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id=tempat_lh" name="tempat_lh" required>
				</div>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tgl_lh" name="tgl_lh" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-3">
					<select name="jekel" id="jekel" class="form-control">
						<option>- Pilih -</option>
						<option>Laki-Laki</option>
						<option>Perempuan</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Ibu Kandung</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="ibu" name="ibu" placeholder="Nama Ibu Kandung" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Anak Ke-</label>
				<div class="col-sm-2">
					<select name="anak" id="anak" class="form-control">
						<option>- Pilih -</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
						<option>10</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-6">
					<select name="alamat" id="alamat" class="form-control select2bs4" required>
						<option selected="selected">- Pilih Alamat -</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_kk";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<option value="<?php echo $row['alamat'] ?>">
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
				<label class="col-sm-2 col-form-label">Keluarga</label>
				<div class="col-sm-6">
					<select name="id_kk" id="id_kk" class="form-control select2bs4" required>
						<option selected="selected">- Pilih KK -</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_kk";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<option value="<?php echo $row['id_kk'] ?>">
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
			<div class="card-footer">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-success">
				<a href="?page=data-lahir" title="Kembali" class="btn btn-danger">Batal</a>
			</div>
	</form>
</div>

<?php

if (isset($_POST['Simpan'])) {
	//mulai proses simpan data
	$sql_simpan = "INSERT INTO tb_lahir (nama, tempat_lh, tgl_lh, jekel, ibu, anak, alamat, id_kk) VALUES (
            '" . $_POST['nama'] . "',
			'" . $_POST['tempat_lh'] . "',
			'" . $_POST['tgl_lh'] . "',
            '" . $_POST['jekel'] . "',
			'" . $_POST['ibu'] . "',
			'" . $_POST['anak'] . "',
			'" . $_POST['alamat'] . "',
            '" . $_POST['id_kk'] . "')";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-lahir';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-lahir';
          }
      })</script>";
	}
}
     //selesai proses simpan data
