<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'id_barang' dan 'id_barang' yang dikirim oleh form_edit.php
	$id_resep = $_POST['id_resep'];
	$id_pasien = $_POST['id_pasien'];
	$nama_pasien = $_POST['nama_pasien'];
	$alamat_pasien = $_POST['alamat_pasien'];
	$keluhan= $_POST['keluhan'];
	$nama_obat = $_POST['nama_obat'];
	$jml_obat = $_POST['jml_obat'];
	$aturan_pakai = $_POST['aturan_pakai'];
	$harga = $_POST['harga'];
	
	
	// query untuk mengubah ke tabel tbl barang
	
	$querySimpan = mysqli_query($koneksi, "UPDATE resep SET id_resep='$id_resep',id_pasien='$id_pasien', nama_pasien='$nama_pasien', alamat_pasien='$alamat_pasien',keluhan='$keluhan', nama_obat='$nama_obat', jml_obat='$jml_obat', aturan_pakai='$aturan_pakai', harga='$harga' WHERE id_resep='$id_resep'");

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar anggota
	if ($querySimpan) {
		echo "<script> alert('Data Resep Berhasil Diubah'); window.location = '$admin_url'+'masterresep/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form edit anggota
	} else {
		echo "<script> alert('Data Resep Gagal Diubah'); window.location = '$admin_url'+'masterresep/form_edit.php?id_resep=$id_resep';</script>";
	}
?>