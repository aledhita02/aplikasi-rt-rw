<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No. KK</label>
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

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Penduduk</label>
				<div class="col-sm-6">
					<select name="id_pdd" id="id_pdd" class="form-control select2bs4" required>
						<option selected="selected">-- Pilih Penduduk --</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_pdd where status='Ada'";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<option value="<?php echo $row['id_pend'] ?>">
								<?php echo $row['nik'] ?>
								-
								<?php echo $row['nama'] ?>
							</option>
						<?php
						}
						?>
					</select>
				</div>
			</div>


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Perpindahan</label>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tgl_pindah" name="tgl_pindah" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alasan Perpindahan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alasan" name="alasan" placeholder="Alasan" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat Sekarang</label>
				<div class="col-sm-6">
					<select name="alamat_sekarang" id="alamat_sekarang" class="form-control select2bs4" required>
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
				<label class="col-sm-2 col-form-label">Alamat Perpindahan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_pindah" name="alamat_pindah" required>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-success">
			<a href="?page=data-pindah" title="Kembali" class="btn btn-danger">Batal</a>
		</div>
	</form>
</div>

<?php

if (isset($_POST['Simpan'])) {
	//mulai proses simpan data
	$sql_simpan = "INSERT INTO tb_pindah (id_kk, id_pdd, tgl_pindah, alasan, alamat_sekarang, alamat_pindah) VALUES (
			'" . $_POST['id_kk'] . "',
			'" . $_POST['id_pdd'] . "',
            '" . $_POST['tgl_pindah'] . "',
            '" . $_POST['alasan'] . "',
			'" . $_POST['alamat_sekarang'] . "',
			'" . $_POST['alamat_pindah'] . "')";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);

	$sql_ubah = "UPDATE tb_pdd SET 
			status='Pindah'
			WHERE id_pend='" . $_POST['id_pdd'] . "'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
	mysqli_close($koneksi);

	if ($query_simpan && $query_ubah) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-pindah';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-pindah';
          }
      })</script>";
	}
}
     //selesai proses simpan data
