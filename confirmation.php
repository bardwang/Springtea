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
<script src="files/login.js"></script>

<title>Spring Tea - Your Order</title>
</head>
<body>
<h1><em>Spring Tea - Your Order</em></h1>
<div class ="navbar">
<ul>
<li><a href="Springtea.php">Home</a></li>
<li class="confirm"><a href="account.php" class="here">Your Account</a>
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
<li class="order"><a href="cart.php">Cart</a>
</li>
<li><a href="contact_info.php">Contact Info</a></li>
</ul>
</div>
<br><br><br><br><br>

<fieldset>

<?php
// Connect to MySQL.
require ('mysql_connect.php');  

// Connect to the Database
// Name for the Database
$d = "bardwangsql";

// database for reservation table

$speed = 0;
// initialize the reservation number
$rnum = 1;

// Make the query:
$q = "SELECT * FROM $d.reservation2 WHERE username = '".$_COOKIE['username']."'";
$r = mysql_query ($q); // Run the query.

// to check if there was previous reservation
if(mysql_fetch_array($r, MYSQLI_ASSOC) <= 0){
echo "<h1 class='info'>".$_COOKIE['username']."</h1>";
echo "<p class='redp'>You have no orders before</p>";
}
else{
echo "<h1 class='info'>Order History: ".$_COOKIE['username']."</h1>";

// Make the query:
$q2 = "SELECT * FROM $d.reservation2 WHERE username = '".$_COOKIE['username']."'";
$r2 = mysql_query ($q2); // Run the query.

// Fetch and print all the records:
while ($row = mysql_fetch_array($r2, MYSQLI_ASSOC)) {
// to update datetime for delivery
$id = $row['idreservation'];

$q = "UPDATE $d.reservation2
SET delivered = 1
WHERE username = '".$_COOKIE['username']."' AND NOW() > '".$row['deliver_date']."' AND idreservation = $id";
$r = mysql_query ($q); // Run the query.
}

// Make the query:
$q2 = "SELECT * FROM $d.reservation2 WHERE username = '".$_COOKIE['username']."' ORDER BY idreservation DESC";
$r2 = mysql_query ($q2); // Run the query.

// Fetch and print all the records:
while ($row = mysql_fetch_array($r2, MYSQLI_ASSOC)) {
$speed = $row['speed'];

// to get the shipping price
if($speed == 1){
$shippingprice = 50;
} else if($speed == 2){
$shippingprice = 25;
} else if($speed == 5){
$shippingprice = 15;
} else if($speed == 10){
$shippingprice = 10;
} else{
$shippingprice = 0;
}

// to show each reservation
// Make the query:
$q = "SELECT * FROM $d.order2 WHERE username = '".$_COOKIE['username']."' AND confirm = $rnum";
$r = mysql_query ($q); // Run the query.

if ($r) { // If it ran OK, display the records.

// Table header.
echo '<fieldset>';
// to check if the order has been delivered
if($row['delivered'] == 0){
	echo  '<p class="redp">Your order will be delivered to '.$row['address'].'</p>';
}
else{
	echo  '<p class="redp">Your order was delivered to '.$row['address'].'</p>';
}	  
echo	'<table class="order">
		  <tbody>
		   <tr><td><p class="b">Name</p></td><td><p class="b">Price</p></td>
		   <td><p class="b">Quantity</p></td><td><p class="b">Order Date</p></td></tr>';

$totalprice = 0;		   
		   
// Fetch and print all the records:
while ($row = mysql_fetch_array($r, MYSQLI_ASSOC)) {
$id = $row['idorder'];
$price = $row['quantity'] *  $row['price'];
$totalprice = $totalprice + $price;
echo '<tr><td><p class="b">'.$row['ordername'].'</p></td>
		  <td><p class="b">'.$row['price'].'</p></td>
		  <td><p class="b">'.$row['quantity'].'</p></td>
		  <td><p class="b">'.$row['order_date'].'</p></td></tr>';
}

// Close the table.
echo '</tbody></table>';

echo '<p class="redp">Shipping Price: $'.$shippingprice.'</p>';

$totalprice = $totalprice + $shippingprice;

echo '<p class="redp">Total Price: $'.$totalprice.'</p>';

echo '</fieldset><br>';

// Free up the resources.
mysql_free_result ($r);
}

$rnum = $rnum + 1;
}

echo  "<p class='blackp'>Please <a class='red' href='contact_info.php'>email us</a> if you have any question</p>";
}
?>

</fieldset>

<hr>
<p class="red"><a href="Credit.html">Credits</a>&nbsp;&nbsp;&nbsp;&nbsp;
</p>
</body>
</html>
