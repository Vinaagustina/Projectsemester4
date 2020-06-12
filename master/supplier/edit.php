<?php
error_reporting(0);
$id = $_GET['id'];
$queryRowSupplier = $connect->query("SELECT * FROM supplier where id = '" . $id . "'");
$rowSupplier = mysqli_fetch_array($queryRowSupplier);
if (isset($_POST['ubah'])) {
    $queryUpdate = $connect->query("UPDATE supplier SET  nama='" . $_POST['nama'] . "',alamat='".$_POST['alamat']."' ,telpon='".$_POST['telpon']."', email='".$_POST['email']."' WHERE id = '" . $id . "' ");

}
if ($queryUpdate) {
    echo "<script> alert('Data Berhasil Disimpan'); location.href='index.php?hal=master/supplier/list' </script>";
    exit;
}

?>
<!--body wrapper start-->
<div class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    EDIT SUPPLIER
                </header>
                <div class="panel-body">
                    <div class=" form">
                        <form class="cmxform form-horizontal adminex-form" id="commentForm" method="POST" action="">

                            <div class="form-group ">
                                <label for="sname" class="control-label col-lg-2" style="text-align: left;">Nama
                                    Supplier</label>
                                <div class="col-lg-6">
                                    <input class="form-control" id="sname" name="nama" minlength="2"
                                           type="text" value="<?php echo $rowSupplier['nama'] ?>" required/>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="alamat" class="control-label col-lg-2" style="text-align: left;">Alamat</label>
                                <div class="col-lg-6">
                                    <input class="form-control" id="alamat" name="alamat" minlength="2"
                                           type="text" value="<?php echo $rowSupplier['alamat'] ?>" required/>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="telpon" class="control-label col-lg-2" style="text-align: left;">Telpon</label>
                                <div class="col-lg-6">
                                    <input class="form-control" id="telpon" name="telpon" minlength="2"
                                           type="text" value="<?php echo $rowSupplier['telpon'] ?>" required/>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-2" style="text-align: left;">email</label>
                                <div class="col-lg-6">
                                    <input class="form-control" id="email" name="email" minlength="2"
                                           type="text" value="<?php echo $rowSupplier['email'] ?>" required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <!-- update asli -->
                                    <input type="submit" value="UPDATE" class="btn btn-primary" name="ubah">
                                    <!--  <button class="btn btn-primary" type="submit" name="ubah">UPDATE</button> -->
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
<!--body wrapper end-->