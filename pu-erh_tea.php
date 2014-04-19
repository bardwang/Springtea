<!doctype html>
<?php
if(isset($_COOKIE["username"])){
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
<title>Spring Tea - Pu-erh Tea</title>
</head>
<body>
<h1><em>Spring Tea - Pu-erh Tea</em></h1>
<div class ="navbar">
<ul>
<li><a href="Springtea.php">Home</a></li>
<li class="confirm"><a href="account.php">Your Account</a>
	<ul class="subnavbar">
		<li><a href="confirmation.php">Your Orders</a></li>
     </ul>
</li>
<li><a href="teainfo.php"  class="here">Tea Info</a>
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
<a href="top"></a>
<div id='box'>
<img src="images/Teapot-icon.png" /><br><br><br><br><br><br><br>
<ul>
<li><a href="#top">Top</a></li>
<li><a href="regular_tea.php">Regular Tea</a></li>
<li><a href="pu-erh_tea.php">Pu-erh Tea</a></li>
<li><a href="teapot.php">Teapot</a></li>
</ul>
</div>

<fieldset>
<?php
// Connect to MySQL.
require ('mysql_connect.php');

// Connect to the Database
// Name for the Database
$d = "bardwangsql";

// Make the query:
$q = "SELECT * FROM $d.product WHERE productcategory = 'pu-erh_tea'";
$r = mysql_query ($q); // Run the query.

if ($r) { // If it ran OK, display the records.

// Fetch and print all the records:
while ($row = mysql_fetch_array($r, MYSQLI_ASSOC)) {
$name = $row['productname'];
$image = $row['productimage'];
$description = $row['productdescription'];
$price = $row['productprice'];
$id = $row['idproduct'];

echo "<a name='$id'></a>";
echo "<h1 class='info'>$name</h1>";
echo "<img src='images/$image' width= '450px'/>";
echo "<form action='order.php' method='post'>
<table><tr><td><p class='redprice'>Price: $$price</p></td>
<td><p class='redprice'>Quantity:
<select name='q'/>
        <option value='1'>1</option>
        <option value='2'>2</option>
		<option value='3'>3</option>
        <option value='4'>4</option>
		<option value='5'>5</option>
		</select>&nbsp;&nbsp;&nbsp;&nbsp;</p></td>
<td><input name='$id' type='submit' value='Add to Cart' /></td>
</tr></table></form>";

if($description != NULL){
echo "<p class='blackpl'>Description: $description</p><br>";}
}

} else {
echo "<p>Not Ready...</p>";
}

?>
</fieldset>
<hr>
<p class="red"><a href="Credit.html">Credits</a>&nbsp;&nbsp;&nbsp;&nbsp;
</p>
</body>
</html>
