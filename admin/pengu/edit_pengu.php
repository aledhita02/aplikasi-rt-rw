<?php
if(isset($_GET['kode'])){
    $sql_cek = "SELECT * FROM tb_pengu WHERE id_pengu='".$_GET['kode']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}

if (isset($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_pengu SET 
    judul='".$_POST['judul']."',
    isi='".$_POST['isi']."',
    tanggal='".$_POST['tanggal']."'
    WHERE id_pengu='".$_GET['kode']."'";
    
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
            Swal.fire({
                title: 'Ubah Pengumuman Berhasil',
                text: '',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data_pengu';
                }
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Ubah Pengumuman Gagal',
                text: '',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data_pengu';
                }
            });
        </script>";
    }
}
?>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Edit Pengumuman
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $data_cek['judul']; ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Isi</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="isi" name="isi" value="<?php echo $data_cek['isi']; ?>" required>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-3">
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $data_cek['tanggal']; ?>" readonly/>
                </div>
            </div>
        </div>
        
        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=data_pengu" title="Kembali" class="btn btn-danger">Batal</a>
        </div>
    </form>
</div>
