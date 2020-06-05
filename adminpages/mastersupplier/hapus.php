<?php
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $id_supplier = $_GET['id_supplier'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM supplier WHERE id_supplier='$id_supplier'");
    if ($queryHapus) {
        echo "<script> alert('Data Supplier Berhasil Dihapus'); window.location = '$admin_url'+'mastersupplier/main.php';</script>";
    } else {
        echo "<script> alert('Data Supplier Gagal Dihapus'); window.location = '$admin_url'+'mastersupplier/main.php';</script>";

    }
?>