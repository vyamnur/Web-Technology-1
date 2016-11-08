<?php
	function Connect()
{
 $dbhost = "localhost";
 $dbuser = "tutorial";
 $dbpass = "tutorial";
 $dbname = "tutorials";
 
 // Create connection
 $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);
 
 return $conn;
}
 
?>