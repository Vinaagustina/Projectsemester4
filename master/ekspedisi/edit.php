<?php
error_reporting(0);
$id = $_GET['id'];
$queryRowCategory = $connect->query("SELECT * FROM ekspedisi where id_ekspedisi = '" . $id . "'");
$rowCategory = mysqli_fetch_array($queryRowCategory);
if (isset($_POST['ubah'])) {
    $queryUpdate = $connect->query("UPDATE ekspedisi SET  nmekspedisi = '" . $_POST['nmekspedisi'] . "' WHERE id_ekspedisi = '" . $id . "'");

}
if ($queryUpdate) {
    echo "<script> alert('Data Berhasil Disimpan'); location.href='index.php?hal=master/ekspedisi/list' </script>";
    exit;
}

?>
<!--body wrapper start-->
<div class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    EDIT Ekspedisi
                </header>
                <div class="panel-body">
                    <div class=" form">
                        <form class="cmxform form-horizontal adminex-form" id="commentForm" method="POST" action="">

                            <div class="form-group ">
                                <label for="cname" class="control-label col-lg-2" style="text-align: left;">Nama
                                    Ekspedisi</label>
                                <div class="col-lg-6">
                                    <input class="form-control" id="cname" name="nmekspedisi" minlength="2"
                                           type="text" value="<?php echo $rowCategory['nmekspedisi'] ?>" required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <!-- update asli -->
                                    <input type="submit" value="UPDATE" class="btn btn-primary" name="ubah">
                                    <!--  <button class="btn btn-primary" type="submit" name="ubah">UPDATE</button> -->
                                    <a href="?hal=master/ekspedisi/list">
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