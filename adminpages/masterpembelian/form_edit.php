<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['level'])) {
    echo "<center>Untuk mengakses halaman, Anda harus login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
include "../../lib/config_web.php";
include "../../lib/koneksi.php";

$id_pembelian = $_GET['id_pembelian'];
$query = mysqli_query($koneksi, "SELECT * FROM beli WHERE id_pembelian='$id_pembelian'");

$dataBeli = mysqli_fetch_array($query); 

include "../templates/header.php"; ?>
      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>MASTER PEMBELIAN</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Edit Pembelian</h2>
  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
	  <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="aksi_edit.php">
		<input type="hidden" name="id_pembelian" value="<?php echo $dataBeli['id_pembelian'];?>">
	  <div class="form-group">

    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">ID Pembelian<span class="required"></span>
    </label>
    <div class="col-md-10 col-sm-10 col-xs-12">
      <input type="text" id="first-name" name="id_pembelian" value="<?php echo $dataBeli['id_pembelian'];?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>


    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">ID SUpplier<span class="required"></span>
    </label>
    <div class="col-md-10 col-sm-10 col-xs-12">
      <input type="text" id="first-name" name="id_supplier" value="<?php echo $dataBeli['id_supplier'];?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>

    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nama Supplier <span class="required"></span>
    </label>
    <div class="col-md-10 col-sm-10 col-xs-12">
      <input type="text" id="first-name" name="nama_supplier" value="<?php echo $dataBeli['nama_supplier'];?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>

    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Tanggal Beli <span class="required"></span>
    </label>
    <div class="col-md-10 col-sm-10 col-xs-12">
      <input type="text" id="first-name" name="tgl_beli" value="<?php echo $dataBeli['tgl_beli'];?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>

    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">No Bukti <span class="required"></span>
    </label>
    <div class="col-md-10 col-sm-10 col-xs-12">
      <input type="text" id="first-name" name="no_bukti" value="<?php echo $dataBeli['no_bukti'];?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>

    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Diskon <span class="required"></span>
    </label>
    <div class="col-md-10 col-sm-10 col-xs-12">
      <input type="text" id="first-name" name="diskon" value="<?php echo $dataBeli['diskon'];?>" required="required" class="form-control col-md-7 col-xs-12">
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