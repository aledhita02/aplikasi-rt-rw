<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Data Keuangan
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <div>
                <a href="?page=add-keuangan" class="btn btn-primary">
                    <i class="fa fa-edit"></i> Tambah Data</a>
                <a href="" class="btn btn-success" onclick="printTable()">
                    <i class="fa fa-print"></i> Print Data </a>
            </div>
            <form class="mt-4">
                <div class="form-row align-items-center">
                    <div class="form-group col-0">
                        <label for="tahun" class="mb-0">Filter Tahun:</label>
                    </div>
                    <div class="form-group col-1">
                        <select class="form-control select2bs4" name="tahun" id="tahun" onchange="filterByYear()">
                            <option value="">Semua Tahun</option>
                            <?php
                            // Ambil daftar tahun dari database
                            $tahun_query = $koneksi->query("SELECT DISTINCT YEAR(tgl) AS tahun FROM tb_uang");
                            while ($tahun_data = $tahun_query->fetch_assoc()) {
                                $selected = (isset($_GET['tahun']) && $_GET['tahun'] == $tahun_data['tahun']) ? 'selected' : '';
                                echo '<option value="' . $tahun_data['tahun'] . '"' . $selected . '>' . $tahun_data['tahun'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </form>
            <br>
            <!-- Level  -->
            <?php
            if ($data_level == "Administrator") {
            ?>
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Pemasukan</th>
                            <th>Pengeluaran</th>
                            <th>Total Saldo Sekarang</th>
                            <th>Keterangan</th>
                            <th>Penanggung Jawab</th>
                            <th class="aksi">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;
                        $sql = "SELECT u.id_uang, u.tgl, u.masuk, u.keluar, u.total, u.ket, u.pelapor, p.nama FROM tb_uang u INNER JOIN tb_pdd p ON u.pelapor = p.id_pend";

                        if (isset($_GET['tahun']) && !empty($_GET['tahun'])) {
                            $tahun = $_GET['tahun'];
                            $sql .= " WHERE YEAR(u.tgl) = $tahun";
                        }

                        $sql .= " ORDER BY u.tgl DESC";

                        $query = $koneksi->query($sql);

                        while ($data = $query->fetch_assoc()) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $no++; ?>
                                </td>
                                <td>
                                    <?php echo date("d F Y", strtotime($data['tgl'])); ?>
                                </td>
                                <td>
                                    <?php
                                    $masuk = $data['masuk'];
                                    $formatted_masuk = number_format($masuk, 0, ',', '.');
                                    echo 'Rp ' . $formatted_masuk;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $keluar = $data['keluar'];
                                    $formatted_keluar = number_format($keluar, 0, ',', '.');
                                    echo 'Rp ' . $formatted_keluar;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $total = $data['total'];
                                    $formatted_total = number_format($total, 0, ',', '.');
                                    echo 'Rp ' . $formatted_total;
                                    ?>
                                </td>
                                <td>
                                    <?php echo $data['ket']; ?>
                                </td>
                                <td>
                                    <?php echo $data['nama']; ?>
                                </td>
                                <td class="aksi">
                                    <a href="?page=edit-keuangan&kode=<?php echo $data['id_uang']; ?>" title="Ubah" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="?page=del-keuangan&kode=<?php echo $data['id_uang']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            <?php
            } elseif ($data_level == "User") {
            ?>
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Pemasukan</th>
                            <th>Pengeluaran</th>
                            <th>Total Saldo Sekarang</th>
                            <th>Keterangan</th>
                            <th>Penanggung Jawab</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;
                        $sql = "SELECT u.id_uang, u.tgl, u.masuk, u.keluar, u.total, u.ket, u.pelapor, p.nama FROM tb_uang u INNER JOIN tb_pdd p ON u.pelapor = p.id_pend";

                        if (isset($_GET['tahun']) && !empty($_GET['tahun'])) {
                            $tahun = $_GET['tahun'];
                            $sql .= " WHERE YEAR(u.tgl) = $tahun";
                        }

                        $sql .= " ORDER BY u.tgl DESC";

                        $query = $koneksi->query($sql);

                        while ($data = $query->fetch_assoc()) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $no++; ?>
                                </td>
                                <td>
                                    <?php echo date("d F Y", strtotime($data['tgl'])); ?>
                                </td>
                                <td>
                                    <?php
                                    $masuk = $data['masuk'];
                                    $formatted_masuk = number_format($masuk, 0, ',', '.');
                                    echo 'Rp ' . $formatted_masuk;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $keluar = $data['keluar'];
                                    $formatted_keluar = number_format($keluar, 0, ',', '.');
                                    echo 'Rp ' . $formatted_keluar;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $total = $data['total'];
                                    $formatted_total = number_format($total, 0, ',', '.');
                                    echo 'Rp ' . $formatted_total;
                                    ?>
                                </td>
                                <td>
                                    <?php echo $data['ket']; ?>
                                </td>
                                <td>
                                    <?php echo $data['nama']; ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            <?php
            }
            ?>
        </div>
    </div>
    <script>
        function printTable() {
            var printContents = "<center> <strong> <h2>DATA KEUANGAN</h2> <h3>RW 008, Graha Chemco, Kecamatan Cikarang Utara</h3> </strong> </center> <style> .aksi { display: none;}} </style>" + document.getElementById("example1").outerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
        // Tambahkan fungsi untuk mengarahkan pengguna ke halaman yang sesuai setelah memilih filter tahun
        function filterByYear() {
            var selectedYear = document.getElementById("tahun").value;
            if (selectedYear !== "") {
                window.location.href = "?page=data-keuangan&tahun=" + selectedYear;
            } else {
                window.location.href = "?page=data-keuangan";
            }
        }
    </script>
    <!-- /.card-body -->