<?php
  session_start();

  require_once('connection.php');

  if(isset($_SESSION['mem_id']) == 1){
    $flag = 1;
    $userid = $_SESSION['mem_id'];
    $blah = mysql_query("select * from member where mem_id = $userid");
    $user = mysql_fetch_assoc($blah);
    $balance = $user['balance'];
  }
  else {
    $flag = 0;
  }

?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
  <meta name="description" content="Online market">
  <meta name="keywords" content="sign in">
  <meta name="author" content="Villain Associates">
    <title>Welcome to Shady Mart</title>
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
.page-end-cart {
  background:#ffffff;
	font-family: 'Droid Sans', sans-serif;
	width:99%;
	height:20%;
}
#showcase1{
	position:relative;
	top:200px;
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
    <div class="signin">
      <h2 class="signinbanner">
      <?php
      if(isset($_SESSION['checkout_done']) == 1){
        echo "Checkout Successful!";
        unset($_SESSION['checkout_done']);
      }
      else if(isset($_SESSION['low_balance'])==1){
          unset($_SESSION['low_balance']);
          echo "<font color = red>Insufficient balance</font>";
		}
		else if(isset($_SESSION['cartArray']) == 0) {
           echo "Cart is empty";
       }
       else {
          echo "Your cart:";
        }
      ?>
    </h2><center>
      <?php
        if($flag == 1){

          echo "<form action='addFunds.php' method = 'post'>";
          echo "Balance: $balance  ";
          echo "<input type = text name = 'amount'>";
          echo "<input type = submit value = 'Add Funds'>";
          echo "</form>";
        }

      ?>

    </center>
      <form id="signin" action="/checkout.php" name="signin" method = "post">
          <?php
            $total = 0;
            if(isset($_SESSION['cartArray']) == 1) {
				echo "<table width='1000' border='2' align='center' cellpadding='2' cellspacing='5'>
                 <tr>
                   <td>Name</td>
                   <td>Description</td>
                   <td>Image</td>
                   <td>Price</td>
                 </tr>";
              foreach($_SESSION['cartArray'] as $value){

                $retval = mysql_query("SELECT * FROM products where id_product = '$value'");


                $row = mysql_fetch_array($retval,MYSQL_ASSOC);

                $data = $row["name"];
                $desc = $row["description"];
                $price = $row["price"];
                $img = $row["imgpath"];
                $total = $total + $price;
                echo "<tr><td>$data</td><td>$desc</td><td>";
                echo "<img src = $img height='120' width='120'></td><td>$price</td></tr>";

              }
              echo "<tr><td colspan = 3 align = right>Total: </td><td>$total</td></tr>";
              echo "<tr><td colspan = 2 align = 'center'><a href = 'clear.php'>Clear cart</a><td colspan = 2 align = center><input type = submit value = 'Checkout' class = 'btn' /></td></tr></table>";

              echo "<input type = text value = $total style = 'visibility: hidden' name = price />";

            }
            else {
              echo "</table>";
            }
            ?>
    </form>
    </div>
  </body>
</html>
