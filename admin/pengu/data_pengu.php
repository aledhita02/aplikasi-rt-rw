<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Pengumuman
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add_pengu" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Pengumuman</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Isi</th>
						<th>Tanggal</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("select * from tb_pengu");
					while ($data = $sql->fetch_assoc()) {

					?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['judul']; ?>
							</td>
							<td>
								<?php echo $data['isi']; ?>
							</td>
							<td>
								<?php echo date("l, d F Y", strtotime($data['tanggal'])); ?>
							<td>
								<a href="?page=edit_pengu&kode=<?php echo $data['id_pengu']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del_pengu&kode=<?php echo $data['id_pengu']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus pengumuman ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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
	<!-- /.card-body -->