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
				<th>ID Pembelian</th>
				<th>ID Supplier</th>
				<th>Nama Supplier</th>
				<th>Tanggal Beli</th>
				<th>No Bukti</th>
				<th>Diskon</th>
				
			</tr>
			<?php 
			if(isset($_POST['cari']))
							{
								$date = trim($_POST['tglbeli']);
								$query = "SELECT * from beli where date(tgl_beli) = '$date' order by tgl_beli";

							}
							else
							{
								$query= "SELECT * from beli order by tgl_beli";
							}

								$sql=mysqli_query($koneksi, $query);
								$no= 1;
								while ($data = mysqli_fetch_array($sql)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['id_pembelian']; ?></td>
				<td><?php echo $data['id_supplier']; ?></td>
				<td><?php echo $data['nama_supplier']; ?></td>
				<td><?php echo $data['tgl_beli']; ?></td>
				<td><?php echo $data['no_bukti']; ?></td>
				<td><?php echo $data['diskon']; ?></td>
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