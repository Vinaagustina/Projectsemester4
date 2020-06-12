<?php
include 'config.php';
?>
    
<!doctype html>
<html>
    <head>
        <title>Laporan Data Barang</title>
        <link rel="shortcut icon" href="../img/laporan.png">
        <link rel="stylesheet" type="text/css" href="css/laporan.css">   
        <link href="css/custom.css" rel="stylesheet" media="screen">
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link  href="css/bootstrap-responsive.min.css"  rel ="stylesheet"> 
        <link  href="font-awesome/css/font-awesome.min.css"  rel ="stylesheet"> 
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <style>
            table{
                border-collapse: collapse;
            }
            table th{
                padding: 6px 5px;
            }
            table tr td{
                font-size: 12px;
                padding: 3px 2px;
            }
        </style>
    </head>
    <body>
            <h3 align="center">LAPORAN TRANSAKSI LANGSUNG</h3>       
        <div class="page">
             <h4><b>TOKO HAJI DAN UMROH SALSA</b></h4>
             TANAH ABANG, JAKARTA BARAT<br> DKI JAKARTA<br>
             <br>
             Tgl Cetak: <?php echo date('d-m-y') ?>
        <div class="kop">
            <!--<img src="../img/kop.png" id="kop"><br>-->
           
        
            </div>
        <table border="1px">
            <tr class="head">
                <th width="15">NO. </th><th width="100">NO NOTA</th><th width="110">TANGGAL TRANSAKSI</th><th width="50">JUMLAH ITEM</th><th width="250">NAMA ITEM</th><th width="100">TOTAL TRANSAKSI</th>
            </tr><?php

			


               $queryProduct = $connect->query("SELECT * FROM orders_detail JOIN barang ON orders_detail.product_id = barang.id GROUP BY tgl_order DESC
                             ");

                $total = 0;
                $nomor  = 0; 
                while ($barang = mysqli_fetch_array($queryProduct)) {
                	$jumlah =  $connect->query("SELECT jumlah FROM orders_detail WHERE tgl_order = '".$barang['tgl_order']."'
                             ");
                	$totjumlah = mysqli_num_rows($jumlah);
                $nomor++;


            ?>

                    <tr>
                        <td><?php echo $nomor;?></td>
                        <td><?php echo $barang['id_orders'];?></td>
                        <td><?php echo $barang['tgl_order'];?></td>
                        <td><?php echo $totjumlah;?> Item</td>
                        <?php
                        $namaitemSQL = $connect->query("SELECT * FROM orders_detail JOIN barang ON orders_detail.product_id = barang.id WHERE tgl_order = '". $barang['tgl_order'] ."'
                             ");
                             ?>
                        <td>
                        	<?php
                        while($namaitem = mysqli_fetch_array($namaitemSQL)){
                        echo $namaitem['nmbrg']; ?>,
                        <?php } ?>
                        </td>

                        <?php
                        $totalSQL = $connect->query("SELECT orders_detail.id_orders, orders_detail.product_id, orders_detail.jumlah, orders_detail.tgl_order, barang.id, barang.nmbrg, barang.harga 
    						FROM orders_detail JOIN barang ON orders_detail.product_id = barang.id  WHERE tgl_order = '". $barang['tgl_order'] ."'
                             ");
                             ?>
                          
                        <?php

                        $total= 0;
                        while($jumlahtotal = mysqli_fetch_array($totalSQL)){
                        $sub_total = $jumlahtotal['harga'] * $jumlahtotal['jumlah'];
            			$total += $sub_total;
            			}
            			?>
            			<td>
            			Rp. <?php echo number_format($total, 0, ',', '.'); ?>
            			</td>
                    
                    </tr>
            <?php } ?>
           
                    
        </table>
           
        </div>
    </body>
</html>