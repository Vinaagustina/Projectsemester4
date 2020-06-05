<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	
	// untuk menangkap variabel 'Nama_kategori' yang dikirim oleh form_tambah.php
	$id_pembelian = $_POST['id_pembelian'];
	$id_supplier = $_POST['id_supplier'];
	$nama_supplier=$_POST['nama_supplier'];
	$tgl_beli = $_POST['tgl_beli'];
		$no_bukti = $_POST['no_bukti'];
		$diskon = $_POST['diskon'];
	// query untuk menyimpan ke tabel anggota
	
	$querySimpan = mysqli_query($koneksi, "INSERT INTO beli (id_pembelian,id_supplier,nama_supplier, tgl_beli, no_bukti, diskon) VALUES ('$id_pembelian','$id_supplier','$nama_supplier','$tgl_beli','$no_bukti','$diskon')");

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
	if ($querySimpan) {
		echo "<script> alert('Data Pembelian Berhasil Masuk'); window.location = '$admin_url'+'masterpembelian/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
	} else {
		echo "<script> alert('Data Pembelian Gagal Dimasukkan'); window.location = '$admin_url'+'masterpembelian/form_tambah.php';</script>";
	}
?>