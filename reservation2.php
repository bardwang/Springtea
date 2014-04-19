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
<form action="reservation2.php" method="get">
<h1 class="info">Reservation</h1>
<a class="input" href="cart.php">Click to Check Your Orders</a><br><br>
<p class="redp">
First Name:
<input type="text" name="firstname" size="10" maxlength="20" value="<?=$_GET['firstname']?>"  readonly="readonly"/><br>
Last Name:
<input type="text" name="lastname" size="10" maxlength="20" value="<?=$_GET['lastname']?>"  readonly="readonly"/><br>
Delivery Date:
<input type="date" name="date" value="<?=$_GET['date']?>" /></p>
<?php
// to count the recommended shipping speed
$todaydate = date('m/d/Y', time());
$todaycount = strtotime(date('m/d/Y', time()));
$duedaycount = strtotime($_GET['date']);
$count = ($duedaycount - $todaycount) / 86400;
// to count and recommended shipping days
$count2 = 0;
echo "<p class= 'red'>Today's date: " . $todaydate . "<br>";
if($count < 0){
echo "<p class = 'red'>Please enter the correct delivery date</p>";
}
else if($count < 1){
echo "<p class = 'red'>It is too late, please change another date</p>";
}
else if($count < 2){
$count2 = 1;
echo "<p class = 'red'>Recommend Shipping Speed: One Day Shipping</p>";
}
else if($count < 6){
$count2 = 2;
echo "<p class = 'red'>Recommend Shipping Speed: Two Days Shipping</p>";
}
else if($count < 11){
$count2 = 5;
echo "<p class = 'red'>Recommend Shipping Speed: Standard Shipping</p>";
}
else{
$count2 = 10;
echo "<p class = 'red'>Recommend Shipping Speed: Economy Shipping</p>";
}
?>
<p>Shipping Speed: <select name="shippingspeed" value="<?=$_GET['shippingspeed']?>" />
        <option value="1">One Day Shipping $50</option>
        <option value="2">Two Days Shipping $25</option>
		<option value="5">Standard Shipping $15</option>
        <option value="10">Economy Shipping $10</option>
		</select><br>
Address: <input type="text" name="address" size="30" maxlength="50" value="<?=$_GET['address']?>"  readonly="readonly"/>
City: <select name="city" value="<?=$_GET['city']?>" readonly="readonly">
        <option value="Boston">Boston</option>
        <option value="Quincy">Quincy</option>
		<option value="Cambridge">Cambridge</option>
        <option value="Malden">Malden</option>
		<option value="Newton">Newton</option>
		</select><br>
ZipCode: <input type="text" name="zipcode" size="5" maxlength="5" value="<?=$_GET['zipcode']?>"  readonly="readonly"/></p>
<input type="submit" name="submit" value="submit" /><br>

<?php
// The information for date
$todaydate = date('m/d/Y', time());
$todaycount = strtotime(date('m/d/Y', time()));
$duedaycount = strtotime($_GET['date']);
$count = ($duedaycount - $todaycount) / 86400;

// Connect to MySQL.
	require ('mysql_connect.php');
	
// to get the email	
	$d = "bardwangsql";
	$q = "SELECT * FROM $d.user WHERE username = '".$_COOKIE['username']."'";
	$r = mysql_query ($q); // Run the query.
	// Fetch and print all the records:
	while ($row = mysql_fetch_array($r, MYSQLI_ASSOC)) {
	$email = $row['email'];
	}
	
// The information for email
$to      = $email;
$subject = "Reservation From Springtea.com";
$message = "Dear " . $_GET['firstname'] . " " . $_GET['lastname'] . ",\n\nThank you for your reservation!\n
Your order will be delivered to " . $_GET['address'] . " in " . $_GET['city'] . " on " . $_GET['date'] . ".\n
Please email us if you have any question.\n
Check your orders at http://www.bardwang.com/Springtea/confirmation.php \n
Springtea.com";
$headers = 'From: Reservation@springtea.com' . "\r\n" . 'Reply-To: Reservation@springtea.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

$message2 = "" . $_GET['address'] . " in " . $_GET['city'] . "<br>Date: " . $_GET['date'] . "";

// database
	$d = "bardwangsql";
	$q = "SELECT * FROM $d.order2 WHERE username = '".$_COOKIE['username']."' AND confirm = 0";
	$r = mysql_query ($q); // Run the query.

// to check if there is no order	
$flag = 0;

	if(mysql_fetch_array($r, MYSQLI_ASSOC) <= 0){
    echo "<p class = 'red'>Sorry, you have no orders</p>";
	}
	else{
	$flag = 1;
	}

if($count >= 1 && $count >= $_GET['shippingspeed'] && $_GET['shippingspeed'] == $count2 && $flag == 1){
 
	mail($to, $subject, $message, $headers);
	
	// to update order information
	$q = "UPDATE $d.order2
	SET order_date = CURRENT_TIMESTAMP
	WHERE username = '".$_COOKIE['username']."' AND confirm = 0";
	$r = mysql_query ($q); // Run the query.
	
	$q = "UPDATE $d.order2
	SET confirm = confirm + 1
	WHERE username = '".$_COOKIE['username']."'";
	$r = mysql_query ($q); // Run the query.
	
	$q = "INSERT INTO $d.reservation2 (username, speed, deliver_date, address)
	VALUES ('".$_COOKIE['username']."', '".$_GET['shippingspeed']."', '".$_GET['date']."', '".$message2."')";
	$r = mysql_query ($q);
	
	printf("<script>location.href='confirmation.php'</script>");
}
?>
</form>
</fieldset>

<hr>
<p class="red"><a href="Credit.html">Credits</a>&nbsp;&nbsp;&nbsp;&nbsp;
</p>
</body>
</html>
