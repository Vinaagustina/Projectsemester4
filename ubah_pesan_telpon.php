<?php 
include "config.php";

session_start();
if(!isset($_SESSION['id_session'])){
    $ids = date("YmdHis");
    $_SESSION['id_session'] = $ids;
}
$id_session=$_SESSION['id_session'];

error_reporting(0);
$id = $_GET['id'];
$queryRowProduct = $connect->query("SELECT * FROM barang where id = '".$id."'");
$rowProduct = mysqli_fetch_array($queryRowProduct);
   

$id_customer = $_GET['id_customer'];

$Rcustomer= $connect->query("SELECT * FROM customer WHERE id_customer = '$id_customer' ");
$ambildata = mysqli_fetch_array($Rcustomer);

$nama = $ambildata['nama_pembeli'];
$alamat = $ambildata['alamat_pembeli'];



 ?>
        <!--body wrapper start-->
       <div class="wrapper">
    <div class="row">
     
        <div class="col-sm-7">
            <section class="panel">
                <header class="panel-heading">
                    <h4>Pembelian Via Telepon Atas Nama <?=$nama;?></h4>
                    <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                        <a href="javascript:;" class="fa fa-times"></a>
                     </span>
                </header>
                <div class="panel-body">
                    <div class="adv-table editable-table ">
                        <div class="clearfix">

                            <div class="btn-group pull-right">
                            </div>
                        </div>
                        <?php

                         ?>
                        <div class="space15"></div>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="20%">Kode Barang</th>
                                <th width="20%">Nama</th>
                                <th width="15%">Harga</th>
                                <th width="15%">Stock</th>
                                <!--<th>Deskripsi</th>-->
                                <th width="10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $queryProduct = $connect->query("SELECT barang.id, barang.kdbrg, barang.nmbrg, barang.harga, barang.stock, category.category_id, category.category_name, satuan.id_satuan, satuan.nmsatuan
                             FROM barang 
                             JOIN category ON barang.category_id = category.category_id
                             JOIN satuan ON barang.id_satuan = satuan.id_satuan
                             ORDER BY id DESC");
                            while ($rowProduct = mysqli_fetch_array($queryProduct)) {
                                ?>
                                 <tr class="">
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $rowProduct['kdbrg'] ?></td>
                                    <td><?php echo $rowProduct['nmbrg'] ?></td>
                                    <td>Rp. <?php echo number_format($rowProduct['harga'], 0, ',', '.'); ?></td>
                                    <td><?php echo $rowProduct['stock'] ?></td>
                                   <!-- <td><?php echo $rowProduct[''] ?></td>-->
                                    <td>
                                        <form action="" method="POST">
                                        <input type="hidden" name="id_barang" value="<?=$rowProduct['id']?>">
                                        <input type="hidden" name="id_session" value="<?=$id_session;?>">
                                        <input type="hidden" name="id_customer" value="<?=$id_customer;?>">
                                        <input type="hidden" name="input" value="add">
                                            <button class="btn btn-primary" type="submit" name="pilih"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                Pilih
                                            </button>
                                         </form>
                                    </td>
                                </tr>
                            
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <?php

if(isset($_POST['pilih'])){

include "config.php";
include "tanggal.php";

$input=$_POST['input'];
$id_session=$_POST['id_session'];
$id_barang=$_POST['id_barang'];
$id_customer = $_POST['id_customer'];


                    $sid = session_id();
                    $sql = $connect->query("SELECT stock FROM barang WHERE id='$id_barang'");
                    $s = mysqli_fetch_array($sql);
                    $stok = $s['stock']; 
                    //echo $stok; exit();

                    if ($stok == 0) {
                         echo "<script> alert('stock habis'); location.href='index.php?hal=beli_langsung' </script>";
                         exit();
                    } else {
                    $query=$connect->query("SELECT id_barang, qty, status FROM keranjang_telepon WHERE id_barang='$id_barang' AND id_session='$id_session' AND id_customer='$id_customer' ");
                    $data_tmp=mysqli_fetch_array($query);
                    $cek=mysqli_num_rows($query);
                    $qty = $data_tmp['qty'];
                    $cek_status = $data_tmp['status'];
                    // var_dump($data_tmp);
                    

                    if($cek==0){
                        $connect->query("INSERT INTO keranjang_telepon (id_keranjang, id_barang, id_session, id_customer, tgl_keranjang, jam_keranjang, qty, status) VALUES ('', '$id_barang', '$id_session', '$id_customer', '$tgl_sekarang', '$jam_sekarang',1, 1)");
                    }
                    else if($qty >= $stok){

                        echo "<script> alert('Stock yang tersedia tidak cukup'); location.href='index.php?hal=beli_langsung' </script>";
                                exit();
                    }else if ($cek_status == 0) {
                        $connect->query("UPDATE keranjang_telepon SET qty=qty+1, status=1 where id_session='$id_session' and id_barang='$id_barang' AND id_customer='$id_customer' AND status = 1 ");
                    }
                    else{
                        $connect->query("UPDATE keranjang_telepon SET qty=qty+1 where id_session='$id_session' and id_barang='$id_barang' AND id_customer='$id_customer' AND status = 1 ");
                    }
                   
                    }
        
    }

?>





        </div>
           <div class="col-md-5">
            <div class="panel">
                <div class="panel-body">

                    <div class="blog-post">

                        <div class="media">
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td></td>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Sub Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $query = "SELECT keranjang_telepon.id_keranjang, keranjang_telepon.id_session, keranjang_telepon.tgl_keranjang, keranjang_telepon.jam_keranjang, keranjang_telepon.qty,
                        barang.id, barang.kdbrg, barang.nmbrg, barang.harga, barang.stock 
                        FROM keranjang_telepon 
                        JOIN barang ON keranjang_telepon.id_barang = barang.id
                        WHERE  id_customer=$id_customer AND status = 1 ";

                                    $result = mysqli_query($connect, $query);
                                    $no = 1;
                                    $total = 0;

                                    while ($data = mysqli_fetch_array($result)) {
                                        $sub_total = +$data['harga'] * $data['qty'];
                                        $total += $sub_total;
                                        ?>
                                        <tr>
                                            <td>
                                                <form action="" method="POST">
                                                    <input type="hidden" name="id_keranjang" value="<?=$data['id_keranjang']?>">
                                                    <input type="hidden" name="id_session" value="<?=$data['id_session'] ?>">
                                                     <button type="submit" name="hapus"><i
                                                          class="fa fa-times" style="color: red"></i></button>

                                                </form>
                                            </td>
                                            <?php
                                            if(isset($_POST['hapus'])){
                                                include "config.php";

                                                $id_keranjang=$_POST['id_keranjang'];
                                                $id_session=$_POST['id_session'];
                                                $id_customer=$_POST['id_customer'];

                                              $hapus= $connect->query("DELETE FROM keranjang_telepon where id_keranjang='$id_keranjang'");
                                              
                                               $url = $_SERVER['REQUEST_URI'];
                                                    echo "<script>document.location='$url';</script>";
                                              
                                            }
?>
                                            <td>
                                                <?php echo $data['nmbrg'] ?></td>
                                            <td><?php echo number_format($data['harga'], 0, ',', '.'); ?></td>
                                            <td><?php echo $data['qty']; ?></td>
                                            <td><?php echo number_format($sub_total, 0, ',', '.'); ?></td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td colspan="4">
                                            Total
                                        </td>
                                        <td>
                                            <?php echo number_format($total, 0, ',', '.'); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" align="reight">

                                            <button class="btn btn-primary" type="submit" data-toggle="modal"
                                                    data-target="#myModal"><i class="fa fa-shopping-cart"></i> Bayar
                                            </button>

                                            <a href="via_telpon_simpan.php?&id_customer=<?=$id_customer;?>">
                                             <button class="btn btn-info" type="submit" name="simpan" id="simpan"><i class="fa fa-check"></i> simpan
                                            </button></a>
                                        </td>
                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                             aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true">&times;
                                                        </button>
                                                        <?php

                                                        ?>
                                                        <h4 class="modal-title">GRAND TOTAL :
                                                            Rp. <?php echo number_format($total, 0, ',', '.'); ?></h4>
                                                    </div>

                                                    <div class="modal-body row">
                                                        <div class="col-md-12">
                                                            <!--<form method="POST" action="?hal=cetak">-->
                                                                <form method="POST" action="cetak_kirim.php">
                                                                <div class="form-group">
                                                                    <label> Transfer</label>

                                                                </div>


                                                                <div class="form-group">
                                                                    <input type="hidden" id="type1" name="grand_total"
                                                                           onKeyUp="kalkulatorTambah(getElementById('type1').value,this.value);"
                                                                           value="<?php echo number_format($total, 0, ',', '.'); ?>"/>

                                                                    <input type="hidden" name="id_customer" value="<?=$id_customer;?>">

                                                                    <input type="text" class="form-control input-lg"
                                                                           id="type2" name="cash"
                                                                           onKeyUp="kalkulatorTambah(getElementById('type1').value,this.value);"
                                                                           />
                                                                    <br><br>
                                                                    <label> Pilih Ekspedisi</label>

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

                                                                    <br><br>
                                                                    <label> Inpu nama BANK</label>
                                                                    <input type="text" class="form-control input-lg"
                                                                           id="type2" name="bank">
                                                                </div>

                                                                <div class="form-group">

                                                                    <label> Kembalian</label>
                                                                    <input type="hidden" name="kembalian"
                                                                           id="kembalian">
                                                                    <h1>

                                                               <span id="result">
                                                                </span></h1>
                                                                </div>

                                                                <div class="pull-right">
                                                                    <button class="btn btn-primary btn-sm"
                                                                            type="submit"><i
                                                                                class="fa fa-check-square-o"></i> OK
                                                                    </button>
                                                                    <button class="btn btn-danger btn-sm"
                                                                            data-dismiss="modal" aria-hidden="true"
                                                                            type="button"><i class="fa fa-times"></i>
                                                                        Cancel
                                                                    </button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- end modal -->
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <!--body wrapper end-->


<!-- <script type="text/javascript" src="jquery-1.11.2.min.js"></script> -->
<script>
    function searchFilter(page_num) {
        // page_num = page_num?page_num:0;
        var keywords = $('#keywords').val();
        // var sortBy = $('#sortBy').val();
        $.ajax({
            type: 'GET',
            url: 'getProduct.php',
            data: '?hal=post&keywords=' + keywords,
            beforeSend: function () {
                $('.loading-overlay').show();
            },
            success: function (html) {
                $('#show_product').html(html);
                $('.loading-overlay').fadeOut("slow");
            }
        });
    }

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++) if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
    }

    function kalkulatorTambah(type1, type2) {

        var a = parseInt(type1.replace(/,.*|[^0-9]/g, ''), 10); //eval(type1);
        var b = parseInt(type2.replace(/,.*|[^0-9]/g, ''), 10);
        var hasil = b - a;

        var jumlah = 'Rp. ' + hasil.toFixed(0).replace(/(d)(?=(ddd)+(?!d))/g, "$1.");
        //var total = NilaiRupiah(hasil);
        // console.info('hahah')
        document.getElementById('result').innerHTML = convertToRupiah(hasil);

        document.getElementById("kembalian").value = convertToRupiah(hasil); //document.getElementById("type2").value;

    }

    /* Tanpa Rupiah */
    var tanpa_rupiah = document.getElementById('type1');
    tanpa_rupiah.addEventListener('keyup', function (e) {
        tanpa_rupiah.value = formatRupiah(this.value);
    });

    var puser = document.getElementById('type2');
    puser.addEventListener('keyup', function (e) {
        puser.value = formatRupiah(this.value);
    });

</script>