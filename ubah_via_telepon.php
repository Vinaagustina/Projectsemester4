<?php
include 'config.php';

$id_customer = $_GET['id_customer'];

$caridata = $connect->query("SELECT * FROM customer WHERE id_customer = '$id_customer'");
$ambildata = mysqli_fetch_array($caridata);


?>

<div class="wrapper">
            <div class="row">
              
        <div class="col-md-12">

            <div class="panel">
                <div class="panel-body">
                    <h2>Input Data Pembeli Via Telpon</h2>
                    <div class="blog-post">
                        <div class="media">
                            <div class="panel-body">
                                <div class=" form">
                        <form class="cmxform form-horizontal adminex-form" method="POST" enctype="multipart/form-data"
                              action="">
                            <div class="form-group ">
                                <label for="nama" class="control-label col-lg-3" style="text-align: left;">Nama Pembeli</label>

                                <input type="hidden" name="cash" value="<?php echo $_POST['cash']; ?>">

                                <input type="hidden" name="id_orders" value="<?php echo $id_orders; ?>">

                                <input type="hidden" name="id_session" value="<?php echo $kembali; ?>">

                                <div class="col-lg-8">
                                    <input class=" form-control" id="id_orders" name="id_orders" minlength="2"  
                                           type="hidden" value="<?=$id_orders; ?>" required  />
                                </div>
                                <div class="col-lg-8">
                                    <input class=" form-control" id="nama" name="nama" minlength="2"  
                                           type="text" required value="<?=$ambildata['nama_pembeli'];?>" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="alamat" class="control-label col-lg-3" style="text-align: left;">Alamat</label>
                                <div class="col-lg-8">
                                    <textarea class=" form-control" id="alamat" name="alamat" minlength="2"
                                           type="text" value="<?=$ambildata['alamat_pembeli'];?>" required/><?=$ambildata['alamat_pembeli'];?></textarea>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="kelurahan" class="control-label col-lg-3" style="text-align: left;">Kelurahan</label>
                                <div class="col-lg-8">
                                    <input class=" form-control" id="kelurahan" name="kelurahan" minlength="2"  
                                           type="text" required value="<?=$ambildata['kelurahan'];?>" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="kecamatan" class="control-label col-lg-3" style="text-align: left;">Kecamatan</label>
                                <div class="col-lg-8">
                                    <input class=" form-control" id="kecamatan" name="kecamatan" minlength="2"  
                                           type="text" required value="<?=$ambildata['kecamatan'];?>" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="kabkot" class="control-label col-lg-3" style="text-align: left;">Kabupaten / Kota</label>
                                <div class="col-lg-8">
                                    <input class=" form-control" id="kabkot" name="kabkot" minlength="2"  
                                           type="text" required value="<?=$ambildata['kabkot'];?>" />
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="provinsi" class="control-label col-lg-3" style="text-align: left;">Provinsi</label>
                                <div class="col-lg-8">
                                    <input class=" form-control" id="provinsi" name="provinsi" minlength="2"  
                                           type="text" required value="<?=$ambildata['prov'];?>" />
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="no" class="control-label col-lg-3" style="text-align: left;">Nomor Hp</label>
                                <div class="col-lg-8">
                                    <input class=" form-control" id="no" name="no" minlength="2"  
                                           type="text" required value="<?=$ambildata['no_telepon'];?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-primary" type="submit" name="ubah" value="ubah">ubah</button>
                                    <a href="?hal=via_telpon">
                                        <button class="btn btn-default" type="button">Cancel</button>
                                    </a>
                                </div>
                            </div>
                        </form>
<?php

include 'config.php';

    if (isset($_POST['ubah'])){
        $nama = htmlspecialchars($_POST['nama']);
        $alamat = htmlspecialchars($_POST['alamat']);
        $kelurahan = htmlspecialchars($_POST['kelurahan']);
        $kecamatan = htmlspecialchars($_POST['kecamatan']);
        $kabkot = htmlspecialchars($_POST['kabkot']);
        $provinsi = htmlspecialchars($_POST['provinsi']);
        $no = htmlspecialchars($_POST['no']);

        // var_dump($id_orders);echo "<br>";
        // var_dump($nama);echo "<br>";
        // var_dump($alamat);echo "<br>";
        // var_dump($kelurahan);echo "<br>";
        // var_dump($kecamatan);echo "<br>";
        // var_dump($kabkot);echo "<br>";
        // var_dump($provinsi);echo "<br>";
        // var_dump($pengiriman); echo "<br>";
        // var_dump($no);echo "<br>";
        // var_dump($jam_skrg);echo "<br>";

        $sql = $connect->query("UPDATE customer SET 
            nama_pembeli = '$nama',
            alamat_pembeli = '$alamat',
            kelurahan =  '$kelurahan',
            kecamatan =  '$kecamatan',
            kabkot = '$kabkot',
            prov = '$provinsi',
            no_telepon = '$no'
            WHERE id_customer = '$id_customer'
            ");     

        if($sql === TRUE){
               echo "<script> alert('Data Customer Berhasil Diubah'); location.href='?hal=via_telpon' </script>";exit;
           }
     }

?>



                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
        <!--body wrapper end-->
