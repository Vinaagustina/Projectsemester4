<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'id_supplier' dan 'id_supplier' yang dikirim oleh form_edit.php
	$id_pembelian=$_POST['id_pembelian'];
	$id_supplier = $_POST['id_supplier'];
	$nama_supplier= $_POST['nama_supplier'];
	$tgl_beli = $_POST['tgl_beli'];
	$no_bukti = $_POST['no_bukti'];
	$diskon = $_POST['diskon'];
	
	// query untuk mengubah ke tabel tbl barang
	
	$querySimpan = mysqli_query($koneksi, "UPDATE beli SET id_pembelian='$id_pembelian', id_supplier='$id_supplier',nama_supplier='$nama_supplier',tgl_beli='$tgl_beli', no_bukti='$no_bukti', diskon='$diskon' WHERE id_pembelian='$id_pembelian'");

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar anggota
	if ($querySimpan) {
		echo "<script> alert('Data Pembelian Berhasil Diubah'); window.location = '$admin_url'+'masterpembelian/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form edit anggota
	} else {
		echo "<script> alert('Data Pembelian Gagal Diubah'); window.location = '$admin_url'+'masterpembelian/form_edit.php?id_pembelian=$id_pembelian';</script>";
	}
?>