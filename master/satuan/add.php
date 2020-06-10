<?php
if (isset($_POST['simpan'])) {
    $queryInsert = $connect->query("INSERT INTO satuan SET nmsatuan='" . $_POST['nmsatuan'] . "'");

    if ($queryInsert) {
        echo "<script> alert('Data Berhasil Disimpan'); location.href='index.php?hal=master/satuan/list' </script>";
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
                    TAMBAH SATUAN
                </header>
                <div class="panel-body">
                    <div class=" form">
                        <form class="cmxform form-horizontal adminex-form" id="commentForm" method="POST"
                              enctype="multipart/form-data" action="">
                            <div class="form-group ">
                                <label for="cname" class="control-label col-lg-2" style="text-align: left;">Nama
                                    Satuan</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" id="cname" name="nmsatuan" minlength="2"
                                           type="text" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-primary" type="submit" name="simpan">SAVE</button>
                                    <a href="?hal=master/satuan/list">
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