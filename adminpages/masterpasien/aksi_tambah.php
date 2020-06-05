<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	
	// untuk menangkap variabel 'Nama_kategori' yang dikirim oleh form_tambah.php
	$id_pasien = $_POST['id_pasien'];
	$nama_pasien = $_POST['nama_pasien'];
	$alamat_pasien = $_POST['alamat_pasien'];
	$no_telp = $_POST['no_telp'];
	$keluhan = $_POST['keluhan'];
	
	// query untuk menyimpan ke tabel anggota
	
	$querySimpan = mysqli_query($koneksi, "INSERT INTO pasien (id_pasien,nama_pasien, alamat_pasien, no_telp, keluhan) VALUES ('$id_pasien','$nama_pasien','$alamat_pasien','$no_telp', '$keluhan')");

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
	if ($querySimpan) {
		echo "<script> alert('Data Pasien Berhasil Masuk'); window.location = '$admin_url'+'masterpasien/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
	} else {
		echo "<script> alert('Data Pasien Gagal Dimasukkan'); window.location = '$admin_url'+'masterpasien/form_tambah.php';</script>";
	}
?>