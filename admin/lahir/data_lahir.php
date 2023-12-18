<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Kelahiran
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-lahir" class="btn btn-primary">
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
							<th>Nama</th>
							<th>Tanggal Lahir</th>
							<th>Jenis Kelamin</th>
							<th>Nama Ibu Kandung</th>
							<th>Keluarga</th>
							<th class="aksi">Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						$sql = $koneksi->query("SELECT l.id_lahir, l.nama, l.tgl_lh, l.jekel, l.ibu, k.no_kk, k.kepala from tb_lahir l inner join tb_kk k on k.id_kk=l.id_kk");
						while ($data = $sql->fetch_assoc()) {
						?>

							<tr>
								<td>
									<?php echo $no++; ?>
								</td>
								<td>
									<?php echo $data['nama']; ?>
								</td>
								<td>
									<?php echo date("d F Y", strtotime($data['tgl_lh'])); ?>
								</td>
								<td>
									<?php echo $data['jekel']; ?>
								</td>
								<td>
									<?php echo $data['ibu']; ?>

								</td>
								<td>
									<?php echo $data['no_kk']; ?>-
									<?php echo $data['kepala']; ?>
								</td>
								<td class="aksi">
									<a href="?page=view-lahir&kode=<?php echo $data['id_lahir']; ?>" title="Detail" class="btn btn-info btn-sm">
										<i class="fa fa-user"></i>
									</a>
									<a href="?page=edit-lahir&kode=<?php echo $data['id_lahir']; ?>" title="Ubah" class="btn btn-success btn-sm">
										<i class="fa fa-edit"></i>
									</a>
									<a href="?page=del-lahir&kode=<?php echo $data['id_lahir']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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
							<th>Nama</th>
							<th>Tanggal Lahir</th>
							<th>Jenis Kelamin</th>
							<th>Nama Ibu Kandung</th>
							<th>Keluarga</th>
							<th class="aksi">Detail</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						$sql = $koneksi->query("SELECT l.id_lahir, l.nama, l.tgl_lh, l.jekel, l.ibu, k.no_kk, k.kepala from tb_lahir l inner join tb_kk k on k.id_kk=l.id_kk");
						while ($data = $sql->fetch_assoc()) {
						?>

							<tr>
								<td>
									<?php echo $no++; ?>
								</td>
								<td>
									<?php echo $data['nama']; ?>
								</td>
								<td>
									<?php echo date("d F Y", strtotime($data['tgl_lh'])); ?>
								</td>
								<td>
									<?php echo $data['jekel']; ?>
								</td>
								<td>
									<?php echo $data['ibu']; ?>

								</td>
								<td>
									<?php echo $data['no_kk']; ?>-
									<?php echo $data['kepala']; ?>
								</td>
								<td class="aksi">
									<a href="?page=view-lahir&kode=<?php echo $data['id_lahir']; ?>" title="Detail" class="btn btn-info btn-sm">
										<i class="fa fa-user"></i>
									</a>
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
	<!-- fungsi print -->
	<script>
		function printTable() {
			var printContents = "<center> <strong> <h2>DATA KELAHIRAN PENDUDUK</h2> </strong> </center> <style> .aksi { display: none;}} </style>" + document.getElementById("example1").outerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
	</script>
	<!-- /.card-body -->