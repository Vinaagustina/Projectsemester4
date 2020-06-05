<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	
	// untuk menangkap variabel 'Nama_kategori' yang dikirim oleh form_tambah.php
	$id_supplier = $_POST['id_supplier'];
	$nama_supplier = $_POST['nama_supplier'];
	$alamat_supplier = $_POST['alamat_supplier'];
	$telpon = $_POST['telpon'];
	
	// query untuk menyimpan ke tabel anggota
	
	$querySimpan = mysqli_query($koneksi, "INSERT INTO supplier (id_supplier,nama_supplier, alamat_supplier, telpon) VALUES ('$id_supplier','$nama_supplier','$alamat_supplier','$telpon')");

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
	if ($querySimpan) {
		echo "<script> alert('Data Supplier Berhasil Masuk'); window.location = '$admin_url'+'mastersupplier/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
	} else {
		echo "<script> alert('Data Supplier Gagal Dimasukkan'); window.location = '$admin_url'+'mastersupplier/form_tambah.php';</script>";
	}
?>