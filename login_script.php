<?php

	session_start();

	require_once('connection.php');

	$errarr = array();

	$error_flag = false;

	$username = $_POST['username'];
	$password = $_POST['password'];

	if($username == '') {
		$errarr[] = 'Username missing ';
		$error_flag = true;
	}
	if($password == '') {
		$errarr[] = 'Password missing ';
		$error_flag = true;
	}
	if($error_flag) {
		$_SESSION['LOGIN_ERROR_ARRAY'] = $errarr;
		session_write_close();
		header("location: login.php");
		exit();
	}

	echo($username.$password);

	$result=mysql_query("SELECT * FROM member WHERE username = '$username' AND password = '$password' ");

	if($result) {

		if(mysql_num_rows($result) > 0) {
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['mem_id'] = $member['mem_id'];
			$_SESSION['fname'] = $member['fname'];
			$_SESSION['lname'] = $member['lname'];
			session_write_close();
			header("location: index.php");
			exit();
		}else {
			$errarr[] = 'User name or password not found';
			$error_flag = true;
			if($error_flag) {
				$_SESSION['LOGIN_ERROR_ARRAY'] = $errarr;
				session_write_close();
				header("location: login.php");
				exit();
			}
		}
	}else {
		die("Query failed");
	}
?>
