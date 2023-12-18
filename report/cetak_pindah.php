<?php
include "../inc/koneksi.php";

if (isset($_POST['Cetak'])) {
	$id = $_POST['id_pend'];
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
		$sql_tampil = "SELECT p.id_pend, p.nik, p.nama, d.tgl_pindah, d.alasan, d.alamat_sekarang, d.alamat_pindah, d.id_pindah, k.no_kk, k.kepala from tb_pindah d inner join tb_pdd p on p.id_pend=d.id_pdd left join tb_kk k on d.id_kk=k.id_kk where status='Pindah' and id_pend ='$id'";

		$query_tampil = mysqli_query($koneksi, $sql_tampil);
		$no = 1;
		while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
		?>
	</center>

	<center>
		<h4>
			<u>SURAT KETERANGAN PINDAH</u>
		</h4>
		<h4>No.
			<?php echo $data['id_pend']; ?>/Ket.Pindah/
			<?php echo $tanggal; ?>
		</h4>
	</center>
	<p>Yang bertanda tangan dibawah ini Ketua RW 008, Desa Simpangan, Kecamatan Cikarang Utara, Kabupaten Bekasi, dengan ini menerangkan permohonan perpindahan penduduk
		sebagai berikut :</P>
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
				<td>No. Kartu Keluarga / Kepala Keluarga</td>
				<td>:</td>
				<td>
					<?php echo $data['no_kk']; ?> /
					<?php echo $data['nama']; ?>
				</td>
			</tr>
			<tr>
				<td>Tanggal Perpindahan Penduduk</td>
				<td>:</td>
				<td>
					<?php echo date("d F Y", strtotime($data['tgl_pindah'])); ?>
				</td>
			</tr>
			<tr>
				<td>Alamat Sekarang</td>
				<td>:</td>
				<td>
					<?php echo $data['alamat_sekarang']; ?>
				</td>
			</tr>
			<tr>
				<td>Alamat Tujuan Pindah</td>
				<td>:</td>
				<td>
					<?php echo $data['alamat_pindah']; ?>
				</td>
			</tr>
			<tr>
				<td>Alasan</td>
				<td>:</td>
				<td>
					<?php echo $data['alasan']; ?>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
	<p>Adapun permohonan pindah penduduk yang bersangkutan sebagaimana terlampir.</P>
	<p>Demikian surat ini dibuat, agar dapat digunakan sebagai mana mestinya.</P>
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