<?php
include "../inc/koneksi.php";

if (isset($_POST['Cetak'])) {
	$id = $_POST['id_mendu'];
}

$tanggal = date("m/y");
$tgl = date("d F Y");
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>CETAK SURAT KEMATIAN</title>
</head>

<body>
	<center>

		<h2>PEMERINTAH KABUPATEN BEKASI</h2>
		<h3>KECAMATAN CIKARANG UTARA
			<br>DESA SIMPANGAN<br>
			GRAHA CHEMCO
		</h3>
		<p>________________________________________________________________________</p>

		<?php
		$sql_tampil = "SELECT p.id_pend, p.nik, p.nama, p.tempat_lh, p.tgl_lh, p.jekel, p.alamat, p.desa, p.rt, p.rw, p.agama, p.pekerjaan, m.id_mendu from tb_mendu m inner join tb_pdd p on p.id_pend=m.id_pdd where id_mendu ='$id'";

		$query_tampil = mysqli_query($koneksi, $sql_tampil);
		$no = 1;
		while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
		?>
	</center>

	<center>
		<h4>
			<u>SURAT KETERANGAN KEMATIAN</u>
		</h4>
		<h4>No Surat :
			<?php echo $data['id_mendu']; ?>/Ket.Kematian/
			<?php echo $tanggal; ?>
		</h4>
	</center>
	<p>Yang bertanda tangan dibawah ini Ketua RW 008, Desa Simpangan, Kecamatan Cikarang Utara, Kabupaten Bekasi, dengan ini menerangkan
		bahwa :</P>
	<table>
		<tbody>
			<tr>
				<td>NIK</td>
				<td>:</td>
				<td>
					<?php echo $data['nik']; ?>
				</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>
					<?php echo $data['nama']; ?>
				</td>
			</tr>
			<tr>
				<td>Tempat / Tanggal Lahir</td>
				<td>:</td>
				<td>
					<?php echo date("d F Y", strtotime($data['tgl_lh'])); ?>
				</td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td>
					<?php echo $data['jekel']; ?>
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td>
					<?php echo $data['alamat']; ?>, RT
					<?php echo $data['rt']; ?> / RW
					<?php echo $data['rw']; ?>, Desa
					<?php echo $data['desa']; ?>
				</td>
			</tr>
			<tr>
				<td>Pekerjaan</td>
				<td>:</td>
				<td>
					<?php echo $data['pekerjaan']; ?>
				</td>
			</tr>
			<tr>
				<td>Agama</td>
				<td>:</td>
				<td>
					<?php echo $data['agama']; ?>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>

	<?php
	$sql_tampil = "SELECT m.tgl_mendu, m.waktu, m.sebab, m.tempat, m.makam, m.id_mendu from tb_mendu m inner join tb_pdd p on p.id_pend=m.id_pdd where id_mendu ='$id'";

	$query_tampil = mysqli_query($koneksi, $sql_tampil);
	$no = 1;
	while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
	?>
		<center>
			<p><b>DINYATAKAN TELAH MENINGGAL DUNIA</b></p>
		</center>
		<p>Pada :</P>
		<table>
			<tbody>
				<tr>
					<td>Hari / Tanggal</td>
					<td>:</td>
					<td>
						<?php echo date("l, d F Y", strtotime($data['tgl_mendu'])); ?>
					</td>
				</tr>
				<tr>
					<td>Pukul</td>
					<td>:</td>
					<td>
						<?php echo $data['waktu']; ?>
					</td>
				</tr>
				<tr>
					<td>Penyebab Kematian</td>
					<td>:</td>
					<td>
						<?php echo $data['sebab']; ?>
					</td>
				</tr>
				<tr>
					<td>Tempat Kejadian</td>
					<td>:</td>
					<td>
						<?php echo $data['tempat']; ?>
					</td>
				</tr>
				<tr>
					<td>Dimakamkan di</td>
					<td>:</td>
					<td>
						<?php echo $data['makam']; ?>
					</td>
				</tr>

			<?php } ?>
			</tbody>
		</table>

		<p>Demikian <b>surat keterangan kematian</b> ini dibuat dengan sebenar-benarnya agar dapat dipergunakan sebagaimana mestinya.</p>
		<br>
		<br>
		<br>
		<br>
		<p align="right">
			Cikarang Utara,
			<?php echo $tgl; ?>
			<br> Ketua RW Graha Chemco
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>(Sunardi Sunarto)
		</p>


		<script>
			window.print();
		</script>

</body>

</html>