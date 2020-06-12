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
            <h3 align="center">LAPORAN TRANSAKSI VIA TELPON (LUNAS)</h3>       
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
                <th width="15">NO. </th><th width="85">NO NOTA</th><th width="100">WAKTU TRANSAKSI</th><th width="100">NAMA PEMBELI</th><th>NO TELPON</th><th  width="80">JUMLAH ITEM</th><th width="100">NAMA ITEM</th><th>TOTAL TRANSAKSI</th><th width="50">NAMA BANK</th><th width="80">STATUS</th>
            </tr><?php

			


               $queryProduct = $connect->query("SELECT * FROM order_telepon JOIN barang ON order_telepon.product_id = barang.id JOIN customer ON order_telepon.id_customer = customer.id_customer WHERE status = 1 GROUP BY tgl_order DESC
                             ");

                $total = 0;
                $nomor  = 0; 
                $barang = mysqli_fetch_array($queryProduct);
               
                
                while ($barang = mysqli_fetch_array($queryProduct)) {
                    $jumlah =  $connect->query("SELECT jumlah FROM order_telepon WHERE tgl_order = '".$barang['tgl_order']."'
                             ");
                    $totjumlah = mysqli_num_rows($jumlah);
                $nomor++;

                    ?>
                    <tr>
                        <td><?php echo $nomor;?></td>
                        <td><?php echo $barang['id_orders'];?></td>
                        <td><?php echo $barang['tgl_order'];?></td>
                        <td><?php echo$barang['nama_pembeli'];?></td>
                        <td><?=$barang['no_telepon']?></td>
                        <td><?php echo $totjumlah;?> Item</td>
                          <?php
                        $namaitemSQL = $connect->query("SELECT * FROM order_telepon JOIN barang ON order_telepon.product_id = barang.id WHERE tgl_order = '". $barang['tgl_order'] ."'
                             ");
                             ?>
                        <td>
                            <?php
                        while($namaitem = mysqli_fetch_array($namaitemSQL)){
                        echo $namaitem['nmbrg']; echo " : "; echo $namaitem['jumlah']; echo "<br>" ?>
                        <?php } ?>
                        </td>
                         <?php
                        $totalSQL = $connect->query("SELECT order_telepon.id_orders, order_telepon.product_id, order_telepon.jumlah, order_telepon.tgl_order, barang.id, barang.nmbrg, barang.harga 
                            FROM order_telepon JOIN barang ON order_telepon.product_id = barang.id  WHERE tgl_order = '". $barang['tgl_order'] ."'
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

                    <td><?=$barang['bank']?></td>
                    <td>LUNAS</td>
                    </tr>
<?php
                }
                
               ?>
                    
        </table>
           
        </div>
    </body>
</html>