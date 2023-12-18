<?php

if (isset($_GET['kode'])) {
    $sql_cek = "SELECT  u.id_uang, u.tgl, u.masuk, u.keluar, u.total, u.ket, u.pelapor, p.id_pend, p.nama from 
		tb_uang u inner join tb_pdd p on u.pelapor=p.id_pend WHERE id_uang='" . $_GET['kode'] . "'";
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
                    <input type="text" class="form-control" id="id_uang" name="id_uang" value="<?php echo $data_cek['id_uang']; ?>" readonly />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Laporan</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" id="tgl" name="tgl" value="<?php echo $data_cek['tgl']; ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Pemasukan</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="masuk" name="masuk" value="<?php echo $data_cek['masuk']; ?>" required>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Pengeluaran</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="keluar" name="keluar" value="<?php echo $data_cek['keluar']; ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="ket" name="ket" value="<?php echo $data_cek['ket']; ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Penaggung Jawab</label>
                <div class="col-sm-6">
                    <select name="pelapor" id="prlapor" class="form-control select2bs4" required>
                        <option selected="">- Pilih Penanggung Jawab-</option>
                        <?php
                        // ambil data dari database
                        $query = "select * from tb_pdd";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
                            <option value="<?php echo $row['id_pend'] ?>" <?= $data_cek['id_pend'] == $row['id_pend'] ? "selected" : null ?>>
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
            <a href="?page=data-keuangan" title="Kembali" class="btn btn-danger">Batal</a>
        </div>
    </form>
</div>

<?php

if (isset($_POST['Ubah'])) {
    $masuk = (float)$_POST['masuk'];
    $keluar = (float)$_POST['keluar'];
    $total = $masuk - $keluar;

    $sql_ubah = "UPDATE tb_uang SET 
        tgl='" . $_POST['tgl'] . "',
        masuk='" . $masuk . "',
        keluar='" . $keluar . "',
        total='" . $total . "',
        ket='" . $_POST['ket'] . "',
        pelapor='" . $_POST['pelapor'] . "'
		WHERE id_uang='" . $_POST['id_uang'] . "'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);
    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Edit Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-keuangan';
        }
      })</script>";
    } else {
        echo "<script>
      Swal.fire({title: 'Edit Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-keuangan';
        }
      })</script>";
    }
}
