<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['level'])) {
    echo "<center>Untuk mengakses halaman, Anda harus login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
include "../../lib/config_web.php";
include "../../lib/koneksi.php";
include "../../lib/pagination.php";

include "../templates/header.php";
date_default_timezone_set('asia/jakarta');
?>

<div class="right_col" role="main">
	<div class="page-title">
		<div class="title_left">
			<h3>Data Transaksi</h3>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<form method="POST" action="">
		<div class="form-inline col-md-6 col-md-offset-6">
			<label for="tgl">Tanggal Transaksi</label>
			<input type="date" name="tgl" value="<?= isset($_POST['tgl']) ? date('Y-m-d', strtotime($_POST['tgl'])) : date('Y-m-d', time()) ?>" id="tgl" class="form-control">
			<button type="submit" name="cari" id="cari" class="btn btn-info">Cari</button>
		</div>
		</form>
	</div>
	<br>
	<table id="datatrs" class="table table-stripped">
		<thead>	
			<tr>
				<th>No.</th>
					<th>No Nota</th>
				<th>ID Transaksi</th>
				<th>ID Pasien</th>
			
				
				<th>Tanggal Penjualan</th>
				<th>Total Pembelian</th>
			</tr>
		</thead>
		<tbody>
		<?php
		if(isset($_POST['cari']))
		{
			$date = trim($_POST['tgl']);
			$query = "SELECT no_nota, kd_transaksi, id_pasien,  tgl_penjualan, total_pembelian FROM transaksi WHERE date(tgl_penjualan) = '$date' GROUP BY no_nota  ORDER BY tgl_penjualan";
		}
		else
		{
			$query = "SELECT * FROM transaksi GROUP BY no_nota ORDER BY tgl_penjualan";
		}
			$sql = mysqli_query($koneksi, $query);
			$no = 1;
			while ($data = mysqli_fetch_array($sql))
			{	
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
			$no++;
			}
		?>
		</tbody>
	</table>
		<div class="col-xs-12">
				<a href="<?php echo $admin_url; ?>transaksi/index.php?id_transaksi=<?php echo $data['id_transaksi'];?>">
				<button class="btn btn-primary">
					<i class="fa fa-print"></i> Print
				</button></a>
				<ul class="pagination pull-right">
				</ul>
				</div>
</div>
<script>
	$(window).ready(function(){
		$('#datatrs').DataTable();
		$('#datatrs_filter').hide();
	})
</script>
<?php
include "../templates/footer.php";
}
?>