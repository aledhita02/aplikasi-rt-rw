<?php

if (isset($_GET['kode'])) {
    $sql_cek = "SELECT l.nama, l.tempat_lh, l.tgl_lh, l.jekel, l.alamat, l.ibu, l.anak, k.desa, k.rt, k.rw, k.kepala, k.no_kk FROM tb_lahir l LEFT JOIN tb_kk k ON l.id_kk = k.id_kk WHERE l.id_lahir ='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-user"></i> Detail Kelahiran
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
                        <b>Ibu Kandung</b>
                    </td>
                    <td>:
                        <?php echo $data_cek['ibu']; ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px">
                        <b>Anak Ke -</b>
                    </td>
                    <td>:
                        <?php echo $data_cek['anak']; ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px">
                        <b>Keluarga</b>
                    </td>
                    <td>:
                        <?php echo $data_cek['kepala']; ?> (
                            <?php echo $data_cek['no_kk']; ?> )
                    </td>
                </tr>


            </tbody>
        </table>
        <div class="card-footer">
            <a href="?page=data-lahir" class="btn btn-info">Kembali</a>
        </div>
    </div>
</div>