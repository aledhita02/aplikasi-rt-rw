<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Iuran Bulanan
		</h3>
	</div>
	<!-- /.card-header -->
	<?php
		if ($data_level == "Administrator") {
	?>
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-iuran" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Bulan</th>
						<th>No KK</th>
						<th>Kepala Keluarga</th>
						<th>Keterangan</th>
						<th>Biaya Detail</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>



					<?php
					$no = 1;
					$sql = $koneksi->query("SELECT l.id_iuran, l.bulan,l.nama, l.tgl, l.ket,k.no_kk from 
			  tb_iuran l inner join tb_kk k on k.id_kk=l.id_kk");
					while ($data = $sql->fetch_assoc()) {
					?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['bulan'];; ?><?php echo date(' Y', strtotime($data['tgl'])); ?>

							</td>
							<td>
								<?php echo $data['no_kk']; ?>
							</td>
							<td>
								<?php echo $data['nama']; ?>
							</td>
							<td>
								<?php
								if ($data['ket'] == 'Lunas') {
									echo '<h5><span class="badge badge-pill badge-success ">' . $data['ket'] . '</span></h5>';
								} else {
									echo '<h5><span class="badge badge-pill badge-danger">' . $data['ket'] . '</span></h5>';
								}
								?>
							</td>
							<td>
								<a href="?page=view-iuran&kode=<?php echo $data['id_iuran']; ?>" title="Biaya Detail" class="btn btn-info btn-sm">
									<i class="fa fa-users"></i>
								</a>
							</td>
							<td>
								<a href="?page=edit-iuran&kode=<?php echo $data['id_iuran']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del-iuran&kode=<?php echo $data['id_iuran']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>

					<?php
					}
					?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<?php
		} elseif ($data_level == "User") {
	?>
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-iuran" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Bulan</th>
						<th>No KK</th>
						<th>Kepala Keluarga</th>
						<th>Keterangan</th>
						<th>Biaya Detail</th>
					</tr>
				</thead>
				<tbody>



					<?php
					$no = 1;
					$sql = $koneksi->query("SELECT l.id_iuran, l.bulan,l.nama, l.tgl, l.ket,k.no_kk from 
			  tb_iuran l inner join tb_kk k on k.id_kk=l.id_kk");
					while ($data = $sql->fetch_assoc()) {
					?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['bulan']; ?>
							</td>
							<td>
								<?php echo $data['no_kk']; ?>
							</td>
							<td>
								<?php echo $data['nama']; ?>
							</td>
							<td>
								<?php
								if ($data['ket'] == 'Lunas') {
									echo '<h5><span class="badge badge-pill badge-success ">' . $data['ket'] . '</span></h5>';
								} else {
									echo '<h5><span class="badge badge-pill badge-danger">' . $data['ket'] . '</span></h5>';
								}
								?>
							</td>
							<td>
								<a href="?page=view-iuran&kode=<?php echo $data['id_iuran']; ?>" title="Biaya Detail" class="btn btn-info btn-sm">
									<i class="fa fa-users"></i>
								</a>
							</td>
						</tr>

					<?php
					}
					?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<?php
	}
	?>

	<!-- /.card-body -->