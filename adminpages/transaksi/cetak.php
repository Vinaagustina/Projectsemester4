<!DOCTYPE html>
<html>
<head>
	<title>LAPORAN DATA PEMBELIAN</title>
</head>
<body>
 
	<center>
 
		<h2>LAPORAN DATA PEMBELIAN</h2>
		
 
	</center>
 
	<?php 
	include "../../lib/koneksi.php";
	?>
 
	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
				<th>No Nota</th>
				<th>ID Transaksi</th>
				<th>ID Pasien</th>
				<th>Tanggal Penjualan</th>
				<th>Total Pembelian</th>

		</tr>
		<?php 
	if(isset($_POST['cari'])){
					$date=trim($_POST['tgl']);
					$query ="SELECT no_nota, kd_transaksi, id_pasien,  tgl_penjualan, total_pembelian FROM transaksi where date(tgl)='$date' GROUP BY no_nota ORDER BY id_transaksi DESC";
				}
				else
				{
					$query="SELECT no_nota, kd_transaksi, id_pasien,  tgl_penjualan, total_pembelian FROM transaksi GROUP BY no_nota ORDER BY id_transaksi DESC";
				}
							$sql=mysqli_query($koneksi, $query);
							$no = 1;
							while ($data = mysqli_fetch_array($sql)){
						?>
		<tr>
				<td><?php echo $no ?></td>
				<td><?php echo $data['no_nota']; ?></td>
				<td><?php echo $data['kd_transaksi']; ?></td>
				<td><?php echo $data['id_pasien']; ?></td>
				<td><?php echo $data['tgl_penjualan']; ?></td>
				<td><?php echo $data['total_pembelian']; ?></td>
			
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