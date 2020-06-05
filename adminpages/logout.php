<?php
  session_start();
  unset ($_SESSION['username']);
  session_destroy();
  echo "<script>alert('Anda telah keluar dari halaman administrator'); window.location = 'index.php'</script>";

?>