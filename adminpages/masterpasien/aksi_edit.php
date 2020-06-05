<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'id_barang' dan 'id_barang' yang dikirim oleh form_edit.php
	$id_pasien = $_POST['id_pasien'];
	$nama_pasien = $_POST['nama_pasien'];
	$alamat_pasien = $_POST['alamat_pasien'];
	$no_telp = $_POST['no_telp'];
	$keluhan = $_POST['keluhan'];
	
	// query untuk mengubah ke tabel tbl barang
	
	$querySimpan = mysqli_query($koneksi, "UPDATE pasien SET id_pasien='$id_pasien',nama_pasien='$nama_pasien', alamat_pasien='$alamat_pasien', no_telp='$no_telp', keluhan='$keluhan' WHERE id_pasien='$id_pasien'");

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar anggota
	if ($querySimpan) {
		echo "<script> alert('Data Pasien Berhasil Diubah'); window.location = '$admin_url'+'masterpasien/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form edit anggota
	} else {
		echo "<script> alert('Data Pasien Gagal Diubah'); window.location = '$admin_url'+'masterpasien/form_edit.php?id_pasien=$id_pasien';</script>";
	}
?>