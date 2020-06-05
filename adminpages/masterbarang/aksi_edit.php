<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'id_barang' dan 'id_barang' yang dikirim oleh form_edit.php
	$id_barang = $_POST['id_barang'];
	$id_pembelian=$_POST['id_pembelian'];
	$nama_barang = $_POST['nama_barang'];
	$harga_beli = $_POST['harga_beli'];
	$harga_jualsatuan = $_POST['harga_jualsatuan'];
	$stok = $_POST['stok'];
	
	// query untuk mengubah ke tabel tbl barang
	
	$querySimpan = mysqli_query($koneksi, "UPDATE barang SET id_barang='$id_barang',id_pembelian='$id_pembelian',nama_barang='$nama_barang', harga_beli='$harga_beli', harga_jualsatuan='$harga_jualsatuan', stok='$stok' WHERE id_barang='$id_barang'");

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar anggota
	if ($querySimpan) {
		echo "<script> alert('Data Barang Berhasil Diubah'); window.location = '$admin_url'+'masterbarang/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form edit anggota
	} else {
		echo "<script> alert('Data Barang Gagal Diubah'); window.location = '$admin_url'+'masterbarang/form_edit.php?id_barang=$id_barang';</script>";
	}
?>