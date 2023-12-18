<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Perpindahan Penduduk
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-pindah" class="btn btn-primary">
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
							<th>Tanggal Perpindahan</th>
							<th>Alamat Sekarang</th>
							<th>Alamat Perpindahan</th>
							<th>Alasan</th>
							<th>Pihak Keluarga</th>
							<th class="aksi">Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						$sql = $koneksi->query("SELECT p.id_pend, p.nik, p.nama, d.tgl_pindah, d.alasan, d.alamat_sekarang, d.alamat_pindah, d.id_pindah, k.kepala from tb_pindah d inner join tb_pdd p on p.id_pend=d.id_pdd left join tb_kk k on d.id_kk=k.id_kk");
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
									<?php echo $data['nama']; ?>
								</td>
								<td>
									<?php echo date("d F Y", strtotime($data['tgl_pindah'])); ?>
								</td>
								<td>
									<?php echo $data['alamat_sekarang']; ?>
								</td>
								<td>
									<?php echo $data['alamat_pindah']; ?>
								</td>
								<td>
									<?php echo $data['alasan']; ?>
								</td>
								<td>
									Keluarga <?php echo $data['kepala']; ?>
								</td>
								<td class="aksi">
									<a href="?page=edit-pindah&kode=<?php echo $data['id_pindah']; ?>" title="Ubah" class="btn btn-success btn-sm">
										<i class="fa fa-edit"></i>
									</a>
									<a href="?page=del-pindah&kode=<?php echo $data['id_pend']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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
							<th>Tanggal Perpindahan</th>
							<th>Alamat Sekarang</th>
							<th>Alamat Perpindahan</th>
							<th>Alasan</th>
							<th>Pihak Keluarga</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						$sql = $koneksi->query("SELECT p.id_pend, p.nik, p.nama, d.tgl_pindah, d.alasan, d.alamat_sekarang, d.alamat_pindah, d.id_pindah, k.kepala from tb_pindah d inner join tb_pdd p on p.id_pend=d.id_pdd left join tb_kk k on d.id_kk=k.id_kk");
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
									<?php echo $data['nama']; ?>
								</td>
								<td>
									<?php echo date("d F Y", strtotime($data['tgl_pindah'])); ?>
								</td>
								<td>
									<?php echo $data['alamat_sekarang']; ?>
								</td>
								<td>
									<?php echo $data['alamat_pindah']; ?>
								</td>
								<td>
									<?php echo $data['alasan']; ?>
								</td>
								<td>
									Keluarga <?php echo $data['kepala']; ?>
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
			var printContents = "<center> <strong> <h2>DATA PERPINDAHAN PENDUDUK</h2> <h3>RW 008, Graha Chemco, Kecamatan Cikarang Utara</h3> </strong> </center> <style> .aksi { display: none;}} </style>" + document.getElementById("example1").outerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
	</script>
	<!-- /.card-body -->