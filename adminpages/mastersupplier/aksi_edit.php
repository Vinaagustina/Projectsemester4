<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'id_supplier' dan 'id_supplier' yang dikirim oleh form_edit.php
	$id_supplier = $_POST['id_supplier'];
	$nama_supplier = $_POST['nama_supplier'];
	$alamat_supplier = $_POST['alamat_supplier'];
	$telpon = $_POST['telpon'];
	
	// query untuk mengubah ke tabel tbl barang
	
	$querySimpan = mysqli_query($koneksi, "UPDATE supplier SET id_supplier='$id_supplier',nama_supplier='$nama_supplier', alamat_supplier='$alamat_supplier', telpon='$telpon' WHERE id_supplier='$id_supplier'");

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar anggota
	if ($querySimpan) {
		echo "<script> alert('Data Supplier Berhasil Diubah'); window.location = '$admin_url'+'mastersupplier/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form edit anggota
	} else {
		echo "<script> alert('Data Supplier Gagal Diubah'); window.location = '$admin_url'+'mastersupplier/form_edit.php?id_supplier=$id_supplier';</script>";
	}
?>