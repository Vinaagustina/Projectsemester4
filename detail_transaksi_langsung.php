<?php 
include 'config.php';
error_reporting(0);
$id_orders = $_GET['id_orders'];



$queryRowProduct = $connect->query("SELECT orders_detail.id_orders, orders_detail.product_id, orders_detail.jumlah, orders_detail.tgl_order, barang.id, barang.nmbrg, barang.harga 
    FROM orders_detail JOIN barang ON orders_detail.product_id = barang.id 
    WHERE id_orders = '$id_orders'
    ");

    
$queryRowProduct2 = $connect->query("SELECT orders_detail.id_orders, orders_detail.product_id, orders_detail.jumlah, orders_detail.tgl_order, barang.id, barang.nmbrg, barang.harga 
    FROM orders_detail JOIN barang ON orders_detail.product_id = barang.id 
    WHERE id_orders = '$id_orders'
    ");

 $rowProduct = mysqli_fetch_array($queryRowProduct2);



                     
 ?>

        <!--body wrapper start-->
        <div class="wrapper">
            <div class="row">
               <div class="col-md-9">
                <section class="panel">
                <header class="panel-heading">
                           DETAIL TRANSAKSI
                        </header>

            <div class="panel">
                <div class="panel-body"> 
                   
                    <h4 align="left">No Nota: <?=$id_orders;?> </h4>
                </div>
            </div>

            <div class="panel">
                <div class="panel-body">
                    <div class="blog-post">
                        <div class="media">
                            <div class="panel-body">
                                <div class="panel"> 
                                        <p align="left"><b>Tanggal Transaksi :</b>  <?=$rowProduct['tgl_order'];?> </p>
                                </div>
                                <h5 align="right"> </h5>
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
                                    while ($data = mysqli_fetch_array($queryRowProduct)) {
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
                                            Total Bayar
                                        </td>
                                        <td>Rp.
                                            <?php echo number_format($total, 0, ',', '.'); ?>
                                        </td>
                                    </tr>
                                         <tr>
                                        <td colspan="4" align="reight">
                                            
                                        <a href="index.php?hal=transaksi_langsung"
                                         <button class="btn btn-primary" type="submit" >
                                                 Kembali
                                            </button>
                                        </a>
                                       <!--  </form> -->
                                       
                                        </td>
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
            </div>
        </div>
        <!--body wrapper end-->

