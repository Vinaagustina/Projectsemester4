<!DOCTYPE html>
<html>
<head>
	<title>LAPORAN DATA PASIEN </title>
</head>
<body>
 
	<center>
 
		<h2>LAPORAN DATA PASIEN</h2>
 
 
		<?php 
		include "../../lib/koneksi.php";
		?>
 
		<table border="1">
			<tr>
				<th>No</th>
				<th>ID Pasien</th>
				<th>Nama Pasien</th>
				<th>Alamat Pasien</th>
				<th>No Telfon</th>
				<th>Keluhan</th>
							</tr>
			<?php 
			$no = 1;
			$sql = mysqli_query($koneksi,"select * from pasien");
			while($data = mysqli_fetch_array($sql)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['id_pasien']; ?></td>
				<td><?php echo $data['nama_pasien']; ?></td>
				<td><?php echo $data['alamat_pasien']; ?></td>
				<td><?php echo $data['no_telp']; ?></td>
				<td><?php echo $data['keluhan']; ?></td>
			
			</tr>
			<?php 
			}
			?>
		</table>
 
		<br/>
 
		<a href="cetak.php" target="_blank">CETAK</a>
 
 
	</center>
</body>
</html>