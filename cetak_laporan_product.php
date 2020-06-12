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
            <h3 align="center">LAPORAN BARANG TERLARIS </h3>       
        <div class="page">
             <h5><b>TOKO SALSA (OLEH-OELH HAJI DAN UMROH )</b></h5>
             TANAH ABANG, JAKARTA BARAT<br> DKI JAKARTA<br>
             <br>
             Tgl Cetak: <?php echo date('d-m-y') ?>
             <br>
        <div class="kop">
            <!--<img src="../img/kop.png" id="kop"><br>-->
           
        
            </div>
        <table border="1px">
            <tr class="head">
                <th width="15">NO. </th><th width="150">KODE BARANG</th><th width="150">NAMA BARANG</th><th width="150">HARGA</th><th width="150">Total Terjual</th>
            </tr><?php

            
               $queryProduct = $connect->query("SELECT * 
                             FROM barang  ORDER BY total_terjual DESC
                             ");

                
                $nomor  = 0; 
                while ($barang = mysqli_fetch_array($queryProduct)) {
                $nomor++;
            ?>
                    <tr>
                        <td><?php echo $nomor;?></td>
                        <td><?php echo $barang['kdbrg'];?></td>
                        <td><?php echo $barang['nmbrg'];?></td>
                        <td><?php echo $barang['harga'];?></td>
                        <td><?php echo $barang['total_terjual'];?></td>
                    </tr>
            <?php } ?>
           
                    
        </table>
           
        </div>
    </body>
</html>