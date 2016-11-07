<?php
	session_start();

	require_once('connection.php');

  $id = $_POST['id'];
  if(isset($_SESSION['cartArray'])) {
    if(in_array($id, $_SESSION['cartArray'])){}
      //  echo "Already exists";
      else {
        $_SESSION['cartArray'][] = $id;
      }
  }
  else {
    $blah = array();
    $blah[] = $id;
    $_SESSION['cartArray'] = $blah;
  }

  session_write_close();

  header("location: index.php");

  echo "<a href = index.php>Go Back</a>";

  ?>
