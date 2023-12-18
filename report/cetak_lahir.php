<?php
include "../inc/koneksi.php";

if (isset($_POST['Cetak'])) {
	$id = $_POST['lahir'];
}

$tanggal = date("m/y");
$tgl = date("d F Y");
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>CETAK SURAT</title>
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
		$sql_tampil = "select * from tb_lahir where id_lahir='$id'";
		$query_tampil = mysqli_query($koneksi, $sql_tampil);
		$no = 1;
		while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
		?>
	</center>

	<center>
		<h4>
			<u>SURAT KETERANGAN KELAHIRAN</u>
		</h4>
		<h4>No.
			<?php echo $data['id_lahir']; ?>/Ket.Kelahiran/
			<?php echo $tanggal; ?>
		</h4>
	</center>
	<p>Yang bertanda tangan dibawah ini menerangkan bahwa pada :</P>
	<table>
		<tbody>
			<tr>
				<td>Hari</td>
				<td>:</td>
				<td>
					<?php echo date("l ", strtotime($data['tgl_lh'])); ?>
				</td>
			</tr>
			<tr>
				<td>Tanggal</td>
				<td>:</td>
				<td>
					<?php echo date("d F Y ", strtotime($data['tgl_lh'])); ?>
				</td>
			</tr>
			<tr>
				<td>Di</td>
				<td>:</td>
				<td>
					<?php echo $data['tempat_lh']; ?>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>

	<?php
		$sql_tampil = "SELECT l.nama, l.jekel, l.ibu, l.anak, k.kepala FROM tb_lahir l LEFT JOIN tb_kk k ON l.id_kk = k.id_kk where id_lahir='$id'";
		$query_tampil = mysqli_query($koneksi, $sql_tampil);
		$no = 1;
		while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
		?>

	<p>Telah lahir seorang anak <?php echo $data['jekel']; ?></P>
	<table>
		<tbody>
			<tr>
				<td>Bernama</td>
				<td>:</td>
				<td>
					<?php echo $data['nama']; ?>
				</td>
			</tr>
			<tr>
				<td>Dari seorang Ibu bernama</td>
				<td>:</td>
				<td>
					<?php echo $data['ibu']; ?>
				</td>
			</tr>

			<tr>
				<td>Istri dari</td>
				<td>:</td>
				<td>
					<?php echo $data['kepala']; ?>
				</td>
			</tr>
			<tr>
				<td>Anak ke</td>
				<td>:</td>
				<td>
					<?php echo $data['anak']; ?>
				</td>
			</tr>

		<?php } ?>
		</tbody>
	</table>
	
	<p>Demikian, surat keterangan ini dibuat atas dasar yang sebenarnya</P>
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