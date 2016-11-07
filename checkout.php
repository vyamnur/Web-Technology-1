<?php
  session_start();

  require_once('connection.php');

  if(isset($_SESSION['mem_id']) == 0){
    header("location: login.php");
  }

  $userid = $_SESSION['mem_id'];
  //echo $userid;
  $total = $_POST['price'];

  //echo $total;
  $blah = mysql_query("select * from member where mem_id = $userid");
  $user = mysql_fetch_assoc($blah);
  $balance = $user['balance'];
//  echo $balance;
  if($balance >= $total) {
    $diff = $balance - $total;
    mysql_query("update member set balance = '$diff' where mem_id = '$userid'");
    $_SESSION['checkout_done'] = 1;
    unset($_SESSION['cartArray']);
  }
  else {
    $_SESSION['low_balance'] = 1;
//    echo "Insufficient funds";
    }
    header("location: cart.php");

?>
