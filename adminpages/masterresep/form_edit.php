<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['level'])) {
    echo "<center>Untuk mengakses halaman, Anda harus login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
include "../../lib/config_web.php";
include "../../lib/koneksi.php";

$id_resep = $_GET['id_resep'];
$query = mysqli_query($koneksi, "SELECT * FROM resep WHERE id_resep='$id_resep'");

$dataResep = mysqli_fetch_array($query); 

include "../templates/header.php"; ?>
      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>MASTER RESEP</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Edit Resep</h2>
  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
	  <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="aksi_edit.php">
		<input type="hidden" name="id_resep" value="<?php echo $dataResep['id_resep'];?>">
	  <div class="form-group">

    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">ID Resep<span class="required"></span>
    </label>
    <div class="col-md-10 col-sm-10 col-xs-12">
      <input type="text" id="first-name" name="id_resep" value="<?php echo $dataResep['id_resep'];?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>

		<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">ID Pasien <span class="required"></span>
		</label>
		<div class="col-md-10 col-sm-10 col-xs-12">
		  <input type="text" id="first-name" name="id_pasien" value="<?php echo $dataResep['id_pasien'];?>" required="required" class="form-control col-md-7 col-xs-12">
		</div>

    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">nama_pasien <span class="required"></span>
    </label>
    <div class="col-md-10 col-sm-10 col-xs-12">
      <input type="text" id="first-name" name="nama_pasien" value="<?php echo $dataResep['nama_pasien'];?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>

    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Alamat Pasien <span class="required"></span>
    </label>
    <div class="col-md-10 col-sm-10 col-xs-12">
      <input type="text" id="first-name" name="alamat_pasien" value="<?php echo $dataResep['alamat_pasien'];?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>

     <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Keluhan <span class="required"></span>
    </label>
    <div class="col-md-10 col-sm-10 col-xs-12">
      <input type="text" id="first-name" name="keluhan" value="<?php echo $dataResep['keluhan'];?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>

    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nama Obat <span class="required"></span>
    </label>
    <div class="col-md-10 col-sm-10 col-xs-12">
      <input type="text" id="first-name" name="nama_obat" value="<?php echo $dataResep['nama_obat'];?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>

    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Jumlah Obat <span class="required"></span>
    </label>
    <div class="col-md-10 col-sm-10 col-xs-12">
      <input type="text" id="first-name" name="jml_obat" value="<?php echo $dataResep['jml_obat'];?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>

    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Aturan Pakai <span class="required"></span>
    </label>
    <div class="col-md-10 col-sm-10 col-xs-12">
      <input type="text" id="first-name" name="aturan_pakai" value="<?php echo $dataResep['aturan_pakai'];?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>

    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Harga <span class="required"></span>
    </label>
    <div class="col-md-10 col-sm-10 col-xs-12">
      <input type="text" id="first-name" name="harga" value="<?php echo $dataResep['harga'];?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>



	  <div class="ln_solid"></div>
	  <div class="form-group">
		<div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-2">
		  <button type="submit" class="btn btn-primary">Batal</button>
		  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>Simpan</button>
		</div>
	  </div>

	  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
		<?php include "../templates/footer.php"; 
		}
		?>