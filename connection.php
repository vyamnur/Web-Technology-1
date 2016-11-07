<?php
  $mysql_hostname = "localhost";
  $mysql_user = "bf3";
  $mysql_password = "bf3";
  $mysql_database = "shadymart";
  $prefix = "";
  $bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Connection to the database could not be established");
  mysql_select_db($mysql_database, $bd) or die("Error in selecting database");
?>
