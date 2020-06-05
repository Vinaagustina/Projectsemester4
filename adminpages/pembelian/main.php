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
date_default_timezone_set('asia/jakarta')
?>

<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3><small>Laporan Pembelian</small></h3>
			</div>
			</div>
		

		<div class="clearfix"></div>

		<div class="row">

		<form method="POST" action="">
		<div class="form-inline col-md-6 col-md-offset-6">
		<label for="tglbeli">Tanggal Pembelian</label>
		<input type="date" name="tglbeli" value="<?=isset($_POST['tglbeli']) ? date('Y-m-d', strtotime($_POST['tglbeli'])) : date('Y-m-d', time()) ?>" id="tglbeli" class="form-control">
		<button type="submit" name="cari" id="cari" class="btn btn-info" >Cari</button>
		</div>
		</form>
		<br>

						<table id="pembelian" class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>ID Pembelian</th>
									
									<th>ID Supplier</th>
									<th>Nama Supplier</th>
									<th>Tanggal Beli</th>
									<th>No Bukti</th>
									<th>Diskon</th>						

								</tr>
							</thead>
							<tbody>
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
								while ($data = mysqli_fetch_array($sql))
								{
								?>
								<tr>
								<th><?php echo $no++; ?></th>
								<td><?php echo $data['id_pembelian'];?></td>
								<td><?php echo $data['id_supplier'];?></td>
								<td><?php echo $data['nama_supplier'];?></td>
								<td><?php echo $data['tgl_beli'];?></td>
								<td><?php echo $data['no_bukti'];?></td>
								<th><?php echo $data['diskon'];?></th>
								
								
								
								

								</tr>

								<?php } ?>
							</tbody>
						</table>
	<div class="col-xs-12">
				<a href="<?php echo $admin_url; ?>pembelian/index.php?id_pembelian=<?php echo $data['id_pembelian'];?>">
				<button class="btn btn-primary">
					<i class="fa fa-print"></i> Print
				</button></a>
				<ul class="pagination pull-right">
				</ul>
				</div>	
</div>
<script>
	$(window).ready(function(){

		$('#pembelian').DataTable();
		$('#pembelian_filter').hide();
	})

</script>
<!-- /page content -->
<?php
include "../templates/footer.php";
}
?>