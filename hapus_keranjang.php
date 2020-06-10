<?php
include "config.php";
$hapus=$_GET['hapus'];
$id_session=$_GET['id_session'];
$query_hapus=$connect->query("DELETE FROM keranjang where id_keranjang='$hapus'");
if(!$query_hapus){
	?>
	<script> alert('Data Berhasil Di Simpan'); location.href='index.php?hal=master/barang/list' </script>
	<?php
}else{
	header("location:index.php?hal=beli_langsung");
}
?>