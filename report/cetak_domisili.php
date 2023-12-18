<?php
	include "../inc/koneksi.php";
	
	if (isset ($_POST['btnCetak'])){
	$id = $_POST['id_pend'];
	}

	$tanggal = date("m/y");
	$tgl = date("d F Y");
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Cetak Surat Domisili</title>
</head>

<body>
	<center>

		<h2>PEMERINTAH KABUPATEN BEKASI</h2>
		<h3>KECAMATAN CIKARANG UTARA
			<br>DESA SIMPANGAN<br> 
				GRAHA CHEMCO</h3>
		<p>________________________________________________________________________</p>

		<?php
			$sql_tampil = "select * from tb_pdd where id_pend ='$id'";
			
			$query_tampil = mysqli_query($koneksi, $sql_tampil);
			$no=1;
			while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
		?>
	</center>

	<center>
		<h4>
			<u>SURAT KETERANGAN DOMISILI</u>
		</h4>
		<h4>No.
			<?php echo $data['id_pend']; ?>/Ket.Domisili/
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
				<td>Tempat/Tanggal Lahir</td>
				<td>:</td>
				<td>
					<?php echo $data['tempat_lh']; ?>/
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
				<td>Agama</td>
				<td>:</td>
				<td>
					<?php echo $data['agama']; ?>
				</td>
			</tr>
			<tr>
				<td>Status Perkawinan</td>
				<td>:</td>
				<td>
					<?php echo $data['kawin']; ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<p>Adalah benar-benar warga Desa Simpangan<?php ?>, Kecamatan Cikarang Utara, Kabupaten Bekasi</p>
	<p>Demikian surat ini dibuat, agar dapat digunakan sebagai mana mestinya.</p>
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