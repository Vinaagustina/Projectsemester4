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
                        <!-- <div class="clearfix">

                            <div class="btn-group pull-right">
                            </div>
                        </div> -->
                        <div>
                        <form action="" method="post" name="postform">
                            <p align="center"><p>Pencarian Data Berdasarkan Periode Tanggal</p><br/>
                            <table>
                                <tr>
                                    <td><p>Dari Tanggal</p></td>
                                    <td colspan="2" width="190">: <input type="date" name="tanggal_awal" size="16" />
                                    <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_awal);return false;" ><img src="calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>
                                    </td>
                                    <td width="125"><p>Sampai Tanggal</p></td>
                                    <td colspan="2" width="190">: <input type="date" name="tanggal_akhir" size="16" />
                                    <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_akhir);return false;" ><img src="calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>
                                    </td>
                                    <td><button class="btn btn-primary" type="submit" value="Lihat" name="pencarian">Lihat</button></td>
                                    <!-- <td><button class="btn btn-danger" type="reset" value="Reset"><a href="transaksi_langsung.php">Reset</a></button></td> -->
                                </tr>
                            </table>
                        </form>
                        </div


                        <div class="space15"></div>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="15%">No Nota</th>
                                <th width="20%">Tanggal Pesanan</th>
                                <th width="20%">Jumlah Item</th>
                                <!--<th>Deskripsi</th>-->
                                <th width="10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>

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
