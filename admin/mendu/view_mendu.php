<?php

if (isset($_GET['kode'])) {
    $sql_cek = "SELECT p.id_pend, p.nik, p.nama, p.tempat_lh, p.tgl_lh, p.jekel, p.alamat, p.desa, p.rt, p.rw, p.agama, p.pekerjaan, m.tgl_mendu, m.waktu, m.sebab, m.tempat, m.makam, m.id_mendu from tb_mendu m inner join tb_pdd p on p.id_pend=m.id_pdd WHERE m.id_mendu ='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-user"></i> Detail Kematian
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
                        <b>NIK</b>
                    </td>
                    <td>:
                        <?php echo $data_cek['nik']; ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px">
                        <b>Nama</b>
                    </td>
                    <td>:
                        <?php echo $data_cek['nama']; ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px">
                        <b>TTL</b>
                    </td>
                    <td>:
                        <?php echo $data_cek['tempat_lh']; ?>
                        /
                        <?php echo date("l, d F Y", strtotime($data_cek['tgl_lh'])); ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px">
                        <b>Jenis Kelamin</b>
                    </td>
                    <td>:
                        <?php echo $data_cek['jekel']; ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px">
                        <b>Alamat</b>
                    </td>
                    <td>:
                        <?php echo $data_cek['alamat']; ?>, RT
                        <?php echo $data_cek['rt']; ?> / RW
                        <?php echo $data_cek['rw']; ?>, Desa
                        <?php echo $data_cek['desa']; ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px">
                        <b>Agama</b>
                    </td>
                    <td>:
                        <?php echo $data_cek['agama']; ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px">
                        <b>Pekerjaan</b>
                    </td>
                    <td>:
                        <?php echo $data_cek['pekerjaan']; ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px">
                        <b>Tanggal Wafat</b>
                    </td>
                    <td>:
                        <?php echo date("l, d F Y", strtotime($data_cek['tgl_mendu'])); ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px">
                        <b>Pukul</b>
                    </td>
                    <td>:
                        <?php echo $data_cek['waktu']; ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px">
                        <b>Penyebab Kematian</b>
                    </td>
                    <td>:
                        <?php echo $data_cek['sebab']; ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px">
                        <b>Tempat Kejadian</b>
                    </td>
                    <td>:
                        <?php echo $data_cek['tempat']; ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px">
                        <b>Tempat Pemakaman</b>
                    </td>
                    <td>:
                        <?php echo $data_cek['makam']; ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="card-footer">
            <a href="?page=data-mendu" class="btn btn-info">Kembali</a>
        </div>
    </div>
</div>