<?php
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $id_pasien = $_GET['id_pasien'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM pasien WHERE id_pasien='$id_pasien'");
    if ($queryHapus) {
        echo "<script> alert('Data Pasien Berhasil Dihapus'); window.location = '$admin_url'+'masterpasien/main.php';</script>";
    } else {
        echo "<script> alert('Data Pasien Gagal Dihapus'); window.location = '$admin_url'+'masterpasien/main.php';</script>";

    }
?>