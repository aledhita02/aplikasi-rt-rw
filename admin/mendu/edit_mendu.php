<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT p.nama, m.id_mendu, m.tgl_mendu,m.waktu, m.sebab, m.tempat, m.makam FROM tb_mendu m join tb_pdd p on m.id_pdd=p.id_pend WHERE id_mendu='".$_GET['kode']."'";
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
					<input type="text" class="form-control" id="id_mendu" name="id_mendu" value="<?php echo $data_cek['id_mendu']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>"
					 readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tgl mendu</label>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tgl_mendu" name="tgl_mendu" value="<?php echo $data_cek['tgl_mendu']; ?>"
					 required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pukul</label>
				<div class="col-sm-3">
					<input type="time" class="form-control" id="waktu" name="waktu" value="<?php echo $data_cek['waktu']; ?>"
					 required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Penyebab</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="sebab" name="sebab" value="<?php echo $data_cek['sebab']; ?>"
					 required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tempat</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="tempat" name="tempat" value="<?php echo $data_cek['tempat']; ?>"
					 required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tempat Pemakaman</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="makam" name="makam" value="<?php echo $data_cek['makam']; ?>"
					 required>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-mendu" title="Kembali" class="btn btn-danger">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_mendu SET 
		tgl_mendu='".$_POST['tgl_mendu']."',
		waktu='".$_POST['waktu']."',
		sebab='".$_POST['sebab']."',
		tempat='".$_POST['tempat']."',
		makam='".$_POST['makam']."'
		WHERE id_mendu='".$_POST['id_mendu']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Edit Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-mendu';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Edit Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-mendu';
        }
      })</script>";
    }}
