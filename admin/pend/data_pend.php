<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Penduduk
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-pend" class="btn btn-primary">
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
							<th>Alamat</th>
							<th>No KK</th>
							<th class="aksi">Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						$sql = $koneksi->query("SELECT p.id_pend, p.nik, p.nama, p.jekel, p.alamat, p.desa, p.rt, p.rw, a.id_kk, k.no_kk, k.kepala from 
											tb_pdd p left join tb_anggota a on p.id_pend=a.id_pend 
											left join tb_kk k on a.id_kk=k.id_kk where status='Ada'");
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
									<?php echo $data['jekel']; ?>
								</td>
								<td>
									<?php echo $data['alamat']; ?>, RT
									<?php echo $data['rt']; ?>
									/ RW
									<?php echo $data['rw']; ?>, Desa
									<?php echo $data['desa']; ?>
								</td>
								<td>
									<?php echo $data['no_kk']; ?>-
									<?php echo $data['kepala']; ?>
								</td>

								<td class="aksi">
									<a href="?page=view-pend&kode=<?php echo $data['id_pend']; ?>" title="Detail" class="btn btn-info btn-sm">
										<i class="fa fa-user"></i>
									</a>
									<a href="?page=edit-pend&kode=<?php echo $data['id_pend']; ?>" title="Ubah" class="btn btn-success btn-sm">
										<i class="fa fa-edit"></i>
									</a>
									<a href="?page=del-pend&kode=<?php echo $data['id_pend']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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
							<th>Jenis Kelamin</th>
							<th>Alamat</th>
							<th>No KK</th>
							<th class="aksi">Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						$sql = $koneksi->query("SELECT p.id_pend, p.nik, p.nama, p.jekel, p.alamat, p.desa, p.rt, p.rw, a.id_kk, k.no_kk, k.kepala from 
											tb_pdd p left join tb_anggota a on p.id_pend=a.id_pend 
											left join tb_kk k on a.id_kk=k.id_kk where status='Ada'");
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
									<?php echo $data['jekel']; ?>
								</td>
								<td>
									<?php echo $data['alamat']; ?>, RT
									<?php echo $data['rt']; ?>
									/ RW
									<?php echo $data['rw']; ?>, Desa
									<?php echo $data['desa']; ?>
								</td>
								<td>
									<?php echo $data['no_kk']; ?>-
									<?php echo $data['kepala']; ?>
								</td>

								<td class="aksi">
									<a href="?page=view-pend&kode=<?php echo $data['id_pend']; ?>" title="Detail" class="btn btn-info btn-sm">
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
	<script>
		function printTable() {
			var printContents = "<center> <strong> <h2>DATA PENDUDUK</h2> <h3>RW 008, Graha Chemco, Kecamatan Cikarang Utara</h3> </strong> </center> <style> .aksi { display: none;}} </style>" + document.getElementById("example1").outerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
	</script>

<!-- jika ingin di bintang bisa tambahkan fitur ini di class yang ingin di sensor -->
	<!-- <script>
		var textElements = document.getElementsByClassName('nik-text');
		var threshold = 3; // Panjang ambang batas untuk mengganti dengan bintang

		for (var i = 0; i < textElements.length; i++) {
			var textElement = textElements[i];
			var text = textElement.innerText;

			if (text.length > threshold) {
				var stars = '*'.repeat(text.length - threshold) + text.slice(-threshold);
				textElement.innerText = stars;
			}
		}
	</script> -->
</div>