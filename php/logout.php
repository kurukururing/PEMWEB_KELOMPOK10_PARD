<?php
  session_start();
  session_destroy();

  header("location:./akun.php#login");
  exit();
?>