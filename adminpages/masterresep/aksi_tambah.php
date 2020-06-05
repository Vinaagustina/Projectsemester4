<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	
	// untuk menangkap variabel 'Nama_kategori' yang dikirim oleh form_tambah.php
	$id_resep = $_POST['id_resep'];
	$id_pasien = $_POST['id_pasien'];
	$nama_pasien = $_POST['nama_pasien'];
	$alamat_pasien = $_POST['alamat_pasien'];
	$keluhan= $_POST['keluhan'];
	$nama_obat = $_POST['nama_obat'];
	$jml_obat = $_POST['jml_obat'];
	$aturan_pakai = $_POST['aturan_pakai'];
	$harga = $_POST['harga'];

	
	// query untuk menyimpan ke tabel anggota
	
	$querySimpan = mysqli_query($koneksi, "INSERT INTO resep (id_resep,id_pasien, nama_pasien, alamat_pasien, keluhan, nama_obat, jml_obat, aturan_pakai,harga) VALUES ('$id_resep','$id_pasien','$nama_pasien','$alamat_pasien','$keluhan','$nama_obat', '$jml_obat','$aturan_pakai', '$harga')");

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
	if ($querySimpan) {
		echo "<script> alert('Data Resep Berhasil Masuk'); window.location = '$admin_url'+'masterresep/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
	} else {
		echo "<script> alert('Data Resep Gagal Dimasukkan'); window.location = '$admin_url'+'masterresep/form_tambah.php';</script>";
	}
?>