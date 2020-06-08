<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	
	// untuk menangkap variabel 'Nama_kategori' yang dikirim oleh form_tambah.php
	$id_barang = $_POST['id_barang'];
	$id_pembelian= $_POST['id_pembelian'];
	$nama_barang = $_POST['nama_barang'];
	$harga_beli = $_POST['harga_beli'];
	$harga_jualsatuan = $_POST['harga_jualsatuan'];
	$stok = $_POST['stok'];
	
	print_r($_POST);
	exit();
	// query untuk menyimpan ke tabel anggota
	
	$querySimpan = mysqli_query($koneksi, "INSERT INTO barang VALUES ('$id_barang','$id_pembelian','$nama_barang','$harga_beli','$harga_jualsatuan', '$stok')");

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
	if ($querySimpan) {
		echo "<script> alert('Data Barang Berhasil Masuk'); window.location = '$admin_url'+'masterbarang/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
	} else {
		echo "<script> alert('Data Barang Gagal Dimasukkan'); window.location = '$admin_url'+'masterbarang/form_tambah.php';</script>";
	}
?>