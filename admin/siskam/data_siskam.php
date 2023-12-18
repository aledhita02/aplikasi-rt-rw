<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Keamanan Lingkungan
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-siskam" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
				<a href="" class="btn btn-success" onclick="printTable()">
					<i class="fa fa-print"></i> Print Data </a>
			</div>
			<form class="mt-4">
				<div class="form-row align-items-center col-6">
					<div class="form-group col-0">
						<label for="rt" class="mb-0">Filter RT:</label>
					</div>
					<div class="form-group col-2">
						<select id="rt-filter" name="rt" class="form-control select2bs4" onchange="filterByRt()">
							<option value="">Semua</option>
							<?php
							// Ambil daftar RT yang tersedia dari tabel
							$sql_rt = $koneksi->query("SELECT DISTINCT rt FROM tb_pdd ORDER BY rt ASC");
							while ($data_rt = $sql_rt->fetch_assoc()) {
								$selected = isset($_GET['rt']) && $_GET['rt'] == $data_rt['rt'] ? 'selected' : '';
								echo '<option value="' . $data_rt['rt'] . '" ' . $selected . '>' . $data_rt['rt'] . '</option>';
							}
							?>
						</select>
					</div>
				</div>
			</form>
		</div>
		<br>
		<!-- Level  -->
		<?php
		if ($data_level == "Administrator") {
		?>
			<table id="example1" class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>NIK</th>
						<th>Nama</th>
						<th>RT</th>
						<th>Minggu ke -</th>
						<th>Shift Jaga</th>
						<th class="aksi">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					$sql = "SELECT p.id_pend, p.nik, p.nama, p.rt, d.minggu, d.jaga, d.id_siskam FROM tb_siskam d INNER JOIN tb_pdd p ON p.id_pend = d.id_pdd";

					// Filter RT jika ada yang dikirimkan
					if (isset($_GET['rt']) && $_GET['rt'] != '') {
						$rt_filter = $_GET['rt'];
						$sql .= " WHERE p.rt = '$rt_filter'";
					}

					$sql .= " ORDER BY p.rt";
					$result = $koneksi->query($sql);

					while ($data = $result->fetch_assoc()) {
						// Kode berikutnya
					?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data['nik']; ?></td>
							<td><?php echo $data['nama']; ?></td>
							<td><?php echo $data['rt']; ?></td>
							<td><?php echo $data['minggu']; ?></td>
							<td><?php echo $data['jaga']; ?></td>
							<td class="aksi">
								<a href="?page=edit-siskam&kode=<?php echo $data['id_siskam']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del-siskam&kode=<?php echo $data['id_siskam']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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
						<th>NIK</th>
						<th>Nama</th>
						<th>RT</th>
						<th>Minggu ke -</th>
						<th>Shift Jaga</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					$sql = "SELECT p.id_pend, p.nik, p.nama, p.rt, d.minggu, d.jaga, d.id_siskam FROM tb_siskam d INNER JOIN tb_pdd p ON p.id_pend = d.id_pdd";

					// Filter RT jika ada yang dikirimkan
					if (isset($_GET['rt']) && $_GET['rt'] != '') {
						$rt_filter = $_GET['rt'];
						$sql .= " WHERE p.rt = '$rt_filter'";
					}

					$sql .= " ORDER BY p.rt";
					$result = $koneksi->query($sql);

					while ($data = $result->fetch_assoc()) {
						// Kode berikutnya
					?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data['nik']; ?></td>
							<td><?php echo $data['nama']; ?></td>
							<td><?php echo $data['rt']; ?></td>
							<td><?php echo $data['minggu']; ?></td>
							<td><?php echo $data['jaga']; ?></td>
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
<!-- /.card-body -->
</div>

<script>
	function printTable() {
		var printContents = "<center> <strong> <h2>JADWAL RONDA MALAM WARGA</h2> <h3>RW 008, Graha Chemco, Kecamatan Cikarang Utara</h3> </strong> </center> <style> .aksi { display: none;}} </style>" + document.getElementById("example1").outerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
	}

	function filterByRt() {
		var selectedrt = document.getElementById("rt-filter").value;
		if (selectedrt !== "") {
			window.location.href = "?page=data-siskam&rt=" + selectedrt;
		} else {
			window.location.href = "?page=data-siskam";
		}
	}
</script>