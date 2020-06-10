<?php 
include 'config.php';
error_reporting(0);
$id_customer = $_GET['id_customer'];



$queryRowProduct = $connect->query("SELECT order_telepon.id_orders, order_telepon.product_id, order_telepon.jumlah, order_telepon.tgl_order, barang.id, barang.nmbrg , barang.harga
	FROM order_telepon JOIN barang ON order_telepon.product_id = barang.id
    WHERE id_customer = '$id_customer' AND status = 1 ORDER BY id_orders DESC
    ");

    
$queryRowProduct2 = $connect->query("SELECT keranjang_telepon.id_barang, keranjang_telepon.id_customer, keranjang_telepon.qty, keranjang_telepon.tgl_keranjang, barang.id, barang.nmbrg, barang.harga 
	FROM keranjang_telepon JOIN barang ON keranjang_telepon.id_barang = barang.id
    WHERE id_customer = '$id_customer'
    ");

 // $rowProduct = mysqli_fetch_array($queryRowProduct2);

 // var_dump($rowProduct);
 // die;



                     
 ?>

        <!--body wrapper start-->
        <div class="wrapper">
            <div class="row">
               <div class="col-md-6">
                <section class="panel">
                <header class="panel-heading">
                           Transaksi Lunas
                        </header>

            <div class="panel">
                <div class="panel-body">
                    <div class="blog-post">
                        <div class="media">
                            <div class="panel-body">
                                <h5 align="right"> </h5>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>tanggal Transaksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                <?php
                                   $total = 0;
                                    while ($data = mysqli_fetch_array($queryRowProduct)) {
                                        $sub_total = $data['harga'] * $data['jumlah'];
                                        $total += $sub_total;
                                        ?>
                                        <tr>
                                            <td>
                                                <?=$data['nmbrg']; ?></td>
                                            <td>
                                                Rp. <?php echo number_format($data['harga'], 0, ',', '.'); ?></td>
                                            <td><?php echo $data['jumlah']; ?></td>
                                            <td><?php echo $data['tgl_order']; ?></td>
                                        </tr>
                                    <?php }
                                    ?>
                                        
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div> 

        <div class="col-md-6">
                <section class="panel">
                <header class="panel-heading">
                           Transaksi Belum Lunas
                        </header>

            <div class="panel">
                <div class="panel-body">
                    <div class="blog-post">
                        <div class="media">
                            <div class="panel-body">
                                <h5 align="right"> </h5>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>tanggal Transaksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                <?php
                                   $total = 0;
                                    while ($data = mysqli_fetch_array($queryRowProduct2)) {
                                        $sub_total = $data['harga'] * $data['jumlah'];
                                        $total += $sub_total;
                                        ?>
                                        <tr>
                                            <td>
                                                <?=$data['nmbrg']; ?></td>
                                            <td>
                                                Rp. <?php echo number_format($data['harga'], 0, ',', '.'); ?></td>
                                            <td><?php echo $data['qty']; ?></td>
                                            <td><?php echo $data['tgl_keranjang']; ?></td>
                                        </tr>
                                    <?php }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div> 

               <div class="col-md-12">
                <section class="panel">
                <header class="panel-heading">
                                            
                                        <a href="index.php?hal=via_telpon"
                                         <button class="btn btn-primary" type="submit" >
                                                 Kembali
                                            </button>
                                        </a>
                                       <!--  </form> -->
        </header>
    </section>
</div>

            </div>
        </div>
        <!--body wrapper end-->

