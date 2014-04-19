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

<title>Spring Tea - Cart</title>
</head>
<body>
<h1><em>Spring Tea - Cart</em></h1>
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

<div class="main">
<fieldset>

<?php
// Connect to MySQL.
require ('mysql_connect.php');

// Connect to the Database
// Name for the Database
$d = "bardwangsql";

// Make the query:
$q = "SELECT * FROM $d.order2 WHERE confirm = 0";
$r = mysql_query ($q); // Run the query.

if ($r) { // If it ran OK, display the records.

echo "<h1 class='info'>Cart</h1><table class='order'><tbody>";
echo "<tr><td></td><td><p class='redp'>Name</p></td><td><p class='redp'>Quantity</p></td><td><p class='redp'>Price</p></td></tr>";

//total price
$totalprice = 0;
// Fetch and print all the records:
while ($row = mysql_fetch_array($r, MYSQLI_ASSOC)) {
$name = $row['ordername'];
$image = $row['image'];
$quantity = $row['quantity'];
$unitprice = $row['price'];
$price = $row['price'] * $row['quantity'];
$id = $row['idorder'];
// to calculate the total price
$totalprice = $totalprice + $price;

echo "<tr><td><img class='teaimage' src='images/$image' /></td>
<td><p class='redp'>$name</p></td>
<td><p class='redp'>$quantity</p></td>
<td><p class='redp'>$$unitprice</p></td>
<td><a class='input' href='deletecart.php?id=$id'>Delete</a></td></tr>";
}
echo "</tbody></table>";
echo "<p class='redp'>Total Price: $$totalprice</p>";

} else {
echo "<p>Database Error</p>";
}
?>
<br>
<a class='input' href='clear.php'>Clear All Orders</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a class='input' href='reservation.php'>Confirm Orders</a>
</fieldset>
</div>

<hr>
<p class="red"><a href="Credit.html">Credits</a>&nbsp;&nbsp;&nbsp;&nbsp;
</p>
</body>
</html>
