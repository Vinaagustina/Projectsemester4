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
    $sql = $connect->query("SELECT * FROM keranjang_telepon WHERE id_session='$id_session'");

    while ($r = mysqli_fetch_array($sql)) {
        $isikeranjang[] = $r;
    }
    return $isikeranjang;
}



$isikeranjang = isi_keranjang();
$jml = count($isikeranjang);

// var_dump($jml);

if ($jml == 0) {
    echo "<script> alert('Product masih kosong'); location.href='index.php?hal=via_telpon' </script>";
    exit();
}

// echo $jml;

// TIMEZONE
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

$jam_skrg = date("H:i:s");

$connect

for ($i = 0; $i < $jml; $i++) {
    $connect->query("INSERT INTO order_telepon
                   VALUES('$id_orders',{$isikeranjang[$i]['id_barang']}, {$isikeranjang[$i]['qty']}, '','','','','','','','','','' )");

    $connect->query("UPDATE barang SET stock=stock - {$isikeranjang[$i]['qty']} WHERE id={$isikeranjang[$i]['id_barang']}");


}


for ($i = 0; $i < $jml; $i++) {

    $connect->query("DELETE FROM keranjang_telepon WHERE id_keranjang = {$isikeranjang[$i]['id_keranjang']}");
}



$daftarproduk = $connect->query("SELECT order_telepon.id_orders, order_telepon.product_id,  order_telepon.jumlah, barang.nmbrg, barang.id, barang.kdbrg, barang.stock, barang.harga FROM order_telepon JOIN barang ON  order_telepon.product_id = barang.id  WHERE id_orders='$id_orders'");
                                  
   ?>
        <!--body wrapper start-->

        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">

        <div class="wrapper">
            <div class="row">
                <div class="col-md-6">

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
                                                <?=$data['nmbrg'] ?></td>
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
                                             <td colspan="3">
                                                  Kembali
                                                </td>
                                                <td>
                                                     Rp. <?php
                                                    $kembali = str_replace(".", "", $_POST['cash']) - $total;
                                                    echo number_format($kembali, 0, ',', '.');
                                                    ?> 
                                                </td>
                                        </tr>
                                    <tr>
                                        <td colspan="4" align="reight">

                                        <!-- print new -->
                                       <!--  <form method="post" action="struct_print.php" target="_blank">
                                            <input type="hidden" name="cash" value="<?php echo $_POST['cash']; ?>">

                                            <input type="hidden" name="id_orders" value="<?php echo $id_orders; ?>">

                                         <button class="btn btn-primary" type="submit">
                                                <i class="fa fa-print"></i> print
                                            </button>
                          
                                        </form> -->
                                       
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
        <div class="col-md-6">

            <div class="panel">
                <div class="panel-body">
                    <h2>Input Data Pembeli Via Telpon</h2>
                    <div class="blog-post">
                        <div class="media">
                            <div class="panel-body">
                                <div class=" form">
                        <form class="cmxform form-horizontal adminex-form" method="POST" enctype="multipart/form-data"
                              action="cetak_kirim.php">
                            <div class="form-group ">
                                <label for="nama" class="control-label col-lg-3" style="text-align: left;">Nama Pembeli</label>

                                <input type="hidden" name="cash" value="<?php echo $_POST['cash']; ?>">

                                <input type="hidden" name="id_orders" value="<?php echo $id_orders; ?>">

                                <input type="hidden" name="id_session" value="<?php echo $kembali; ?>">

                                <div class="col-lg-8">
                                    <input class=" form-control" id="id_orders" name="id_orders" minlength="2"  
                                           type="hidden" value="<?=$id_orders; ?>" required  />
                                </div>
                                <div class="col-lg-8">
                                    <input class=" form-control" id="nama" name="nama" minlength="2"  
                                           type="text" required  />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="alamat" class="control-label col-lg-3" style="text-align: left;">Alamat</label>
                                <div class="col-lg-8">
                                    <textarea class=" form-control" id="alamat" name="alamat" minlength="2"
                                           type="text" required/></textarea>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="kelurahan" class="control-label col-lg-3" style="text-align: left;">Kelurahan</label>
                                <div class="col-lg-8">
                                    <input class=" form-control" id="kelurahan" name="kelurahan" minlength="2"  
                                           type="text" required  />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="kecamatan" class="control-label col-lg-3" style="text-align: left;">Kecamatan</label>
                                <div class="col-lg-8">
                                    <input class=" form-control" id="kecamatan" name="kecamatan" minlength="2"  
                                           type="text" required  />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="kabkot" class="control-label col-lg-3" style="text-align: left;">Kabupaten / Kota</label>
                                <div class="col-lg-8">
                                    <input class=" form-control" id="kabkot" name="kabkot" minlength="2"  
                                           type="text" required  />
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="provinsi" class="control-label col-lg-3" style="text-align: left;">Provinsi</label>
                                <div class="col-lg-8">
                                    <input class=" form-control" id="provinsi" name="provinsi" minlength="2"  
                                           type="text" required  />
                                </div>
                            </div>

                            <div class="form-group ">
                                        <label for="pengiriman" class="control-label col-lg-3" style="text-align: left;">Pilih Ekspedisi</label>
                                        <div class="col-lg-8">
                                            <select name="pengiriman" id ="pengiriman" class="form-control " >
                                                <option value="">--Pilih Ekspedisi--</option>
                                            <?php 
                                              $no = 0;
                                              $queryPengiriman = $connect->query("SELECT * FROM ekspedisi ORDER BY id_ekspedisi DESC");
                                              while ($rowPengiriman  = mysqli_fetch_array($queryPengiriman)) {
                                                
                                            ?>
                                                <option value="<?php echo $rowPengiriman['id_ekspedisi']; ?>"><?php echo $rowPengiriman['nmekspedisi'] ?></option>
                                            <?php

                                                } ?>
                                            </select>
                                        </div>
                                    </div>

                            <div class="form-group ">
                                <label for="no" class="control-label col-lg-3" style="text-align: left;">Nomor Hp</label>
                                <div class="col-lg-8">
                                    <input class=" form-control" id="no" name="no" minlength="2"  
                                           type="text" required  />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-primary" type="submit" name="simpan" value="simpan">Cetak Nota</button>
                                </div>
                            </div>
                        </form>
                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
        <!--body wrapper end-->

