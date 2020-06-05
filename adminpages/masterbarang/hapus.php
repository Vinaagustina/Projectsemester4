<?php
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $id_barang = $_GET['id_barang'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang='$id_barang'");
    if ($queryHapus) {
        echo "<script> alert('Data Barang Berhasil Dihapus'); window.location = '$admin_url'+'masterbarang/main.php';</script>";
    } else {
        echo "<script> alert('Data Barang Gagal Dihapus'); window.location = '$admin_url'+'masterbarang/main.php';</script>";

    }
?>