<!doctype html>
<?php
if(isset($_COOKIE["access"])){
echo "<div class='welcome'>Welcome Admin</div>";
}
else{
printf("<script>location.href='adminaccess.php'</script>");
}
?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="Springtea.css">
<script src="files/jquery.min.js"></script>
<script src="files/login.js"></script>

<title>Spring Tea - File Management</title>
</head>
<body>
<h1><em>Spring Tea - File Management</em></h1>
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

// Make the query:
$q = "SELECT * FROM $d.product";
$r = mysql_query ($q); // Run the query.

if ($r) { // If it ran OK, display the records.

echo "<h1 class='info'>File Management</h1><table><tbody>";

// Fetch and print all the records:
while ($row = mysql_fetch_array($r, MYSQLI_ASSOC)) {
$name = $row['productname'];
$image = $row['productimage'];
$price = $row['productprice'];
$id = $row['idproduct'];

echo "<tr><td><img class='teaimage' src='images/$image' /></td>
<td><p class='redinfo'>$name</p></td>
<td><p class='redinfo'>Price: $$price</p></td>
<td><a class='input' href='delete.php?id=$id&image=$image'>Delete</a></td></tr>";
}
echo "</tbody></table>";

} else {
echo "<p>Database Error</p>";
}
?>
<h1 class="info"><a class= 'back' href='admin.php'>Go to Admin</a></h1>
</fieldset>
<hr>
<p class="red"><a href="Credit.html">Credits</a>&nbsp;&nbsp;&nbsp;&nbsp;
</p>
</body>
</html>