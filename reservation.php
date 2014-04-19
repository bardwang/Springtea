<!doctype html>
<?php
if(!isset($_COOKIE["username"])){
printf("<script>location.href='login.php'</script>");
}
else{
$username = $_COOKIE["username"];
echo "<div class='welcome'>Welcome $username</div>";
}
?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="Springtea.css">
<script src="files/jquery.min.js"></script>
<script src="files/jquery.validate.min.js"></script>
<script src="files/validation.js"></script>
<script src="files/login.js"></script>
<title>Spring Tea - Your Reservation</title>
</head>
<body>
<h1><em>Spring Tea - Your Reservation</em></h1>
<div class ="navbar">
<ul>
<li><a href="Springtea.php">Home</a></li>
<li class="confirm"><a href="account.php">Your Account</a>
	<ul class="subnavbar">
		<li><a href="confirmation.php">Your Orders</a></li>
     </ul>
</li>
<li><a href="teainfo.php">Tea Info</a>
	<ul class="subnavbar">
		<li><a href="regular_tea.php">Regular Tea</a></li>
		<li><a href="pu-erh_tea.php">Pu-erh Tea</a></li>
		<li><a href="teapot.php">Teapot</a></li>
     </ul>
</li>
<li class="order"><a href="cart.php" class="here">Cart</a>
</li>
<li><a href="contact_info.php">Contact Info</a></li>
</ul>
</div>
<br><br><br><br><br>

<fieldset>
<h1 class="info">Reservation</h1>
<a class="input" href="cart.php">Click to Check Your Orders</a><br><br>
<form id="form" action="reservation2.php" method="get">
<p class="redp">First Name:
<input type="text" name="firstname" size="10" maxlength="20" /><br>
Last Name:
<input type="text" name="lastname" size="10" maxlength="20" /><br>
Delivery Date: <input type="date" name="date" /><br>
Shipping Speed: <select name="shippingspeed">
		<option value="">Shipping Speed</option>
        <option value="1">One Day Shipping $50</option>
        <option value="2">Two Days Shipping $25</option>
		<option value="5">Standard Shipping $15</option>
        <option value="10">Economy Shipping $10</option>
		</select><br>
Address: <input type="text" name="address" size="30" maxlength="50" />
City: <select name="city">
        <option value="Boston">Boston</option>
        <option value="Quincy">Quincy</option>
		<option value="Cambridge">Cambridge</option>
        <option value="Malden">Malden</option>
		<option value="Newton">Newton</option>
		</select><br>
ZipCode: <input type="text" name="zipcode" size="5" maxlength="5" /></p>

<input type="submit" name="submit" value="Submit" />

</form>
</fieldset>

<hr>
<p class="red"><a href="Credit.html">Credits</a>&nbsp;&nbsp;&nbsp;&nbsp;
</p>
</body>
</html>
