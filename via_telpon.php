<?php 
include "config.php";

    


 ?>
        <!--body wrapper start-->
       <div class="wrapper">
    <div class="row">
     
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <h4>Daftar Transaksi Pembelian Via Telepon</h4>
                    <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                        <a href="javascript:;" class="fa fa-times"></a>
                     </span>
                </header>
                <div class="panel-body">
                    <div class="adv-table editable-table ">
                        <div class="clearfix">
                             <div class="btn-group">
                                <a href="?hal=tambah_via_telepon">
                                    <button data-toggle="modal" class="btn btn-primary">
                                        Tambah Customer <i class="fa fa-plus"></i>
                                    </button>
                                </a>
                            </div>
                            <div class="btn-group pull-right">
                            </div>
                        </div>
                        <div class="space15"></div>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="10%">Nama Cutomer</th>
                                <th width="5%">Kota</th>
                                <th width="10%">No Telpon</th>
                                <th width="30%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $no = 1;
                            $queryProduct = $connect->query("SELECT * FROM customer ORDER BY id_customer DESC");


                            while ($rowProduct = mysqli_fetch_array($queryProduct)) {
                                 // $jumlah =  $connect->query("SELECT jumlah FROM order_telepon WHERE tgl_order = '".$rowProduct['tgl_order']."'
                                 //             ");
                                 //    $totjumlah = mysqli_num_rows($jumlah);

                                ?>
                                 <tr class="">
                                    <td><?php echo $no++ ?></td>
                                    
                                    <td><a href="?hal=detai_customer&id=<?=$rowProduct['id_customer']; ?>"><?php echo $rowProduct['nama_pembeli'] ?></a></td>
                                    <td><?php echo $rowProduct['kabkot'] ?></td>
                                    <td><?php echo $rowProduct['no_telepon'] ?></td>
                                    
                                    <td>
                                        <a href="index.php?hal=via_telpon_pilih&id_customer=<?php echo $rowProduct['id_customer']; ?>">
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-plus" aria-hidden="true"></i>
                                                Pesanan Baru
                                            </button>
                                        </a>
                                        <a href="index.php?hal=histori_pesan_telpon&id_customer=<?php echo $rowProduct['id_customer']; ?>">
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-book" aria-hidden="true"></i>
                                                History Pesanan
                                            </button>
                                        </a>
                                        <a href="index.php?hal=ubah_pesan_telpon&id_customer=<?php echo $rowProduct['id_customer']; ?>">
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-edit" aria-hidden="true"></i>
                                                Ubah Pesanan
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
       