<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kepala Keluarga</label>
				<div class="col-sm-6">
					<select name="nama" id="nama" class="form-control select2bs4" required>
						<option selected="selected">- Pilih Kepala Keluarga -</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_kk";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<option value="<?php echo $row['kepala'] ?>">
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



			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Bulan</label>
				<div class="col-sm-6">
					<select name="bulan" id="bulan" class="form-control">
						<option>- Pilih -</option>
						<option>Januari</option>
						<option>Februari</option>
						<option>Maret</option>
						<option>April</option>
						<option>Mei</option>
						<option>Juni</option>
						<option>Juli</option>
						<option>Agustus</option>
						<option>September</option>
						<option>Oktober</option>
						<option>November</option>
						<option>Desember</option>
					</select>
				</div>

			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Pembayaran</label>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tgl" name="tgl" required>
				</div>
			</div>


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Biaya Keamanan</label>
				<div class="col-sm-6">
					<input type="number" class="form-control" id="iuran_aman" name="iuran_aman" placeholder="Biaya Keamanan" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Biaya Kebersihan</label>
				<div class="col-sm-6">
					<input type="number" class="form-control" id="iuran_sampah" name="iuran_sampah" placeholder="Biaya Kebersihan" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Biaya Kegiatan Sosial</label>
				<div class="col-sm-6">
					<input type="number" class="form-control" id="iuran_sosial" name="iuran_sosial" placeholder="Biaya Kegiatan Sosial" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Biaya Kas</label>
				<div class="col-sm-6">
					<input type="number" class="form-control" id="iuran_kas" name="iuran_kas" placeholder="Biaya Kas" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label" for="foto">Bukti Pembayaran</label>
				<div class="col-sm-6">
					<input type="file" class="form-control-file" id="foto" name="foto" placeholder="Bukti Pembayaran" onchange="previewImage(event)">

					<img id="preview" class="img-thumbnail img-preview mt-2" alt="" width="100px" style="display: none;">

				</div>
			</div>
			
		</div>

</div>
<div class="card-footer">
	<input type="submit" name="Simpan" value="Simpan" class="btn btn-success">
	<a href="?page=data-iuran" title="Kembali" class="btn btn-danger">Batal</a>
</div>
</form>
</div>

<!-- preview image -->
<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('preview');
            output.src = reader.result;
            output.style.display = "block"; // Menampilkan preview gambar setelah dipilih
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<?php

