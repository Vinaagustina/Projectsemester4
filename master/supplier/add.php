<?php
if (isset($_POST['simpan'])) {
    $queryInsert = $connect->query("INSERT INTO supplier SET nama='".$_POST['nama']."', alamat='".$_POST['alamat']."', telpon='".$_POST['telpon']."', email='".$_POST['email']."'" );

    if ($queryInsert) {
        echo "<script> alert('Data Berhasil Disimpan'); location.href='index.php?hal=master/supplier/list' </script>";
        exit;
    }
}
?>
<!--body wrapper start-->
<div class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    TAMBAH SUPPLIER
                </header>
                <div class="panel-body">
                    <div class=" form">
                        <form class="cmxform form-horizontal adminex-form" id="commentForm" method="POST"
                              enctype="multipart/form-data" action="">
                            <div class="form-group ">
                                <label for="nama" class="control-label col-lg-2" style="text-align: left;">Nama Supplier</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" id="nama" name="nama" minlength="2"
                                           type="text" required/>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="alamat" class="control-label col-lg-2" style="text-align: left;">Alamat</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" id="alamat" name="alamat" minlength="2"
                                           type="text" required/>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="telpon" class="control-label col-lg-2" style="text-align: left;">Telpon</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" id="telpon" name="telpon" minlength="2"
                                           type="text" required/>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-2" style="text-align: left;">email</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" id="email" name="email" minlength="2"
                                           type="text" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-primary" type="submit" name="simpan">SAVE</button>
                                    <a href="?hal=master/supplier/list">
                                        <button class="btn btn-default" type="button">CANCEL</button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </section>
        </div>
    </div>
</div>