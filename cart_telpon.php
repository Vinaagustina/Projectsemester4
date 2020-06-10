<?php
include "config.php";
include "tanggal.php";

$input=$_GET['input'];
$id_session=$_GET['id_session'];
$id_barang=$_GET['id_barang'];
$id_customer = $_GET['id_customer'];



if($input=="add"){
    $sid = session_id();
    $sql = $connect->query("SELECT stock FROM barang WHERE id='$id_barang'");
    $s = mysqli_fetch_array($sql);
    $stok = $s['stock']; 
    //echo $stok; exit();

    if ($stok == 0) {
         echo "<script> alert('stock habis'); location.href='index.php?hal=beli_langsung' </script>";
         exit();
    } else {
    $query=$connect->query("SELECT id_barang, qty FROM keranjang_telepon WHERE id_barang='$id_barang' AND id_session='$id_session' AND id_customer='$id_customer' ");
    $data_tmp=mysqli_fetch_array($query);
    $cek=mysqli_num_rows($query);
    $qty = $data_tmp['qty'];
    

    if($cek==0){
        $connect->query("INSERT INTO keranjang_telepon (id_keranjang, id_barang, id_session, id_customer, tgl_keranjang, jam_keranjang, qty) VALUES ('', '$id_barang', '$id_session', '$id_customer', '$tgl_sekarang', '$jam_sekarang',1)");
    }
    else if($qty >= $stok){

        echo "<script> alert('Stock yang tersedia tidak cukup'); location.href='index.php?hal=beli_langsung' </script>";
                exit();
    }
    else{
        $connect->query("UPDATE keranjang_telepon SET qty=qty+1 where id_session='$id_session' and id_barang='$id_barang' AND id_customer='$id_customer'");
    }
    header("location:index.php?hal=via_telpon_pilih&id_customer='$id_barang'");
    }
}