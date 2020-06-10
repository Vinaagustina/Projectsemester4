<?php
if (isset($_GET['hapus'])) {
   // $queryHapus = mysql_query("DELETE FROM category where category_id = '" . $_GET['hapus'] . "'");
    $queryHapus = $connect->query("DELETE FROM ekspedisi where id_ekspedisi = '" . $_GET['hapus'] . "'");
    if ($queryHapus) {
        echo "<script> alert('Data Berhasil Dihapus'); location.href='index.php?hal=master/ekspedisi/list' </script>";
        exit;
    }
}
?>
<div class="wrapper">
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    Data Ekspedisi
                    <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                        <a href="javascript:;" class="fa fa-times"></a>
                     </span>
                </header>
                <div class="panel-body">
                    <div class="adv-table editable-table ">
                        <div class="clearfix">
                            <div class="btn-group">

                                <a href="?hal=master/ekspedisi/add">
                                    <button data-toggle="modal" class="btn btn-primary">
                                        Tambah Baru <i class="fa fa-plus"></i>
                                    </button>
                                </a>
                            </div>
                            <div class="btn-group pull-right">
                                <!--  <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                 </button>
                                 <ul class="dropdown-menu pull-right">
                                     <li><a href="#">Print</a></li>
                                     <li><a href="#">Save as PDF</a></li>
                                     <li><a href="#">Export to Excel</a></li>
                                 </ul> -->
                            </div>
                        </div>
                        <div class="space15"></div>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                            <tr>
                                <th>Nama Ekspedisi</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 0;
                            //$queryCategory = mysql_query("SELECT * FROM category ORDER BY category_id DESC");
                            $queryEkspedisi = $connect->query("SELECT * FROM ekspedisi ORDER BY id_ekspedisi DESC");
                            while ($rowEkspedisi = mysqli_fetch_array($queryEkspedisi)) {
                                ?>
                                <tr class="">

                                    <td><?php echo $rowEkspedisi['nmekspedisi']; ?></td>
                                    <td>


                                        <a href="?hal=master/ekspedisi/edit&id=<?php echo $rowEkspedisi['id_ekspedisi']; ?>">
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-edit"></i>
                                                Edit
                                            </button>
                                        </a>
                                        <a href="?hal=master/ekspedisi/list&hapus=<?php echo $rowEkspedisi['id_ekspedisi']; ?>">
                                            <button class="btn btn-danger" type="submit" name="hapus"><i
                                                        class="fa fa-trash-o"></i> Delete
                                            </button>
                                        </a>
                                        <!-- user -->
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