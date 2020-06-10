<?php

include  'config.php';

$id_customer = $_GET['id'];


$sql = $connect->query("SELECT * FROM customer WHERE id_customer = '$id_customer'");

$lihat = mysqli_fetch_array($sql);

?>


<!--body wrapper start-->
        <div class="wrapper">
            <div class="row">
               <div class="col-md-9">
                <section class="panel">
                <header class="panel-heading">
                           DETAIL CUSTOMER
                        </header>

            <div class="panel">
                <div class="panel-body"> 
                   
                    <h4 align="left"><!-- No Nota: <?=$id_orders;?> --> </h4>
                </div>
            </div>

            <div class="panel">
                <div class="panel-body">
                    <div class="blog-post">
                        <div class="media">
                            <div class="panel-body">
                               <div class="form-group ">
                                <label for="nama" class="control-label col-lg-3" style="text-align: left;">Nama Customer : </label>
                                <div class="col-lg-9">
                                    <label for="nama" class="control-label col-lg-3"><?=$lihat['nama_pembeli'];?></label>
                                </div>
                            	</div>
                            	<div class="form-group ">
                                <label for="nama" class="control-label col-lg-3" style="text-align: left;">Alamat</label>
                                <div class="col-lg-9">
                                    <label for="nama" class="control-label col-lg-9"><?=$lihat['alamat_pembeli'];?></label>
                                </div>
                            	</div>
                            	<div class="form-group ">
                                <label for="nama" class="control-label col-lg-3" style="text-align: left;">Kelurahan</label>
                                <div class="col-lg-9">
                                    <label for="nama" class="control-label col-lg-9"><?=$lihat['kelurahan'];?>n</label>
                                </div>
                            	</div>
                            	<div class="form-group ">
                                <label for="nama" class="control-label col-lg-3" style="text-align: left;">Kecamatan</label>
                                <div class="col-lg-9">
                                    <label for="nama" class="control-label col-lg-9"><?=$lihat['kecamatan'];?></label>
                                </div>
                            	</div>
                            	<div class="form-group ">
                                <label for="nama" class="control-label col-lg-3" style="text-align: left;">Kabupaten / Kota</label>
                                <div class="col-lg-9">
                                    <label for="nama" class="control-label col-lg-9"><?=$lihat['kabkot'];?></label>
                                </div>
                            	</div>
                            	<div class="form-group ">
                                <label for="nama" class="control-label col-lg-3" style="text-align: left;">Provinsi</label>
                                <div class="col-lg-9">
                                    <label for="nama" class="control-label col-lg-9"><?=$lihat['prov'];?></label>
                                </div>
                            	</div>
                            	<div class="form-group ">
                                <label for="nama" class="control-label col-lg-3" style="text-align: left;">NO Telepon</label>
                                <div class="col-lg-9">
                                    <label for="nama" class="control-label col-lg-9"><?=$lihat['no_telepon'];?></label>
                                </div>
                            	</div>
                            	<br>
                            	<br>
                            	
                            </div>

                        </div>
                        <a href="index.php?hal=via_telpon"
                                         <button class="btn btn-primary" type="submit" >
                                                 Kembali
                                            </button>
                                        </a>
                                        <a href="?hal=ubah_via_telepon&id_customer=<?=$lihat['id_customer'];?>">
                                         <button class="btn btn-primary" type="submit" >
                                                 Edit
                                            </button>
                                        </a>
                    </div>
                </div>
            </div>
        </section>
        </div> 
            </div>
        </div>
        <!--body wrapper end-->