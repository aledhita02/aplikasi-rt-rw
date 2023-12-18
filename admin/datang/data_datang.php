<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Tamu
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-datang" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
				<a href="" class="btn btn-success" onclick="printTable()">
					<i class="fa fa-print"></i> Print Data </a>
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
							<th>Jenis Kelamin</th>
							<th>Tanggal / Waktu</th>
							<th>Keluarga Yang Dikunjungi</th>
							<th>Tempat Berkunjung</th>
							<th>Alasan Kunjungan</th>
							<th>Pelapor</th>
							<th class="aksi">Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						$sql = $koneksi->query("SELECT d.id_datang, d.nik, d.nama_datang, d.jekel, d.tgl_datang, d.alamat_kunjung, d.waktu, d.alasan, p.nama, k.id_kk, k.kepala, k.alamat from tb_datang d inner join tb_pdd p on d.pelapor=p.id_pend left join tb_kk k on d.id_kk=k.id_kk");
						while ($data = $sql->fetch_assoc()) {
						?>

							<tr>
								<td>
									<?php echo $no++; ?>
								</td>
								<td>
									<?php echo $data['nik']; ?>
								</td>
								<td>
									<?php echo $data['nama_datang']; ?>
								</td>
								<td>
									<?php echo $data['jekel']; ?>
								</td>
								<td>
									<?php echo date("l, d F Y", strtotime($data['tgl_datang'])); ?> /
									<?php echo $data['waktu']; ?> WIB
								</td>
								<td>
									Keluarga <?php echo $data['kepala']; ?>
								</td>
								<td>
									<?php echo $data['alamat_kunjung']; ?>
								</td>
								<td>
									<?php echo $data['alasan']; ?>
								</td>
								<td>
									<?php echo $data['nama']; ?>
								</td>
								<td class="aksi">
									<a href="?page=edit-datang&kode=<?php echo $data['id_datang']; ?>" title="Ubah" class="btn btn-success btn-sm">
										<i class="fa fa-edit"></i>
									</a>
									<a href="?page=del-datang&kode=<?php echo $data['id_datang']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
										<i class="fa fa-trash"></i>
										</>
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
							<th>Jenis Kelamin</th>
							<th>Tanggal / Waktu</th>
							<th>Keluarga Yang Dikunjungi</th>
							<th>Tempat Berkunjung</th>
							<th>Alasan Kunjungan</th>
							<th>Pelapor</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						$sql = $koneksi->query("SELECT d.id_datang, d.nik, d.nama_datang, d.jekel, d.tgl_datang, d.alamat_kunjung, d.waktu, d.alasan, p.nama, k.id_kk, k.kepala, k.alamat from tb_datang d inner join tb_pdd p on d.pelapor=p.id_pend left join tb_kk k on d.id_kk=k.id_kk");
						while ($data = $sql->fetch_assoc()) {
						?>

							<tr>
								<td>
									<?php echo $no++; ?>
								</td>
								<td>
									<?php echo $data['nik']; ?>
								</td>
								<td>
									<?php echo $data['nama_datang']; ?>
								</td>
								<td>
									<?php echo $data['jekel']; ?>
								</td>
								<td>
									<?php echo date("l, d F Y", strtotime($data['tgl_datang'])); ?> /
									<?php echo $data['waktu']; ?> WIB
								</td>
								<td>
									Keluarga <?php echo $data['kepala']; ?>
								</td>
								<td>
									<?php echo $data['alamat_kunjung']; ?>
								</td>
								<td>
									<?php echo $data['alasan']; ?>
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
			var printContents = "<center> <strong> <h2>DATA TAMU 24 JAM</h2> <h3>RW 008, Graha Chemco, Kecamatan Cikarang Utara</h3> </strong> </center> <style> .aksi { display: none;}} </style>" + document.getElementById("example1").outerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
	</script>
	<!-- /.card-body -->