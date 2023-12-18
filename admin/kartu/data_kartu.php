<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Kartu Keluarga
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-kartu" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
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
							<th>NO KK</th>
							<th>Kepala Keluarga</th>
							<th>Alamat</th>
							<th>Anggota KK</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
						//ubah berdasarkan kk
						$no = 1;
						$sql = $koneksi->query("SELECT p.id_pend, p.alamat, k.id_kk, k.no_kk, k.kepala, k.alamat, k.desa, k.rt, k.rw, k.kec, k.kab, k.prov FROM tb_kk k left join tb_pdd p on p.id_pend = k.id_kk order by p.alamat");


						while ($data = $sql->fetch_assoc()) {
						?>
							<tr>
								<td>
									<?php echo $no++; ?>
								</td>
								<td>
									<?php echo $data['no_kk']; ?>
								</td>
								<td>
									<?php echo $data['kepala']; ?>
								</td>
								<td>
									<?php echo $data['alamat']; ?>, RT
									<?php echo $data['rt']; ?>
									/RW
									<?php echo $data['rw']; ?>, Desa
									<?php echo $data['desa']; ?>
								</td>
								<td>
									<a href="?page=anggota&kode=<?php echo $data['id_kk']; ?>" title="Anggota KK" class="btn btn-info btn-sm">
										<i class="fa fa-users"></i>
									</a>
								</td>
								<td>
									<a href="?page=edit-kartu&kode=<?php echo $data['id_kk']; ?>" title="Ubah" class="btn btn-success btn-sm">
										<i class="fa fa-edit"></i>
									</a>
									<a href="?page=del-kartu&kode=<?php echo $data['id_kk']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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
							<th>NO KK</th>
							<th>Kepala Keluarga</th>
							<th>Alamat</th>
							<th>Anggota KK</th>
						</tr>
					</thead>
					<tbody>

						<?php
						//ubah berdasarkan kk
						$no = 1;
						$sql = $koneksi->query("SELECT p.id_pend, p.alamat, k.id_kk, k.no_kk, k.kepala, k.alamat, k.desa, k.rt, k.rw, k.kec, k.kab, k.prov FROM tb_kk k left join tb_pdd p on p.id_pend = k.id_kk order by p.alamat");


						while ($data = $sql->fetch_assoc()) {
						?>
							<tr>
								<td>
									<?php echo $no++; ?>
								</td>
								<td>
									<?php echo $data['no_kk']; ?>
								</td>
								<td>
									<?php echo $data['kepala']; ?>
								</td>
								<td>
									<?php echo $data['alamat']; ?>, RT
									<?php echo $data['rt']; ?>
									/RW
									<?php echo $data['rw']; ?>, Desa
									<?php echo $data['desa']; ?>
								</td>
								<td>
									<a href="?page=anggota&kode=<?php echo $data['id_kk']; ?>" title="Anggota KK" class="btn btn-info btn-sm">
										<i class="fa fa-users"></i>
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
	<!-- /.card-body -->