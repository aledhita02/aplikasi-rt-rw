<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT d.id_datang, d.nik, d.nama_datang, d.jekel, d.tgl_datang, d.waktu, d.alamat_kunjung, d.alasan, p.id_pend, p.nama, k.id_kk from tb_datang d inner join tb_pdd p on d.pelapor=p.id_pend left join tb_kk k on d.id_kk=k.id_kk WHERE id_datang='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Edit Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Sistem</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="id_datang" name="id_datang" value="<?php echo $data_cek['id_datang']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nik" name="nik" value="<?php echo $data_cek['nik']; ?>"
					 required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_datang" name="nama_datang" value="<?php echo $data_cek['nama_datang']; ?>"
					 required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-3">
					<select name="jekel" id="jekel" class="form-control">
						<option value="">-- Pilih jekel --</option>
						<?php
                //menhecek data yg dipilih sebelumnya
                if ($data_cek['jekel'] == "Laki-Laki") echo "<option value='Laki-Laki' selected>Laki-Laki</option>";
                else echo "<option value='Laki-Laki'>Laki-Laki</option>";

                if ($data_cek['jekel'] == "Perempuan") echo "<option value='Perempuan' selected>Perempuan</option>";
                else echo "<option value='Perempuan'>Perempuan</option>";
            ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keluarga Yang Ingin Dikunjungi</label>
				<div class="col-sm-6">
					<select name="id_kk" id="id_kk" class="form-control select2bs4" required>
						<option selected="">- Pilih -</option>
						<?php
                        // ambil data dari database
                        $query = "select * from tb_kk";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
						<option value="<?php echo $row['id_kk'] ?>" <?=$data_cek[
						 'id_kk']==$row[ 'id_kk'] ? "selected" : null ?>>
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
				<label class="col-sm-2 col-form-label">Tanggal / Waktu Berkunjung</label>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tgl_datang" name="tgl_datang" value="<?php echo $data_cek['tgl_datang']; ?>"
					 required>
				</div>
				<div class="col-sm-3">
					<input type="time" class="form-control" id="waktu" name="waktu" value="<?php echo $data_cek['waktu']; ?>"
					 required>
				</div>
			</div>


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-6">
					<select name="alamat_kunjung" id="alamat_kunjung" class="form-control select2bs4" required>
						<option selected="">- Pilih Alamat -</option>
						<?php
                        // ambil data dari database
                        $query = "select * from tb_kk";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
						<option value="<?php echo $row['alamat'] ?>" <?=$data_cek[
						 'id_kk']==$row[ 'id_kk'] ? "selected" : null ?>>
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
				<label class="col-sm-2 col-form-label">Alasan Kunjungan</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="alasan" name="alasan" value="<?php echo $data_cek['alasan']; ?>"
					 required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pelapor</label>
				<div class="col-sm-6">
					<select name="pelapor" id="pelapor" class="form-control select2bs4" required>
						<option selected="">- Pilih -</option>
						<?php
                        // ambil data dari database
                        $query = "select * from tb_pdd";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
						<option value="<?php echo $row['id_pend'] ?>" <?=$data_cek[
						 'id_pend']==$row[ 'id_pend'] ? "selected" : null ?>>
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


		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-datang" title="Kembali" class="btn btn-danger">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_datang SET 
		nik='".$_POST['nik']."',
		nama_datang='".$_POST['nama_datang']."',
		jekel='".$_POST['jekel']."',
		id_kk='".$_POST['id_kk']."',
		tgl_datang='".$_POST['tgl_datang']."',
		waktu='".$_POST['waktu']."',
		alamat_kunjung='".$_POST['alamat_kunjung']."',
		alasan='".$_POST['alasan']."',
		pelapor='".$_POST['pelapor']."'
		WHERE id_datang='".$_POST['id_datang']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Edit Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-datang';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Edit Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-datang';
        }
      })</script>";
    }}
