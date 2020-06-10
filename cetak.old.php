<?php


include "config.php";

function isi_keranjang()
{
	include "config.php";

session_start();
if(!isset($_SESSION['id_session'])){
    $ids = date("YmdHis");
    $_SESSION['id_session'] = $ids;
}

    $isikeranjang = array();
    $id_session=$_SESSION['id_session'];
    $sql = $connect->query("SELECT * FROM keranjang WHERE id_session='$id_session'");

    while ($r = mysqli_fetch_array($sql)) {
        $isikeranjang[] = $r;
    }
    return $isikeranjang;
}



$isikeranjang = isi_keranjang();
$jml = count($isikeranjang);

var_dump($jml);

if ($jml == 0) {
    echo "<script> alert('Product masih kosong'); location.href='index.php?hal=beli_langsung' </script>";
    exit();
}

//$tgl_skrg = date("Y-m-d");
$jam_skrg = date("H:i:s");


// simpan data pemesanan
$connect->query("INSERT INTO 
                order(idnama_petugas, tgl_order, jam_order) 
                 VALUES ('" . $_SESSION['username'] . "',NOW(),'$jam_skrg')");
//exit();
// mendapatkan nomor orders

// TIMEZONE
date_default_timezone_set("Asia/Jakarta");
$date= date("ymd");

// mencari kode barang dengan nilai paling besar
$query = "SELECT max(id_orders) as maxKode FROM orders_detail";
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
$kodePesanan = $char.$date.sprintf("%04s", $noUrut);

$id_orders = $kodePesanan;
// panggil fungsi isi_keranjang dan hitung jumlah produk yang dipesan


// simpan data detail pemesanan
for ($i = 0; $i < $jml; $i++) {
    $connect->query("INSERT INTO orders_detail(id_orders, product_id, jumlah) 
                   VALUES('$id_orders',{$isikeranjang[$i]['id_barang']}, {$isikeranjang[$i]['qty']})");

    $connect->query("UPDATE barang SET stock=stock - {$isikeranjang[$i]['qty']} WHERE id={$isikeranjang[$i]['id_barang']}");


}
//exit();
for ($i = 0; $i < $jml; $i++) {

    $connect->query("DELETE FROM keranjang WHERE id_keranjang = {$isikeranjang[$i]['id_keranjang']}");
}
//exit();
$daftarproduk = $connect->query("SELECT orders_detail.id_orders, orders_detail.product_id,  orders_detail.jumlah, barang.nmbrg, barang.id, barang.kdbrg, barang.stock, barang.harga FROM orders_detail JOIN barang ON  orders_detail.product_id = barang.id  WHERE id_orders='$id_orders'");
//exit();
?>
<!--header start -->

<!-- header end -->
<div class="wrapper">

    <div class="row blog">

        <div class="col-md-7">

            <div class="panel">
                <div class="panel-body"> 
                    <h1>Cash Rp. <?php echo number_format(str_replace(".", "", $_POST['cash']), 0, ',', '.'); ?></h1>
                </div>
            </div>

            <div class="panel">
                <div class="panel-body">
                    <!--      <h1 class="text-center mtop35"><a href="#"><i class="fa fa-shopping-cart"></i> 12 Item </a></h1> -->
                    <div class="blog-post">
                        <div class="media">
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Sub Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $total = 0;
                                    while ($data = mysqli_fetch_array($daftarproduk)) {
                                        $sub_total = $data['harga'] * $data['jumlah'];
                                        $total += $sub_total;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $data['nmbrg'] ?></td>
                                            <td>
                                                Rp. <?php echo number_format($data['harga'], 0, ',', '.'); ?></td>
                                            <td><?php echo $data['jumlah']; ?></td>
                                            <td>Rp. <?php echo number_format($sub_total, 0, ',', '.'); ?></td>
                                        </tr>
                                    <?php }
                                    ?>
                                    <tr>
                                        <td colspan="3">
                                            Total
                                        </td>
                                        <td>Rp.
                                            <?php echo number_format($total, 0, ',', '.'); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" align="reight">

                                        <!-- print new -->
                                        <form method="post" action="struct_print.php" target="_blank">
                                            <input type="hidden" name="cash" value="<?php echo $_POST['cash']; ?>">

                                            <input type="hidden" name="id_orders" value="<?php echo $id_orders; ?>">

                                         <button class="btn btn-primary" type="submit">
                                                <i class="fa fa-print"></i> print
                                            </button>
                           <!--              <a class="btn btn-primary btn-lg" target="_blank" href="struct_print.php"><i class="fa fa-print"></i> Print </a> -->
                                        </form>
                                        <!-- print end -->

                                           <!--  <button class="btn btn-primary" onclick="PrintElem('#struk')" type="submit">
                                                <i class="fa fa-print"></i> print
                                            </button> -->
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div id="struk">
                <!-- struk -->
                <div style="width:327px; 
                padding:0 10px 20px 10px; 
                margin:0 auto; 
                background:#ffffff; color:#4d4d4d;
                 font:13px /1.5 Tahoma; border:4px double #dddddd;">


                    <table cellpadding="0" cellspacing="0" border="0">
                        <tbody>

                        <tr>
                            <td valign="top"
                                style="width:100px; padding:10px 0; border-bottom:4px double #dddddd;text-align: center;">
                                <img src="assets/images/logo-struk.png" style="margin:0 auto; width:75px; border:0;">
                            </td>


                            <td colspan="2" valign="top"
                                style="width:180px; padding:10px 0; border-bottom:4px double #dddddd; text-align:center; font-size:11px; line-height:16px;    padding-top: 20px;">
                                CHOCHO MAMA<br>
                                Jl. RAYA TANJUNG KM 5 BLENCONG<br>
                                GUNUNG SARI LOMBOK BARAT<br>
                                TLP. 0212345859<br>
                                NPWP : 09.000.000.000.00.9-888.00
                            </td>
                        </tr>

                        <tr>
                            <td valign="top" style="width:100px; padding:10px 0 0 0; font-size:11px; ">
                                Nota : <?php echo $id_orders; ?> </td>
                            <td colspan="2" valign="top" style="width:100px; padding:10px 0 0 0;font-size:11px; "> KASA
                                : 01 <?php echo $_SESSION['username']; ?>
                            </td>
                        </tr>

                        <?php

                        //exit();
                        $CetakNota = $connect->query("SELECT * FROM orders_detail,barang 
                                     WHERE orders_detail.product_id=barang.id 
                                     AND id_orders='$id_orders'");
                        $totalcetak = 0;
                        $itemcetak = 0;
                        while ($datacetak = mysqli_fetch_array($CetakNota)) {
                            $subtotalcetak = +$datacetak['jumlah'] * $datacetak['harga'];
                            $totalcetak += $subtotalcetak;
                            $itemcetak += $datacetak['jumlah'];
                            ?>
                            <tr>
                                <td valign="top"
                                    style="width:100px; padding:10px 0 0 0; font-size:11px; "><?php echo $datacetak['product_id']; ?></td>
                                <td valign="top" style="width:100px; padding:10px 0 0 0;font-size:11px; ">
                                    <?php echo $datacetak['nmbrg']; ?>
                                </td>
                                <td style="font-size:11px; text-align: right;">
                                    Rp. <?php echo number_format($subtotalcetak, 0, ',', '.'); ?></td>
                            </tr>
                            </tr>
                            <?php
                        }
                        ?>

                        <tr>
                            <td></td>
                            <td valign="top" style="width:100px; padding:10px 0 0 0;font-size:11px; ">Netto</td>
                            <td valign="top" style="width:100px; padding:10px 0 0 0;font-size:11px;text-align: right; ">
                                Rp. <?php echo number_format($totalcetak, 0, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td valign="top" style="width:100px; padding:3px 0 0 0;font-size:11px; ">CASH</td>
                            <td valign="top" style="width:100px; padding:3px 0 0 0;font-size:11px;text-align: right; ">
                                Rp. <?php echo number_format(str_replace(".", "", $_POST['cash']), 0, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td valign="top" style="width:100px; padding:3px 0 0 0;font-size:11px; ">Kembali</td>
                            <td valign="top" style="width:100px; padding:3px 0 0 0;font-size:11px;text-align: right;">
                                <?php
                                $kembali = str_replace(".", "", $_POST['cash']) - $totalcetak;
                                echo number_format($kembali, 0, ',', '.');
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td valign="top" style="width:100px; padding:3px 0 0 0;font-size:11px; ">Items</td>
                            <td valign="top"
                                style="width:100px; padding:3px 0 0 0;font-size:11px;text-align: right; "><?php echo $itemcetak; ?></td>
                        </tr>

                        <tr>
                            <td colspan="3" valign="top"
                                style="text-align: center;width:100px; padding:10px 0 0 0;font-size:11px; ">
                                ***************<?php echo date("Y-m-d") . "-" . date("H:i:s"); ?>**************
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align: center;font-size:11px; ">BARANG YANG SUDAH DIBELI</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align: center;font-size:11px; ">TIDAK DAPAT
                                DITUKAR/DIKEMBALIKAN
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- struk end -->
        </div>
    </div>
</div>

