<?php

if (isset($_GET['kode'])) {
  $sql_cek = "SELECT * from tb_iuran where id_iuran ='" . $_GET['kode'] . "'";
  $query_cek = mysqli_query($koneksi, $sql_cek);
  $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
} {
}
?>

<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">
      <i class="fa fa-user"></i> Detail Iuran Bulanan
    </h3>
    </h3>
    <div class="card-tools">
    </div>
  </div>
  <div class="card-body p-0">
    <table class="table">
      <tbody>
        <tr>
          <td style="width: 150px">
            <b>Nama</b>
          </td>
          <td>:
            <?php echo isset($data_cek['nama']) ? $data_cek['nama'] : ''; ?>
          </td>
        </tr>
        <tr>
          <td style="width: 150px">
            <b>Bulan Pembayaran</b>
          </td>
          <td>:
            <?php echo isset($data_cek['bulan']) ? $data_cek['bulan'] : ''; ?>
          </td>
        </tr>
        <tr>
          <td style="width: 150px">
            <b>Tanggal Pembayaran</b>
          </td>
          <td>:
            <?php echo date("d F Y", strtotime($data_cek['tgl'])); ?>
          </td>
        </tr>
        <tr>
          <td style="width: 150px">
            <b>Keterangan</b>
          </td>
          <td>
            <div class="row">
              :
              <div class="col">
                <?php

                if ($data_cek['ket'] == 'Lunas') {
                  echo '<h5><span class="badge badge-pill badge-success ">' . $data_cek['ket'] . '</span></h5>';
                } else {
                  echo '<h5><span class="badge badge-pill badge-danger">' . $data_cek['ket'] . '</span></h5>';
                }

                ?>
              </div>
            </div>
          </td>
        </tr>
      </tbody>
    </table>

    <div class="row">
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-purple"><i class="fa fa-home"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Iuran Keamanan</span>
            <span class="info-box-number">Rp <?php echo isset($data_cek['iuran_aman']) ? $data_cek['iuran_aman'] : ''; ?>,00</span>
          </div>
          <div class="card-footer bg-white">
            <?php
            $iuran_aman = $data_cek['iuran_aman'];
            if ($iuran_aman == 20000) {
              echo '<h5><span class="badge badge-pill badge-success ">' . 'Lunas' . '</span></h5>';
            } else {
              echo '<h5><span class="badge badge-pill badge-danger">' . 'Belum' . '</span></h5>';
            }
            ?>
          </div>
          <!-- /.info-box-content -->

        </div>
        <!-- /.info-box -->
      </div>

      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-success"><i class="fa fa-broom"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Iuran Kebersihan</span>
            <span class="info-box-number">Rp <?php echo isset($data_cek['iuran_sampah']) ? $data_cek['iuran_sampah'] : ''; ?>,00</span>
          </div>
          <div class="card-footer bg-white">
            <?php
            $iuran_sampah = $data_cek['iuran_sampah'];
            if ($iuran_sampah == 15000) {
              echo '<h5><span class="badge badge-pill badge-success ">' . 'Lunas' . '</span></h5>';
            } else {
              echo '<h5><span class="badge badge-pill badge-danger">' . 'Belum' . '</span></h5>';
            }
            ?>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-primary"><i class="fa fa-user"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Iuran Kegiatan Sosial</span>
            <span class="info-box-number">Rp <?php echo isset($data_cek['iuran_sosial']) ? $data_cek['iuran_sosial'] : ''; ?>,00</span>
          </div>
          <div class="card-footer bg-white">
            <?php
            $iuran_sosial = $data_cek['iuran_sosial'];
            if ($iuran_sosial == 20000) {
              echo '<h5><span class="badge badge-pill badge-success ">' . 'Lunas' . '</span></h5>';
            } else {
              echo '<h5><span class="badge badge-pill badge-danger">' . 'Belum' . '</span></h5>';
            }
            ?>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-pink"><i class="far fa-credit-card"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Iuran Kas</span>
            <span class="info-box-number">Rp <?php echo isset($data_cek['iuran_kas']) ? $data_cek['iuran_kas'] : ''; ?>,00</span>
          </div>
          <div class="card-footer bg-white">
            <?php
            $iuran_kas = $data_cek['iuran_kas'];
            if ($iuran_kas == 20000) {
              echo '<h5><span class="badge badge-pill badge-success ">' . 'Lunas' . '</span></h5>';
            } else {
              echo '<h5><span class="badge badge-pill badge-danger">' . 'Belum' . '</span></h5>';
            }
            ?>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <div class="col-md-2 col-sm-6 col-12 mx-auto">
        <div class="info-box">
          <div class="info-box-content">
            <span class="info-box-text">
              <center><b>Bukti Pembayaran</b></center>
            </span>
            <center>
              <a href="assets/bizpage/img/bukti/<?php echo $data_cek['foto']; ?>" data-toggle="modal" data-target="#exampleModal">
                <img class="col-12 mx-auto" src="assets/bizpage/img/bukti/<?php echo $data_cek['foto']; ?>" alt="Gambar" />
              </a>
            </center>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <img src="assets/bizpage/img/bukti/<?php echo $data_cek['foto']; ?>" alt="Gambar" style="max-width: 100%; height: auto;">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

    </div>


    <div class="card-footer">
      <a href="?page=data-iuran" class="btn btn-info">Kembali</a>
    </div>
  </div>
</div>