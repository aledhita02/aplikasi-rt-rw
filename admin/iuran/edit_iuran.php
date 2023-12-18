<?php
if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM tb_iuran WHERE id_iuran='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title"><i class="fa fa-edit"></i> Edit Data Iuran</h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kepala Keluarga</label>
                <div class="col-sm-6">
                    <select name="nama" id="nama" class="form-control select2bs4" required>
                        <option selected="selected">- Pilih Kepala -</option>
                        <?php
                        // ambil data dari database
                        $query = "SELECT * FROM tb_kk";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                            $selected = ($data_cek['id_kk'] == $row['id_kk']) ? 'selected' : '';
                            echo "<option value='" . $row['kepala'] . "' " . $selected . ">" . $row['no_kk'] . " - " . $row['kepala'] . "</option>";
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
                        $query = "SELECT * FROM tb_kk";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                            $selected = ($data_cek['id_kk'] == $row['id_kk']) ? 'selected' : '';
                            echo "<option value='" . $row['id_kk'] . "' " . $selected . ">" . $row['no_kk'] . " - " . $row['kepala'] . "</option>";
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
                        <?php
                        $bulan_arr = array(
                            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                        );

                        foreach ($bulan_arr as $bulan) {
                            $selected = (isset($data_cek['bulan']) && $data_cek['bulan'] == $bulan) ? 'selected' : '';
                            echo "<option value='$bulan' $selected>$bulan</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Pembayaran</label>
                <div class="col-sm-3">
                    <input type="date" class="form-control" id="tgl" name="tgl" value="<?php echo isset($data_cek['tgl']) ? $data_cek['tgl'] : ''; ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Biaya Keamanan</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="iuran_aman" name="iuran_aman" placeholder="Biaya Keamanan" value="<?php echo isset($data_cek['iuran_aman']) ? $data_cek['iuran_aman'] : ''; ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Biaya Kebersihan</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="iuran_sampah" name="iuran_sampah" placeholder="Biaya Sampah" value="<?php echo isset($data_cek['iuran_sampah']) ? $data_cek['iuran_sampah'] : ''; ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Biaya Kegiatan Sosial</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="iuran_sosial" name="iuran_sosial" placeholder="Biaya Sosial" value="<?php echo isset($data_cek['iuran_sosial']) ? $data_cek['iuran_sosial'] : ''; ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Biaya Kas</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="iuran_kas" name="iuran_kas" placeholder="Biaya Kas" value="<?php echo isset($data_cek['iuran_kas']) ? $data_cek['iuran_kas'] : ''; ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="foto">Bukti Pembayaran</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control-file" id="foto" name="foto" placeholder="Bukti Pembayaran" onchange="previewImage(event)">

                    <img src="assets/bizpage/img/bukti/<?= $data_cek['foto'] ?> " id="preview" class="img-thumbnail img-preview mt-2" alt="" width="100px">

                </div>
            </div>
            <?php
            if (isset($_FILES['foto']) && $_FILES['foto']['name'] !== '') {
                $old_file = "assets/bizpage/img/bukti/" . $data_cek['foto'];
                delete_file($old_file);
            }
            ?>

        </div>
        <div class="card-footer">
            <input type="hidden" name="id_iuran" value="<?php echo $_GET['kode']; ?>">

            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
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

if (isset($_POST['Ubah'])) {
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

    // Check if a new file is uploaded
    if ($_FILES['foto']['name'] !== '') {
        // Delete the old file
        $old_file = $data_cek['foto'];
        if (delete_file($old_file)) {
            // Upload the new file and get its unique name
            $file_name = upload_file();
        } 
    } else {
        // Keep the existing file name
        $file_name = $data_cek['foto'];
    }


    $sql_ubah = "UPDATE tb_iuran SET 
    id_kk='" . $_POST['id_kk'] . "',
    bulan='" . $_POST['bulan'] . "',
    tgl='" . $_POST['tgl'] . "',
    nama='" . $_POST['nama'] . "',
    iuran_aman='" . $iuran_aman . "',
    iuran_sampah='" . $iuran_sampah . "',
    iuran_sosial='" . $iuran_sosial . "',
    iuran_kas='" . $iuran_kas . "',
    ket='" . $ket . "',
    foto='" . $file_name . "'
    WHERE id_iuran='" . $_POST['id_iuran'] . "'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);


    if ($query_ubah) {

        if (!empty($insufficientAmounts)) {
            $insufficientMessage = "Jumlah iuran kurang dari batas yang ditentukan:<br>" . implode("<br>", $insufficientAmounts);
            echo "<script>
                Swal.fire({
                    title: 'Input Setoran Masih Kurang!',
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
                    title: 'Edit Data Berhasil',
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
                title: 'Edit Data Gagal',
                text: '',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data-iuran';
                }
            });
        </script>";
    }
}

// Fungsi untuk mengupload file
function upload_file()
{
    // Tentukan direktori penyimpanan file
    $target_dir = "assets/bizpage/img/bukti/";

    // Mendapatkan nama file
    $file_name = $_FILES["foto"]["name"];

    // Mendapatkan path file sementara pada server
    $file_tmp = $_FILES["foto"]["tmp_name"];

    // Generate nama unik untuk file
    $file_unique_name = uniqid() . "_" . $file_name;

    // Tentukan path file tujuan
    $file_dest = $target_dir . $file_unique_name;

    // Pindahkan file dari path sementara ke path tujuan
    move_uploaded_file($file_tmp, $file_dest);

    return $file_unique_name;
}

// Fungsi untuk menghapus file lama
function delete_file($file_name)
{
    $file_path = "assets/bizpage/img/bukti/" . $file_name;

    if (file_exists($file_path)) {
        unlink($file_path);
        //error notifikasi berulang
        return true;
    } else {
        return false;
    }
}

?>