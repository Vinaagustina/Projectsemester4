<!DOCTYPE html>
<html>
<head>
	<title>LAPORAN DATA SUPPLIER</title>
</head>
<body>
 
	<center>
 
		<h2>LAPORAN DATA SUPPLIER</h2>
 
 
		<?php 
		include "../../lib/koneksi.php";
		?>
 
		<table border="1">
			<tr>
				<th>No</th>
				<th>ID Supplier</th>
				<th>Nama Supplier</th>
				<th>Alamat Supplier</th>
				<th>No Telfon</th>
				
			</tr>
			<?php 
			$no = 1;
			$sql = mysqli_query($koneksi,"select * from supplier");
			while($data = mysqli_fetch_array($sql)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['id_supplier']; ?></td>
				<td><?php echo $data['nama_supplier']; ?></td>
				<td><?php echo $data['alamat_supplier']; ?></td>
				<td><?php echo $data['telfon']; ?></td>
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