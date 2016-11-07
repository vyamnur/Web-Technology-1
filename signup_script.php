<?php
  session_start();

  require_once('connection.php');

  $username = $_POST['username'];
  $password = $_POST['password'];
  $fname = $_POST['fn'];
  $lname = $_POST['ln'];

  $errarr = array();
  $error_flag = false;

  if($username == '') {
    $errarr[] = 'Username missing ';
    $error_flag = true;
  }

  if($password == '') {
    $errarr[] = 'Password missing ';
    $error_flag = true;
  }

  if($fname == '') {
    $errarr[] = 'First name missing ';
    $error_flag = true;
  }

  if($lname == '') {
    $errarr[] = 'Last name missing ';
    $error_flag = true;
  }

  if($error_flag) {
		$_SESSION['SINUP_ERRMSG_ARR'] = $errarr;
    session_write_close();
  	header("location: signup.php");
		exit();
	}

  $result=mysql_query("SELECT * FROM member WHERE username = '$username'");
  $EXISTS = mysql_fetch_assoc($result)['username'];

  if($EXISTS) {
    $errarr[] = 'Username already exists';
    $error_flag = true;
    if($error_flag) {
      $_SESSION['SINUP_ERRMSG_ARR'] = $errarr;
      session_write_close();
      header("location: signup.php");
      exit();
    }
  }
  else {
    $result=mysql_query("insert into member(username, password, fname, lname) values('$username', '$password', '$fname', '$lname')");
    echo $result;
  }
?>
