<?php


include "config.php";

$id_customer = $_POST['id_customer'];
$ekspedisi = $_POST['pengiriman'];
$bank = $_POST['bank'];




function isi_keranjang()
{
	include "config.php";
	$id_customer = $_POST['id_customer'];
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
    echo "<script> alert('Product masih kosong'); location.href='index.php?hal=beli_langsung' </script>";
    exit();
}

//$tgl_skrg = date("Y-m-d");
$jam_skrg = date("H:i:s");


// simpan data pemesanan

//exit();
// mendapatkan nomor orders

// TIMEZONE
date_default_timezone_set("Asia/Jakarta");
$date= date("ymd");

// mencari kode barang dengan nilai paling besar
$query = "SELECT max(id_orders) as maxKode FROM order_telepon";
$hasil = $connect->query($query);
$data = mysqli_fetch_array($hasil);
$kodePesan = $data['maxKode'];
 
// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kodePesan, 9, 3);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;
 
// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "PSN";
// $tahun=substr($date, 0, 4);
// $bulan=substr($date, 5, 2);
// $hari=substr($date, 6, 2);
$kodePesanan = $char.$date.sprintf("%03s", $noUrut);

$id_orders = $kodePesanan;
// panggil fungsi isi_keranjang dan hitung jumlah produk yang dipesan


