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
                    <form>
                        <table>
                            <a href="?hal=rekap"><button class="btn btn-block btn-primary" id="tblRekap"type="button">Lihat Rekap</button></a>
                        </table>
                    </form>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="15%">No Nota</th>
                            <th width="20%">Tanggal Pesanan</th>
                            <th width="20%">Jumlah Item</th>
                            <th width="10%">Action</th>
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
                    $query=$connect->query("SELECT *FROM orders_detail WHERE tgl_order '$tanggal_awal' and '$tanggal_akhir'");
                    }
                ?>


                <?php
                //menampilkan pencarian data
                while($row=mysqli_fetch_array($query)){
                ?>
                <tr>
                      <!-- <?php echo $row['tgl_order']; ?> -->
                    <td ><?php echo $row['id_orders']; ?></td>
                    <td ><?php echo $row['product_id'];?></td>
                    <td ><?php echo $row['jumlah'];?></td>
                    <td ><?php echo $row['tgl_order'];?></td>
                    <td ><?php echo $row['jam_order'];?></td>
                </tr>
                <?php
                }
                ?>
                <tr>
                    <td colspan="4" align="center">
                    <?php
                    //jika pencarian data tidak ditemukan
                    if(mysql_num_rows($query)==0){
                        echo "<font color=red><blink>Pencarian data tidak ditemukan!</blink></font>";
                    }
                    ?>
                    </td>
                </tr>
            </table>
            
            <?php
            }
            else{
                unset($_POST['pencarian']);
            }
            ?>
                            <?php

                            $no = 1;
                            $queryProduct = $connect->query("SELECT orders_detail.id_orders, orders_detail.product_id, orders_detail.jumlah, orders_detail.tgl_order,barang.id, barang.nmbrg FROM orders_detail JOIN barang ON orders_detail.product_id = barang.id GROUP BY tgl_order DESC");



                            while ($rowProduct = mysqli_fetch_array($queryProduct)) {
                                $jumlah =  $connect->query("SELECT jumlah FROM orders_detail WHERE tgl_order = '".$rowProduct['tgl_order']."'
                                             ");
                                    $totjumlah = mysqli_num_rows($jumlah);


                                ?>
                                 <tr class="">
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $rowProduct['id_orders'] ?></td>
                                    <td><?php echo $rowProduct['tgl_order'] ?></td>
                                    <td><?php echo $totjumlah; ?> Item</td>

                                    <td>
                                        <a href="index.php?hal=detail_transaksi_langsung&id_orders=<?php echo $rowProduct['id_orders']; ?>">
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-book" aria-hidden="true"></i>
                                                Lihat Detail
                                            </button>
                                        </a>

                                    </td>
                                </tr>

                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
