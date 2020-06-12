<?php
include "config.php";

 ?>
        <!--body wrapper start-->
  <div class="wrapper">
    <div class="row">

        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <h4>Daftar Transaksi Pembelian Langsung</h4>
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
                        <div>
                        <form action="" method="post" name="postform">
                            <p align="center"><p>Pencarian Data Berdasarkan Periode Tanggal</p><br/>
                            <table>
                                <tr>
                                    <td><p>Dari Tanggal</p></td>
                                    <td colspan="2" width="190">: <input type="date" name="tanggal_awal" size="16">
                                    </td>
                                    <td width="125"><p>Sampai Tanggal</p></td>
                                    <td colspan="2" width="190">: <input type="date" name="tanggal_akhir" size="16" />
                                    </td>
                                    <td><button class="btn btn-primary" type="submit" value="pencarian" name="pencarian">Lihat</button></td>
                                    <!-- <td><button class="btn btn-danger" type="reset" value="Reset"><a href="transaksi_langsung.php">Reset</a></button></td> -->
                                </tr>
                            </table>
                        </form>



                        <div class="space15">
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="15%">No Nota</th>
                                <th width="20%">Tanggal Pesanan</th>
                                <th width="20%">Jumlah Item</th>
                                <!--<th>Deskripsi</th>-->
                                <!-- <th width="10%">Action</th> -->
                            </tr>
                            </thead>
                            <tbody>
                              <?php
                                //proses jika sudah klik tombol pencarian data
                                if(isset($_POST['pencarian'])){
                                //menangkap nilai form
                                $tanggal_awal=$_POST['tanggal_awal'];
                                $tanggal_akhir=$_POST['tanggal_akhir'];
                                if(empty($tanggal_awal) || empty($tanggal_akhir)){

                                //jika data tanggal kosong
                                ?>
                                <script language="JavaScript">
                                    alert('Tanggal Awal dan Tanggal Akhir Harap di Isi!');
                                    document.location='index.php?hal=transaksi_langsung';
                                </script>
                                <?php
                                }else{
                                ?><i><p>Informasi : </p> Hasil pencarian data berdasarkan periode Tanggal <p>
                                  <?php echo $_POST['tanggal_awal']?></p> s/d <p>
                                  <?php echo $_POST['tanggal_akhir']?></p></i>
                                <?php

                                }
                            ?>


                            <?php
                            $no = 1;
                            $query=$connect->query("SELECT orders_detail.id_orders, orders_detail.product_id, orders_detail.jumlah, orders_detail.tgl_order,barang.id, barang.nmbrg FROM orders_detail JOIN barang ON orders_detail.product_id = barang.id  WHERE DATE (orders_detail.tgl_order) between '$tanggal_awal' and '$tanggal_akhir' GROUP BY orders_detail.tgl_order ASC");

                            if ($query === FALSE) {
                                die(mysqli_error($connect));
                            }

                            while($row=mysqli_fetch_array($query)){
                              $jumlah = $connect->query("SELECT jumlah FROM orders_detail WHERE tgl_order = '".$row['tgl_order']."'
                                           ");
                              $totjumlah = mysqli_num_rows($jumlah);

                            ?>
                                         <tr>
                                             <td><?php echo $no++ ?></td>
                                             <td ><?php echo $row['id_orders']; ?></td>
                                             <td ><?php echo $row['tgl_order'];?></td>
                                             <td><?php echo $totjumlah; ?> Item</td>
                                         </tr>
                              <?php
                                         }
                            ?>
                                             <td colspan="4" align="center">
                                             <?php
                                             //jika pencarian data tidak ditemukan
                                             if(mysqli_num_rows($query)==0){
                                                 echo "<font color=red><blink>Pencarian data tidak ditemukan!</blink></font>";
                                             }
                                             ?>
                                             </td>
                                     </table>
                                     <?php
                                     }
                                     else{
                                         unset($_POST['pencarian']);
                                     }
                                     ?>
                            </tbody>
                    </div>
                  </div>
                </div>
            </section>
          </div>
    </div>