$jam_skrg = date("H:i:s");
// simpan data detail pemesanan
for ($i = 0; $i < $jml; $i++) {

    $connect->query("INSERT INTO order_telepon(id_orders, product_id, jumlah, id_customer , id_ekspedisi, bank ,tgl_order, jam_order, status) 
                   VALUES('$id_orders',{$isikeranjang[$i]['id_barang']}, {$isikeranjang[$i]['qty']}, '$id_customer', '$ekspedisi', '$bank', NOW(), '$jam_skrg', 1)");

    $connect->query("UPDATE barang SET stock=stock - {$isikeranjang[$i]['qty']}, total_terjual =  total_terjual+{$isikeranjang[$i]['qty']} WHERE id={$isikeranjang[$i]['id_barang']}");

    $connect->query("DELETE FROM order_telepon WHERE id_orders ='' AND id_customer = '$id_customer'");

}
//exit();
for ($i = 0; $i < $jml; $i++) {

    $connect->query("DELETE FROM keranjang_telepon WHERE id_keranjang = {$isikeranjang[$i]['id_keranjang']}");
}



// echo "sukses";
// die;
//exit();
$daftarproduk = $connect->query("SELECT * 
	FROM customer  
	WHERE  id_customer = '$id_customer'
	");


$lihat = mysqli_fetch_array($daftarproduk);

//exit();
?>
<!--header start -->

<!-- header end -->
<div class="wrapper">

    <div class="row blog">

        <div class="col-md-7">
        <div id="struk">
             <div style="width:487px; 
                padding:0 10px 20px 10px; 
                margin:0 auto; 
                background:#ffffff; color:#4d4d4d;
                 font:13px /1.5 Tahoma; border:4px double #dddddd;">
                <table cellpadding="0" cellspacing="0" border="0">
                        <tbody>

                        <tr align="center">
                            <td valign="top"
                                style="width:150px; padding:10px 0; border-bottom:4px double #dddddd;text-align: center;">
                                <!-- <h1>LOGO</h1> -->
                                <img src="assets/images/putih.jpg" alt="" style="width: 100%; height: auto;"/>
                            </td>


                            <td colspan="2" valign="top"
                                style="width:340px; padding:10px 0; border-bottom:4px double #dddddd; text-align:center; font-size:15px; line-height:16px;     padding-top: 20px;">
                                TOKO SALSA (OLEH-OLEH HAJI & UMROH)<br>
                                Jl. LANTAI 3 A, BLOK F 36, NO 07 <br>
                                KEBON KACANG RAYA, KB MELATI, <BR>
                                TANAH ABANG, JAKARTA BARAT, DKI JAKARTA<br>
                                TLP. 0813-1535-8266<br>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" valign="top" style="width:100px; padding:10px 0 0 0; font-size:15px; ">
                               No Nota : <?php echo $id_orders; ?> </td>
                             <td valign="top" style="width:100px; padding:10px 0 0 0;font-size:15px; "> KASIR : ADMIN
                          
                            </td>
                            
                        </tr>
                            <?php

                        //exit();
                        $CetakNota = $connect->query("SELECT * FROM order_telepon,barang 
                                     WHERE order_telepon.product_id=barang.id 
                                     AND id_orders='$id_orders' AND id_customer = '$id_customer' ");
                        $totalcetak = 0;
                        $itemcetak = 0;
                        while ($datacetak = mysqli_fetch_array($CetakNota)) {
                            $subtotalcetak = +$datacetak['jumlah'] * $datacetak['harga'];
                            $totalcetak += $subtotalcetak;
                            $itemcetak += $datacetak['jumlah'];
                            ?>
                        <tr>

                                <td valign="top"
                                    style="width:100px; padding:10px 0 0 0; font-size:15px; "><?php echo $datacetak['nmbrg']; ?></td>
                                <td valign="top" style="width:100px; padding:10px 0 0 0;font-size:15px; ">
                                    <?php echo $datacetak['jumlah']; ?>
                                </td>
                                <td style="font-size:15px; text-align: right;">
                                    Rp. <?php echo number_format($subtotalcetak, 0, ',', '.'); ?></td>
                        </tr>
                         <?php
                        }
                        ?>
                        <tr>
                            <td valign="top" style="width:100px; padding:3px 0 0 0;font-size:15px; ">Jumlah Items</td>
                            <td valign="top"
                                style="width:100px; padding:10px 0 0 0;font-size:15px; "><?php echo $itemcetak; ?></td>
                            <td></td>
                        </tr>
                         <tr>
                            <td></td>
                            <td valign="top" style="width:100px; padding:10px 0 0 0;font-size:15px; ">Netto</td>
                            <td valign="top" style="width:100px; padding:10px 0 0 0;font-size:15px;text-align: right; ">
                                Rp. <?php echo number_format($totalcetak, 0, ',', '.'); ?> </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td valign="top" style="width:100px; padding:3px 0 0 0;font-size:15px; ">Cash</td>
                            <td valign="top" style="width:100px; padding:3px 0 0 0;font-size:15px;text-align: right; ">
                                Rp. <?php echo number_format(str_replace(".", "", $_POST['cash']), 0, ',', '.'); ?></td>
                        </tr>
                        <tr><td colspan="3" valign="top"
                                style="text-align: center;width:100px; border-bottom:1px; padding:10px 0 0 0;font-size:15px; ">
                                
                            </td></tr>
                        <tr>
                            <td></td>
                            <td valign="top" style="width:100px; padding:3px 0 0 0;font-size:15px; ">Kembali</td>
                            <td valign="top" style="width:100px; padding:3px 0 0 0;font-size:15px;text-align: right;">
                               Rp. <?php
                                $kembali = str_replace(".", "", $_POST['cash']) - $totalcetak;
                                echo number_format($kembali, 0, ',', '.');
                                ?>
                            </td>
                        </tr>
                        <tr><td colspan="3" valign="top"
                                style="text-align: center;width:100px; border-bottom:0px; padding:10px 0 0 0;font-size:15px; "><br><br><br>
                                
                            </td></tr>
                        <tr>
                            <td valign="top"
                               style="width:100px; padding:3px 0 0 0;font-size:15px;">
                                Nama Pembeli: 
                            </td>
                            <td colspan="2" valign="top"
                                style="width:100px; font-size:15px;text-align: left; ">
                                <?php echo $lihat['nama_pembeli']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top"
                               style="width:100px; padding:3px 0 0 0;font-size:15px;">
                                Alamat Lengkap:
                            </td>
                            <td valign="top"
                                style="width:100px; padding:2px 0 0 0;font-size:15px;text-align: left; ">
                                <?=$lihat['alamat_pembeli'];?>, <?=$lihat['kelurahan'];?>
                            </td>
                            <td  valign="top"
                                style="width:100px; padding:2px 0 0 0;font-size:15px;text-align: left; ">
                                <?=$lihat['kecamatan'];?>
                            </td>
                        </tr>
                        <tr>
                            <td  valign="top"
                               style="width:100px; padding:10px 0 0 0;font-size:15px;text-align: left; ">
                            </td>
                             <td  valign="top"
                                style="width:100px; padding:10px 0 0 0;font-size:15px;text-align: left; ">
                                <?=$lihat['kabkot'];?>
                            </td>
                            <td  valign="top"
                                style="width:100px; padding:10px 0 0 0;font-size:15px;text-align: left; ">
                                <?=$lihat['prov'];?>
                            </td>
                            
                        </tr>

                        <tr>
                            <td  valign="top"
                                style="width:100px; padding:3px 0 0 0;font-size:15px;">
                                <?php

                                    $sqlEksped = $connect->query("SELECT nmekspedisi FROM ekspedisi WHERE id_ekspedisi = '$ekspedisi'");
                                    $dataEksped = mysqli_fetch_array($sqlEksped);
                                 ?>
                                Ekspedisi: <?=$dataEksped['nmekspedisi'];?>
                            </td>
                             <td  valign="top"
                                style="width:100px; padding:10px 0 0 0;font-size:15px;text-align: left; ">
                                No Telepon:
                            </td> 
                            <td  valign="top"
                                style="width:100px; padding:10px 0 0 0;font-size:15px;text-align: left; ">
                                <?=$lihat['no_telepon'];?>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3" valign="top"
                                style="text-align: center;width:100px; padding:10px 0 0 0;font-size:15px; ">
                                ***************<?php echo date("Y-m-d") . "-" . date("H:i:s"); ?>**************
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align: center;font-size:15px; ">BARANG YANG SUDAH DIBELI</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align: center;font-size:15px; ">TIDAK DAPAT
                                DITUKAR/DIKEMBALIKAN
                            </td>
                        </tr>

                        </tbody>
                    </table>
            </div>
        </div>
        <form method="post" action="struct_kirim.php" target="blank">
                                            <input type="hidden" name="cash" value="<?php echo $_POST['cash']; ?>">

                                            <input type="hidden" name="id_orders" value="<?php echo $id_orders; ?>">

                                            <input type="hidden" name="id_session" value="<?php echo $id_session; ?>">
                                            <input type="hidden" name="id_customer" value="<?php echo $id_customer; ?>">
                                            <input type="hidden" name="ekspedisi" value="<?php echo $ekspedisi; ?>">
                                            <br><br><br>
                                            <center>
                                         <button class="btn btn-primary" type="submit" name="simpan">
                                                <i class="fa fa-print"></i> PRINT NOTA
                                            </button>

                                            <button> <a href="index.php?hal=via_telpon"> KEMBALI KE APLIKASI </button></a>
                                            </center>
                                           
                                        
     </form>

    </div>
        
            <!-- struk end -->
        </div>
    </div>
</div>

