<!DOCTYPE html>
<html>
<head>
	<title>LAPORAN DATA BARANG</title>
</head>
<body>
 
	<center>
 
		<h2>LAPORAN DATA BARANG</h2>
		
 
	</center>
 
	<?php 
	include "../../lib/koneksi.php";
	?>
 
	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
			<th>ID Barang</th>
			<th>Nama Barang</th>
			<th>Harga Beli</th>
			<th>Harga Jual Satuan</th>
			<th>Stok</th>
		</tr>
		<?php 
		$no = 1;
		$sql = mysqli_query($koneksi,"select * from barang");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['id_barang']; ?></td>
			<td><?php echo $data['nama_barang']; ?></td>
			<td><?php echo $data['harga_beli']; ?></td>
			<td><?php echo $data['harga_jualsatuan']; ?></td>
			<td><?php echo $data['stok']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
 
	<script>
		window.print();
	</script>
 
</body>
</html>