<?php
include "../inc/koneksi.php";

if (isset($_POST['Cetak'])) {
	$id = $_POST['id_datang'];
}

$tanggal = date("m/y");
$tgl = date("d F Y");
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>CETAK SURAT BERTAMU</title>
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
		$sql_tampil = "SELECT d.id_datang, d.nik, d.nama_datang, d.jekel, d.tgl_datang, d.waktu, d.alamat_kunjung, d.alasan, p.nama, k.id_kk, k.alamat ,k.kepala from tb_datang d inner join tb_pdd p on d.pelapor=p.id_pend left join tb_kk k on d.id_kk=k.id_kk where id_datang ='$id'";

		$query_tampil = mysqli_query($koneksi, $sql_tampil);
		$no = 1;
		while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
		?>
	</center>

	<center>
		<h4>
			<u>SURAT KETERANGAN KUNJUNGAN</u>
		</h4>
		<h4>No.
			<?php echo $data['id_datang']; ?>/Ket.Kunjungan/
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
					<?php echo $data['nama_datang']; ?>
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
				<td>Tanggal / Waktu Kunjungan</td>
				<td>:</td>
				<td>
					<?php echo date("d F Y ", strtotime($data['tgl_datang'])); ?> /
					<?php echo $data['waktu']; ?> WIB
				</td>
			</tr>
			<tr>
				<td>Keluarga Yang Dikunjungi</td>
				<td>:</td>
				<td>
					Keluarga <?php echo $data['kepala']; ?>
				</td>
			</tr>
			<tr>
				<td>Alamat Berkunjung</td>
				<td>:</td>
				<td>
					<?php echo $data['alamat_kunjung']; ?>
				</td>
			</tr>
			<tr>
				<td>Alasan Berkunjung</td>
				<td>:</td>
				<td>
					<?php echo $data['alasan']; ?>
				</td>
			</tr>
			<tr>
				<td>Nama Pelapor</td>
				<td>:</td>
				<td>
					<?php echo $data['nama']; ?>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
	<p>Benar-benar berencana untuk berkunjung di Graha Chemco, Desa Simpangan, Kecamatan Cikarang Utara, Kabupaten Bekasi.</P>
	<p>Demikian Surat ini dibuat, agar dapat digunakan sebagaimana mestinya.</P>
	<br>
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