<?php
  session_start();
  unset($_SESSION['cartArray']);
  header("location: index.php");
?>
