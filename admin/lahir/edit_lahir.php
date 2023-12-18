<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_lahir WHERE id_lahir='".$_GET['kode']."'";
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
					<input type="text" class="form-control" id="id_lahir" name="id_lahir" value="<?php echo $data_cek['id_lahir']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>"
					 required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">TTL</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id=tempat_lh" name="tempat_lh" value="<?php echo $data_cek['tgl_lh']; ?>">
				</div>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tgl_lh" name="tgl_lh" value="<?php echo $data_cek['tgl_lh']; ?>"
					 required>
				</div>
			</div>


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-3">
					<select name="jekel" id="jekel" class="form-control">
						<option value="">-- Pilih jekel --</option>
						<?php
                //mengecek data yg dipilih sebelumnya
                if ($data_cek['jekel'] == "Laki-Laki") echo "<option value='Laki-Laki' selected>Laki-Laki</option>";
                else echo "<option value='Laki-Laki'>Laki-Laki</option>";

                if ($data_cek['jekel'] == "Perempuan") echo "<option value='Perempuan' selected>Perempuan</option>";
                else echo "<option value='Perempuan'>Perempuan</option>";
            ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Ibu Kandung</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="ibu" name="ibu" value="<?php echo $data_cek['ibu']; ?>"
					 required>
				</div>
			</div>
			
			<!-- error mau nambahin view lahir -->
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Anak Ke-</label>
				<div class="col-sm-3">
					<select name="anak" id="anak" class="form-control">
						<option value="">- Pilih -</option>
						<?php
                //menhecek data yg dipilih sebelumnya
                if ($data_cek['anak'] == "1") echo "<option value='1' selected>1</option>";
                else echo "<option value='1'>1</option>";

				if ($data_cek['anak'] == "2") echo "<option value='2' selected>1</option>";
                else echo "<option value='2'>2</option>";

				if ($data_cek['anak'] == "3") echo "<option value='3' selected>1</option>";
                else echo "<option value='3'>3</option>";

				if ($data_cek['anak'] == "4") echo "<option value='4' selected>1</option>";
                else echo "<option value='4'>4</option>";

				if ($data_cek['anak'] == "5") echo "<option value='5' selected>1</option>";
                else echo "<option value='5'>5</option>";

				if ($data_cek['anak'] == "6") echo "<option value='6' selected>1</option>";
                else echo "<option value='6'>6</option>";

				if ($data_cek['anak'] == "7") echo "<option value='7' selected>1</option>";
                else echo "<option value='7'>7</option>";

				if ($data_cek['anak'] == "8") echo "<option value='8' selected>1</option>";
                else echo "<option value='8'>8</option>";

				if ($data_cek['anak'] == "9") echo "<option value='9' selected>1</option>";
                else echo "<option value='9'>9</option>";

				if ($data_cek['anak'] == "10") echo "<option value='10' selected>1</option>";
                else echo "<option value='10'>10</option>";
            ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-6">
					<select name="alamat" id="alamat" class="form-control select2bs4" required>
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
				<label class="col-sm-2 col-form-label">Keluarga</label>
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

		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-lahir" title="Kembali" class="btn btn-danger">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_lahir SET 
		nama='".$_POST['nama']."',
		tgl_lh='".$_POST['tgl_lh']."',
		jekel='".$_POST['jekel']."',
		ibu='".$_POST['ibu']."',
		anak='".$_POST['anak']."',
		alamat='".$_POST['alamat']."',
		id_kk='".$_POST['id_kk']."'
		WHERE id_lahir='".$_POST['id_lahir']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Edit Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-lahir';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Edit Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-lahir';
        }
      })</script>";
    }}
