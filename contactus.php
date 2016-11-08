<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--<link rel="stylesheet" href="styles/reset.css" />-->
    <link rel="stylesheet" href="styles/style.css" />
	<meta charset="UTF-8">
	<meta name="description" content="Online market">
	<meta name="keywords" content="Gaming,media,cool stuff">
	<meta name="author" content="Villain Associates">
		<title>Welcome to Shady Mart</title>
		<link rel="stylesheet" type="text/css" href="/styles/main.css"/>
		<link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<!-- ****** faviconit.com favicons ****** -->
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="icon" sizes="16x16 32x32 64x64" href="/faviconit/favicon.ico">
	<link rel="icon" type="image/png" sizes="196x196" href="/faviconit/favicon-192.png">
	<link rel="icon" type="image/png" sizes="160x160" href="/faviconit/favicon-160.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/faviconit/favicon-96.png">
	<link rel="icon" type="image/png" sizes="64x64" href="/faviconit/favicon-64.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/faviconit/favicon-32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/faviconit/favicon-16.png">
	<link rel="apple-touch-icon" href="/faviconit/favicon-57.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/faviconit/favicon-114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/faviconit/favicon-72.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/faviconit/favicon-144.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/faviconit/favicon-60.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/faviconit/favicon-120.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/faviconit/favicon-76.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/faviconit/favicon-152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/faviconit/favicon-180.png">
	<meta name="msapplication-TileColor" content="#FFFFFF">
	<meta name="msapplication-TileImage" content="//faviconit/favicon-144.png">
	<meta name="msapplication-config" content="/faviconit/browserconfig.xml">
	<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: red;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}
		</style>

		<script type="text/javascript">

		</script>

	</head>
	<body>
		<div class="headpage">
			<a href="/signup.php" id="sign-up" class="btn3">Sign up</a>
			<a href="/login.php" id="login" class="btn3">Log in</a>
			<a href="/index.php"><img class="pagelogo" src="/images/shadymart.png" alt="ShadyMart"/></a>
			<h1 class="page-title">Shady Mart</h1>
			<form action="search.php?go" name="searchform" method="post">
			<input type="text" class="searchbar" name="name" placeholder="Search Here"/>
			<input type="submit" id="sbutton" name="submit" class="btn" value="Search"/> 
			</form>
			<div id="nav">
			<ul>
				<li><a class="active" href="aboutus.html">About Us</a></li>
				<li class="dropdown">
					<a href="#" class="dropbtn">Categories</a>
					<div class="dropdown-content">
						<a href="/sports.html">Sports</a>
						<a href="/games.html">Gaming,books and media</a>
						<a href="/elec.html">Electronic Appliances</a>
					</div>
				</li>
				<?php
 					if( isset($_SESSION['fname']) ){
 						echo '<li><a class="active">Hello '.$_SESSION['fname'].'!</a></li>';
 					}
				?>
			</ul>
			</div>
<a href = cart.php><input type="button" id="cart" class="shoppingcart" onclick="ShoppingCart()"/></a>
		</div>
		<div id = "showcase1" class="showcase" style="overflow-x:auto;">
			<h3>Contact Us</h3>
		<form action="thankyou.php" method="post">
		Name:</br>
		<input type="text" name="u_name" required></br>
		Email:</br>
  <input type="email" name="u_email" required><br>
 
Subject:<br>
  <input type="text" name="subj" required><br>
 
Message:<br>
  <input type="text" name="message" required><br>
<input type="submit" value="Submit"><br>
</form>
		</div>
		<div class="page-end">
			<a href="contactus.php"  id="contactbutton" class="btn2">Contact Us</a>
			<img src="/images/sprite1.jpg" alt="fbook" id="fcontact"/>
			<img src="/images/sprite2.png" alt="twitter" id="tcontact"/>
			<p id="aboutsite">Despite our name,we're 100% legit.Shh,it's a Secret to everyone.</p>
			<p id="disclaimers">&copyVillainAssociates 2016<br>All rights reserved<br></p>
		</div>
	</body>
	<?php mysql_close();?>
</html>
