<?php

include "config.php";

$id_customer = $_GET['id_customer'];
// $ekspedisi = $_POST['pengiriman'];
// $bank = $_POST['bank'];




function isi_keranjang()
{
    include "config.php";
    $id_customer = $_GET['id_customer'];
session_start();
if(!isset($_SESSION['id_session'])){
    $ids = date("YmdHis");
    $_SESSION['id_session'] = $ids;
}

    $isikeranjang = array();
    $id_session=$_SESSION['id_session'];
    $sql = $connect->query("SELECT * FROM keranjang_telepon WHERE id_session='$id_session' AND id_customer='$id_customer'");

    while ($r = mysqli_fetch_array($sql)) {
        $isikeranjang[] = $r;
    }
    return $isikeranjang;
}



$isikeranjang = isi_keranjang();
$jml = count($isikeranjang);


if ($jml == 0) {
    echo "<script> alert('Product masih kosong'); location.href='index.php?hal=via_telpon' </script>";
    exit();
}

//$tgl_skrg = date("Y-m-d");
$jam_skrg = date("H:i:s");


// simpan data pemesanan

//exit();
// mendapatkan nomor orders

// TIMEZONE
// date_default_timezone_set("Asia/Jakarta");
// $date= date("ymd");

// // mencari kode barang dengan nilai paling besar
// $query = "SELECT max(id_orders) as maxKode FROM order_telepon";
// $hasil = $connect->query($query);
// $data = mysqli_fetch_array($hasil);
// $kodePesan = $data['maxKode'];
 
// // mengambil angka atau bilangan dalam kode anggota terbesar,
// // dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// // misal 'BRG001', akan diambil '001'
// // setelah substring bilangan diambil lantas dicasting menjadi integer
// $noUrut = (int) substr($kodePesan, 9, 3);
 
// // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
// $noUrut++;
 
// // membentuk kode anggota baru
// // perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// // misal sprintf("%03s", 12); maka akan dihasilkan '012'
// // atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
// $char = "PSN";
// // $tahun=substr($date, 0, 4);
// // $bulan=substr($date, 5, 2);
// // $hari=substr($date, 6, 2);
// $kodePesanan = $char.$date.sprintf("%03s", $noUrut);

// $id_orders = $kodePesanan;
// panggil fungsi isi_keranjang dan hitung jumlah produk yang dipesan


$jam_skrg = date("H:i:s");
// simpan data detail pemesanan
for ($i = 0; $i < $jml; $i++) {

    $connect->query("INSERT INTO order_telepon(id_orders, product_id, jumlah, id_customer , id_ekspedisi, bank ,tgl_order, jam_order, status) 
                   VALUES('',{$isikeranjang[$i]['id_barang']}, {$isikeranjang[$i]['qty']}, '$id_customer', '', '', NOW(), '$jam_skrg', 0)");

    // $connect->query("UPDATE barang SET stock=stock - {$isikeranjang[$i]['qty']} WHERE id={$isikeranjang[$i]['id_barang']}");
    


}
//exit();
for ($i = 0; $i < $jml; $i++) {

    $connect->query("UPDATE keranjang_telepon SET status = 1 WHERE id_keranjang = {$isikeranjang[$i]['id_keranjang']}");
}

echo "<script>
        alert('Pesanan Berhasil Disimpan'); location.href='index.php?hal=via_telpon';
</script>";
// die;
// exit();


