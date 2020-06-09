
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
              <a href="main.php" class="site_title">
              <svg class="bi bi-handbag-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 1a2 2 0 0 0-2 2v2H5V3a3 3 0 1 1 6 0v2h-1V3a2 2 0 0 0-2-2z"/>
                <path d="M3.405 5a1.5 1.5 0 0 0-1.493 1.35L1 13.252A2.5 2.5 0 0 0 3.488 16h9.024A2.5 2.5 0 0 0 15 13.251l-.912-6.9A1.5 1.5 0 0 0 12.595 5H11v2.5a.5.5 0 1 1-1 0V5H6v2.5a.5.5 0 0 1-1 0V5H3.405z"/>
              </svg>
              <span>Livina Store</span></a>
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

            <br/>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu" id="menu">
				          <?php if($_SESSION['level']=="A"){ ?>
				            <li><a href="<?php echo $admin_url; ?>home/main.php"><i class="fa fa-home"></i> Home </a></li>
                    <li><a href="#"><i class="fa fa-table"></i> Laporan </a></li>
                    <li><a href="../logout.php"><i class="fa fa-sign-out"></i> LogOut </a></li>
                  <?php } else { ?>
                    <li><a href="<?php echo $admin_url; ?>home/main.php"><i class="fa fa-home"></i> Home </a></li>
                    <li><a href="<?php echo $admin_url; ?>kasir/main.php"><i class="fa fa-calculator"></i> Kasir </a></li><li><a href="<?php echo $admin_url; ?>masterbarang/main.php"><i class="fa fa-cubes"></i> Data Barang </a></li>
                    <li><a href="<?php echo $admin_url; ?>masterpembelian/main.php"><i class="fa fa-file"></i>Data Pembelian</a></li>
                    <li><a href="<?php echo $admin_url; ?>mastersupplier/main.php"><i class="fa fa-users"></i>Data Supplier </a></li>
                    <li><a><i class="fa fa-table"></i>Laporan</a>
                    <ul>
                      <li><a href="<?php echo $admin_url; ?>transaksi/main.php">Transaksi</a></li>
                      <li><a href="<?php echo $admin_url; ?>pembelian/main.php">Pembelian</a></li>
                      <li><a href="<?php echo $admin_url; ?>barang/main.php">Barang</a></li>
                      <li><a href="<?php echo $admin_url; ?>supplier/main.php">Supplier</a></li>
                    </ul></li>
                    <li><a href="../logout.php"><i class="fa fa-sign-out"></i> LogOut </a></li>
                    <?php } ?>
                </ul>
              </div>
            </div>

            <!-- /menu footer buttons -->
          </div>
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