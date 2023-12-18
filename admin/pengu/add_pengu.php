<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Pengumuman</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Judul</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Isi Pengumuman</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="isi" name="isi" placeholder="Isi" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">tanggal</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal" required>
				</div>
			</div>
			<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-success">
			<a href="?page=data_pengu" title="Kembali" class="btn btn-danger">Batal</a>
		</div>


<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO tb_pengu (judul, isi ,tanggal) VALUES (
            '".$_POST['judul']."',
            '".$_POST['isi']."',
            '".$_POST['tanggal']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Pengumuman Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data_pengu';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Pengumuman Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add_pengu';
          }
      })</script>";
    }}
     //selesai proses simpan data
