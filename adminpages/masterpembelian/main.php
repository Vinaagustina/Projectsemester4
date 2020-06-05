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
$table = 'beli';

// ambil data
$dataTable = getTableData($koneksi, $table, $page, $dataPerPage);

include "../templates/header.php";
?>

<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3><small>Master Pembelian</small></h3>
			</div>


		<div class="clearfix"></div>

		<div class="row">

			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><small>Data Pembelian</small></h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">

						<table class="table table-striped" id="supplier">
							<thead>
								<tr>
									<th>No</th>
									<th>Id Pembelian</th>
									<th>Id Supplier</th>
									<th>Nama Supplier</th>
									<th>Tanggal Beli</th>
									<th>No Bukti</th>
									<th>Diskon</th>
									
									
									<th style="width: 150px;">Aksi</th>

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
								<td><?php echo $data['id_pembelian'];?></td>
								<td><?php echo $data['id_supplier'];?></td>
								<td><?php echo $data['nama_supplier'];?></td>
								<td><?php echo $data['tgl_beli'];?></td>
								<td><?php echo $data['no_bukti'];?></td>
								<td><?php echo $data['diskon'];?></td>
								
								
								<td><a href="<?php echo $admin_url; ?>masterpembelian/form_edit.php?id_pembelian=<?php echo $data['id_pembelian'];?>">
								<button class="btn btn-warning">
									<i class="fa fa-edit"></i>
								</button></a>
								
								<a href="<?php echo $admin_url; ?>masterpembelian/hapus.php?id_pembelian=<?php echo $data['id_pembelian'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')">
								
								<button class="btn btn-danger">
									<i class="fa fa-remove"></i>
								</button></a></td>

								</tr>

								<?php } ?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
			<div class="col-xs-12">
				<a href="<?php echo $admin_url; ?>masterpembelian/form_tambah.php">
				<button class="btn btn-primary">
					<i class="fa fa-plus"></i> Tambah
				</button></a>
				<ul class="pagination pull-right">

	<?php showPagination($koneksi, $table, $dataPerPage); ?>
</ul>
			
			</div>
			<div class="clearfix"></div>

		</div>
	</div>
</div>

<script>
$(window).ready(function(){
	$('#supplier').DataTable()


})

</script>
<!-- /page content -->
<?php
include "../templates/footer.php";
}
?>