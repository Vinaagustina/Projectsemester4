<!DOCTYPE html>
<html>
<head>
	<title>LAPORAN DATA RESEP </title>
</head>
<body>
 
	<center>
 
		<h2>LAPORAN DATA RESEP</h2>
 
 
		<?php 
		include "../../lib/koneksi.php";
		?>
 
		<table border="1">
			<tr>
				<th>No</th>
				<th>ID Resep</th>
				<th>ID Pasien</th>
				<th>Nama Pasien</th>
				<th>Alamat Pasien</th>
				<th>Nama Obat</th>
				<th>Jumlah Obat</th>
				<th>Aturan Pakai</th>
				<th>Harga</th>
				<th>Nama Dokter</th>
				<th>Alamat Dokter</th>
				<th>Keterangan</th>
			</tr>
			<?php 
			$no = 1;
			$sql = mysqli_query($koneksi,"select * from resep");
			while($data = mysqli_fetch_array($sql)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['id_resep']; ?></td>
				<td><?php echo $data['id_pasien']; ?></td>
				<td><?php echo $data['nama_pasien']; ?></td>
				<td><?php echo $data['alamat_pasien']; ?></td>
				<td><?php echo $data['nama_obat']; ?></td>
				<td><?php echo $data['jml_obat']; ?></td>
				<td><?php echo $data['aturan_pakai']; ?></td>
				<td><?php echo $data['harga']; ?></td>
				<td><?php echo $data['nama_dokter']; ?></td>
				<td><?php echo $data['alamat_dokter']; ?></td>
				<td><?php echo $data['keterangan']; ?></td>
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