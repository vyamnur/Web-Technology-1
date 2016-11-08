<?php
	//Start session
	session_start();
	//Unset the variables stored in session
	unset($_SESSION['mem_id']);
	unset($_SESSION['fname']);
	unset($_SESSION['lname']);
	?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<meta name="description" content="Online market">
	<meta name="keywords" content="sign in">
	<meta name="author" content="Villain Associates">
		<title>Sign up for the Shady Mart</title>
		<link rel="stylesheet" type="text/css" href="/styles/main.css"/>
		<link rel="stylesheet" type="text/css" href="/styles/form.css"/>
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
.err {
	color: red;
	background-color: white;
}
.page-end{
	position:absolute;
	top:500px;
}
		</style>

		<!--<script>
			var username = document.getElementById("username")
			username.addEventListener("focus",showPlaceHolder(username));
			function showPlaceHolder(temp){
				temp.placeholder = "Enter your username";
				temp.setAttribute("style","background-color:#f2f2f2");
			}
		</script>-->

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
		<div id="showcase1" class="signin">
			<h2 class="signinbanner">Welcome to Shady Mart.</br>Sign up to embrace the shady.</h2>
			<form id="signin" action="/signup_script.php" name="signup" method = "post">
					<table width="309" border="0" align="center" cellpadding="2" cellspacing="5">
						<tr>
							<td colspan="2">
									 <?php
										if( isset($_SESSION['SINUP_ERRMSG_ARR'])) {
										echo '<ul class="err">';
										foreach($_SESSION['SINUP_ERRMSG_ARR'] as $msg) {
											echo '<li>',$msg,'</li>';
										}
											echo '</ul>';
											unset($_SESSION['SINUP_ERRMSG_ARR']);
										}
									?>
							</td>
						</tr>
						<tr>
							<td width="116"><div align="right">Username</div></td>
							<td width="177"><input name="username" type="text" /></td>
						</tr>
						<tr>
							<td><div align="right">Password</div></td>
							<td><input name="password" type="password" /></td>
						</tr>
						<tr>
							<td><div align="right">First Name</div></td>
							<td><input name="fn" type="text" /></td>
						</tr>
						<tr>
							<td><div align="right">Last Name</div></td>
							<td><input name="ln" type="text" /></td>
						</tr>
						<tr>
							<td><div align="right"></div></td>
							<td><input name="" type="submit" class = "btn" value="Sign Up" /></td>
						</tr>
					</table>
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
			</html>
