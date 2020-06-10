<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>Login | Livina Store</title>

    <link rel="icon" href="assets/images/logo.ico">
    <link href="assets/css/css.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>  test
    <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body class="login-page">
    <div class="container">
        <form class="form-signin" action="login-check.php" method="POST">
            <div class="login-logo">
                <img src="assets/images/logo.png" style="width: 50%; height: auto"/>
            </div>
            <div class="login-wrap">
                <?php
                error_reporting(0);
                if ($_GET['action'] == 'failed') {
                ?>
                <!-- <b style="color:red">Login Gagal..!!!</b> -->
                <div class="salah" style="background-color:red">
                    <p>Username atau Pasword Salah</p>
                </div>
                <?php
                }?>
                <input type="text" class="form-control" name="frm_username" placeholder="Username" autofocus>
                <input type="password" class="form-control" name="frm_password" placeholder="Password">

                <button class="btn btn-block btn-primary" type="submit">Login</button>
            </div>
        </form>
        <div class="brand" align="center">
            <h2>Livina
            <svg class="bi bi-handbag-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 1a2 2 0 0 0-2 2v2H5V3a3 3 0 1 1 6 0v2h-1V3a2 2 0 0 0-2-2z"/>
                <path d="M3.405 5a1.5 1.5 0 0 0-1.493 1.35L1 13.252A2.5 2.5 0 0 0 3.488 16h9.024A2.5 2.5 0 0 0 15 13.251l-.912-6.9A1.5 1.5 0 0 0 12.595 5H11v2.5a.5.5 0 1 1-1 0V5H6v2.5a.5.5 0 0 1-1 0V5H3.405z"/>
            </svg>
            Store</h2>
            <p>Copyright &copy; 2020 LivinaStore.All Rights Reserved</p>
        </div>
    </div>
<!-- Placed js at the end of the document so the pages load faster -->

<!-- Placed js at the end of the document so the pages load faster -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>

</body>
</html>
