<?php
include "config.php";
$hapus=$_GET['hapus'];
$id_session=$_GET['id_session'];
$id_customer=$_GET['id_customer'];
$query_hapus=$connect->query("DELETE FROM keranjang where id_keranjang='$hapus'");
if(!$query_hapus){
	?>
	<script> alert('Gagal'); location.href='index.php?hal=via_telpon_pilih' </script>
	<?php
}else{
	header("location:index.php?hal=via_telpon_pilih?id_customer=<?=$id_customer;?>");
}
?>