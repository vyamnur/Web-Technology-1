<?php

  session_start();

  require_once("connection.php");

  if(isset($_SESSION['mem_id']) == 0){
    header("location: login.php");
  }

  $userid = $_SESSION['mem_id'];

  $to_add = $_POST['amount'];

  $blah = mysql_query("select * from member where mem_id = $userid");
  $user = mysql_fetch_assoc($blah);
  $balance = $user['balance'];

  $total = $to_add + $balance;

  mysql_query("update member set balance = '$total' where mem_id = '$userid'");

  //echo $total;

  header("location: cart.php");

?>