if (isset($_POST['Simpan'])) {
	// Retrieve form values
	$iuran_aman = $_POST['iuran_aman'];
	$iuran_sampah = $_POST['iuran_sampah'];
	$iuran_sosial = $_POST['iuran_sosial'];
	$iuran_kas = $_POST['iuran_kas'];

	// Determine the value of the "ket" field
	$ket = ($iuran_aman >= 20000 && $iuran_sampah >= 15000 && $iuran_kas >= 20000 && $iuran_sosial >= 20000) ? "Lunas" : "Belum";

	// Check if any input value exceeds the specified limit
	$excessAmounts = array();
	if ($iuran_aman > 20000) {
		$excessAmounts[] = "Iuran keamanan lebih Rp " . ($iuran_aman - 20000);
	}
	if ($iuran_sampah > 15000) {
		$excessAmounts[] = "Iuran kebersihan lebih Rp " . ($iuran_sampah - 15000);
	}
	if ($iuran_kas > 20000) {
		$excessAmounts[] = "Iuran kegiatan sosial lebih Rp " . ($iuran_sosial - 20000);
	}
	if ($iuran_sosial > 20000) {
		$excessAmounts[] = "Iuran kas lebih Rp " . ($iuran_kas - 20000);
	}

	if (!empty($excessAmounts)) {
		$excessMessage = "Jumlah iuran melebihi batas yang ditentukan:<br>" . implode("<br>", $excessAmounts);
		echo "<script>
            Swal.fire({
                title: 'Input Setoran Berlebihan!',
                html: '$excessMessage',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=add-iuran';
                }
            });
        </script>";
		exit;
	}

	// Check if any input value is less than the specified limit
	$insufficientAmounts = array();
	if ($iuran_aman < 20000) {
		$insufficientAmounts[] = "Iuran keamanan kurang Rp " . (20000 - $iuran_aman);
	}
	if ($iuran_sampah < 15000) {
		$insufficientAmounts[] = "Iuran kebersihan kurang Rp " . (15000 - $iuran_sampah);
	}
	if ($iuran_kas < 20000) {
		$insufficientAmounts[] = "Iuran kegiatan sosial kurang Rp " . (20000 - $iuran_sosial);
	}
	if ($iuran_sosial < 20000) {
		$insufficientAmounts[] = "Iuran kas kurang Rp " . (20000 - $iuran_kas);
	}

	$namaFile = $_FILES['foto']['name'];
	// check upload file
	if (!$namaFile) {
		return false;
	}

	$sql_simpan = "INSERT INTO tb_iuran (id_kk, nama, iuran_aman, iuran_sampah, iuran_sosial, iuran_kas, bulan, tgl, ket, foto) VALUES (
            '" . $_POST['id_kk'] . "',
            '" . $_POST['nama'] . "',
            '" . $iuran_aman . "',
            '" . $iuran_sampah . "',
            '" . $iuran_sosial . "',
            '" . $iuran_kas . "',
            '" . $_POST['bulan'] . "',
            '" . $_POST['tgl'] . "',
            '" . $ket . "',
			'" . upload_file() . "'
        )";

	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {
		if (!empty($insufficientAmounts)) {
			$insufficientMessage = "Jumlah iuran kurang dari batas yang ditentukan:<br>" . implode("<br>", $insufficientAmounts);
			echo "<script>
				Swal.fire({
					title: 'Input Setoran Kurang!',
					html: '$insufficientMessage',
					icon: 'warning',
					confirmButtonText: 'OK'
				}).then((result) => {
					if (result.value) {
						window.location = 'index.php?page=data-iuran';
					}
				});
			</script>";
		} else {
			echo "<script>
				Swal.fire({
					title: 'Tambah Data Berhasil',
					text: '',
					icon: 'success',
					confirmButtonText: 'OK'
				}).then((result) => {
					if (result.value) {
						window.location = 'index.php?page=data-iuran';
					}
				});
			</script>";
		}
	} else {
		echo "<script>
			Swal.fire({
				title: 'Tambah Data Gagal',
				text: '',
				icon: 'error',
				confirmButtonText: 'OK'
			}).then((result) => {
				if (result.value) {
					window.location = 'index.php?page=add-iuran';
				}
			});
		</script>";
	}
}

//Upload file
function upload_file()
{
	$namaFile = $_FILES['foto']['name'];
	$ukuranFile = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error'];
	$tmpName = $_FILES['foto']['tmp_name'];

	// check file yang di upload
	$extensifileValid = ['jpg', 'jpeg', 'png'];
	$extensifile = explode('.', $namaFile);
	$extensifile = strtolower(end($extensifile));

	// check format ekstensi file
	if (!in_array($extensifile, $extensifileValid)) {
		echo "<script>
		Swal.fire({
			title: 'Format File Tidak Valid',
			text: '',
			icon: 'error',
			confirmButtonText: 'OK'
		}).then((result) => {
			if (result.value) {
				window.location = 'index.php?page=add-iuran';
			}
		});
	</script>";
		die();
	}

	// check ukuran file
	if ($ukuranFile > 2048000) {
		echo "<script>
		Swal.fire({
			title: 'Ukuran File Maksimal 2 MB',
			text: '',
			icon: 'info',
			confirmButtonText: 'OK'
		}).then((result) => {
			if (result.value) {
				window.location = 'index.php?page=add-iuran';
			}
		});
	</script>";
	}

	// generate nama file baru
	$namaFileBaru = uniqid() . '.' . $extensifile;


	// pindah ke folder local
	move_uploaded_file($tmpName, 'assets/bizpage/img/bukti/' . $namaFileBaru);
	return $namaFileBaru;
}
?>