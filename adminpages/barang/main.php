<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['level'])) {
    echo "<center>Untuk mengakses halaman, Anda harus login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
include "../../lib/config_web.php";
include "../../lib/koneksi.php";
include "../../lib/pagination.php";
//
// untuk mengetahui halaman keberapa yang sedang dibuka
// juga untuk men-set nilai default ke halaman 1 jika tidak ada
// data $_GET['page'] yang dikirimkan
$page = 1;
if (isset($_GET['page']) && !empty($_GET['page']))
	$page = (int)$_GET['page'];

// untuk mengetahui berapa banyak data yang akan ditampilkan
// juga untuk men-set nilai default menjadi 5 jika tidak ada
// data $_GET['perPage'] yang dikirimkan
$dataPerPage = 5;
if (isset($_GET['perPage']) && !empty($_GET['perPage']))
	$dataPerPage = (int)$_GET['perPage'];

// tabel yang akan diambil datanya
$table = 'barang';

// ambil data
$dataTable = getTableData($koneksi, $table, $page, $dataPerPage);

include "../templates/header.php";
?>

<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3><small>Laporan Data Barang</small></h3>
			
</div>
		
			

		<div class="clearfix"></div>

		<div class="row">

			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><small>Data Barang</small></h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">

						<table class="table table-striped" id="barang">
							<thead>
								<tr>
									<th>No</th>
									<th>Id Barang</th>
									<th>Nama Barang</th>
									<th>Harga Beli</th>
									<th>Harga Jual Satuan</th>
									<th>Stok</th>					

								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($dataTable as $i => $data)
								{
								$no = ($i + 1) + (($page - 1) * $dataPerPage);
								?>
								<tr>
									<th scope="row"><?php echo $no; ?></th>
									<td><?php echo $data['id_barang'];?></td>
									<td><?php echo $data['nama_barang'];?></td>
									<td><?php echo $data['harga_beli'];?></td>
									<td><?php echo $data['harga_jualsatuan'];?></td>
									<td><?php echo $data['stok'];?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
			<div class="col-xs-12">
				<a href="<?php echo $admin_url; ?>barang/index.php?id_barang=<?php echo $data['id_barang'];?>">
				<button class="btn btn-primary">
					<i class="fa fa-print"></i> Print
				</button></a>
				<ul class="pagination pull-right">

	<?php showPagination($koneksi, $table, $dataPerPage); ?>
</ul>
			</div>
			</div>
			<div class="clearfix"></div>

		</div>
	</div>
</div>

<script>
<!-- /page content -->
<?php
include "../templates/footer.php";
}
?>