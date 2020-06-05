<?php
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $id_resep = $_GET['id_resep'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM resep WHERE id_resep='$id_resep'");
    if ($queryHapus) {
        echo "<script> alert('Data Resep Berhasil Dihapus'); window.location = '$admin_url'+'masterresep/main.php';</script>";
    } else {
        echo "<script> alert('Data Resep Gagal Dihapus'); window.location = '$admin_url'+'masterresep/main.php';</script>";

    }
?>