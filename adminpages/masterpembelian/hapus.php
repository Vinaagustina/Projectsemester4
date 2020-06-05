<?php
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $id_pembelian = $_GET['id_pembelian'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM pembelian WHERE id_pembelian='$id_pembelian'");
    if ($queryHapus) {
        echo "<script> alert('Data Beli Berhasil Dihapus'); window.location = '$admin_url'+'masterpembelian/main.php';</script>";
    } else {
        echo "<script> alert('Data Beli Gagal Dihapus'); window.location = '$admin_url'+'masterpembelian/main.php';</script>";

    }
?>