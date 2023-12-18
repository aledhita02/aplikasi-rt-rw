<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Tambah Data
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Laporan</label>
                <div class="col-sm-3">
                    <input type="date" class="form-control" id="tgl" name="tgl" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Pemasukan</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="masuk" name="masuk" placeholder="Nilai Pemasukan">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Pengeluaran</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="keluar" name="keluar" placeholder="Nilai Pengeluaran">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="ket" name="ket" placeholder="Keterangan" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Penanggung Jawab</label>
                <div class="col-sm-6">
                    <select name="pelapor" id="pelapor" class="form-control select2bs4" required>
                        <option selected="selected">- Pilih Penanggung Jawab -</option>
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

        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-success">
            <a href="?page=data-keuangan" title="Kembali" class="btn btn-danger">Batal</a>
        </div>
    </form>
</div>

<?php

if (isset($_POST['Simpan'])) {

    $masuk = (float)$_POST['masuk'];
    $keluar = (float)$_POST['keluar'];

    // Menghitung total pemasukan sebelum dan setelahnya
    $query_total_masuk = "SELECT SUM(masuk) AS total_masuk FROM tb_uang";
    $result_total_masuk = mysqli_query($koneksi, $query_total_masuk);
    $total_masuk = mysqli_fetch_assoc($result_total_masuk)['total_masuk'];

    // Menghitung total pengeluaran sebelum dan setelahnya
    $query_total_keluar = "SELECT SUM(keluar) AS total_keluar FROM tb_uang";
    $result_total_keluar = mysqli_query($koneksi, $query_total_keluar);
    $total_keluar = mysqli_fetch_assoc($result_total_keluar)['total_keluar'];

    $total = $total_masuk - $total_keluar + $masuk - $keluar;

    $sql_simpan = "INSERT INTO tb_uang (tgl, masuk, keluar, total, ket, pelapor) VALUES (
			'" . $_POST['tgl'] . "',
			'" . $masuk . "',
			'" . $keluar . "',
            '" . $total . "',
            '" . $_POST['ket'] . "',
            '" . $_POST['pelapor'] . "')";
    $query_simpan = mysqli_query($koneksi, $sql_simpan);
    mysqli_close($koneksi);

    if ($query_simpan) {
        echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-keuangan';
          }
      })</script>";
    } else {
        echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-keuangan';
          }
      })</script>";
    }
}
//selesai proses simpan data
