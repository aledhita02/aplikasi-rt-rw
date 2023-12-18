<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Penduduk</label>
				<div class="col-sm-6">
					<select name="id_pdd" id="id_pdd" class="form-control select2bs4" required>
						<option selected="selected">- Pilih Penduduk -</option>
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
				<label class="col-sm-2 col-form-label">Minggu ke -</label>
				<div class="col-sm-3">
					<select name="minggu" id="minggu" class="form-control">
						<option>- Pilih -</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Shift Jaga</label>
				<div class="col-sm-3">
					<select name="jaga" id="jaga" class="form-control">
						<option>- Pilih Shift -</option>
						<option>Shift 1 (20:00 WIB - 02:00 WIB)</option>
						<option>Shift 2 (02:00 WIB - 08:00 WIB)</option>
					</select>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-success">
			<a href="?page=data-siskam" title="Kembali" class="btn btn-danger">Batal</a>
		</div>
	</form>
</div>

<?php

if (isset($_POST['Simpan'])) {
	 // Retrieve the input values
	 $id = $_POST['id_pdd'];
 
	 // Check if the data already exists
	 $sql_cek = "SELECT * FROM tb_siskam WHERE id_pdd = '$id'";
	 $query_cek = mysqli_query($koneksi, $sql_cek);
	 $data_cek = mysqli_fetch_array($query_cek);
 
	 if ($data_cek) {
		 // Data already exists
		 echo "<script>
				 Swal.fire({
					 title: 'Tambah Data Gagal',
					 text: 'Data penduduk sudah ada',
					 icon: 'error',
					 confirmButtonText: 'OK'
				 }).then((result) => {
					 if (result.value) {
						 window.location = 'index.php?page=add-siskam';
					 }
				 });
			   </script>";
	 } else {
	//mulai proses simpan data
	$sql_simpan = "INSERT INTO tb_siskam (id_pdd, minggu, jaga) VALUES (
			'" . $_POST['id_pdd'] . "',
            '" . $_POST['minggu'] . "',
            '" . $_POST['jaga'] . "')";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);


	mysqli_close($koneksi);

	if ($query_simpan) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-siskam';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-siskam';
          }
      })</script>";
	}
}
}  //selesai proses simpan data
