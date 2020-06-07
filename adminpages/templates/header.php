
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Apotek Livina</title>

    <!-- Bootstrap -->
    <link href="../../assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../assets/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../assets/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../assets/admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../../assets/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../../assets/admin/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="../../assets/admin/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../../assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../assets/admin/build/css/custom.min.css" rel="stylesheet">
    <link href="../../assets/admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="../../assets/admin/vendors/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/admin/vendors/select2/dist/js/select2.min.js"></script>

    <style>
      @media print
      {
        body {
          visibility : hidden;
        }
        #print-div, #print-div *{
          visibility : visible;
        }
        #print-div
        {
          position : absolute;
          top : 0;
          left : 0;
        }
      }
    </style>

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-plus-square"></i> <span>ApotekLivina</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info
            <div class="profile">
              <div class="profile_pic">
                <img src="../../assets/admin/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome</span>
                <h2>Lidia Pahlawan Pramesti</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3></h3>
                <ul class="nav side-menu">
				<?php if($_SESSION['level']=="A"){ ?>
				 <li><a href="<?php echo $admin_url; ?>home/main.php"><i class="fa fa-home"></i> Home </a></li>

				    <li><a href="#"><i class="fa fa-table"></i> Laporan </a></li>
					<li><a href="../logout.php"><i class="fa fa-sign-out"></i> LogOut </a></li>

				<?php } else { ?>

            <li><a href="<?php echo $admin_url; ?>home/main.php"><i class="fa fa-home"></i> Home </a></li>
				   <li><a href="<?php echo $admin_url; ?>kasir/main.php"><i class="fa fa-calculator"></i> Kasir </a></li>
           <!-- <li><a href="<?php echo $admin_url; ?>masterpasien/main.php"><i class="fa fa-user"></i> Master Pasien </a></li> -->
				    <li><a href="<?php echo $admin_url; ?>masterbarang/main.php"><i class="fa fa-cubes"></i> Data Barang </a></li>
            <li><a href="<?php echo $admin_url; ?>masterpembelian/main.php"><i class="fa fa-cubes"></i> Data Pembelian </a></li>
            <!-- <li><a href="<?php echo $admin_url; ?>masterresep/main.php"><i class="fa fa-file"></i> Master Resep </a></li> -->
					 <li><a href="<?php echo $admin_url; ?>mastersupplier/main.php"><i class="fa fa-users"></i>Data Supplier </a></li>
					  <li><a><i class="fa fa-table"></i>Laporan</a></li>
              <ul>
              <li><a href="<?php echo $admin_url; ?>transaksi/main.php">Transaksi</a></li>
              <li><a href="<?php echo $admin_url; ?>pembelian/main.php">Pembelian</a></li>
              <!-- <li><a href="<?php echo $admin_url; ?>pasien/main.php">Pasien</a></li> -->
              <li><a href="<?php echo $admin_url; ?>barang/main.php">Barang</a></li>
              <!-- <li><a href="<?php echo $admin_url; ?>resep/main.php">Resep</a></li> -->
              <li><a href="<?php echo $admin_url; ?>supplier/main.php">Supplier</a></li>
              </ul>


				   <!-- <li><a href="#"><i class="fa fa-user"></i> U</a></li> -->
					<li><a href="../logout.php"><i class="fa fa-sign-out"></i> LogOut </a></li>
				<?php } ?>
                </ul>
              </div>


            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->

            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

            </nav>
          </div>
        </div>
        <!-- /top navigation -->
