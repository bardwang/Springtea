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
<script src="files/jquery.validate.min.js"></script>
<script src="files/validation.js"></script>

<title>Spring Tea - Tea Info</title>
</head>
<body>
<h1><em>Spring Tea - Tea Info</em></h1>
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

<fieldset>
<h1 class="info">Search Tea</h1>

<form id="form" action="teainfo.php" method="post">
<p class="redp">
	<input type="text" name="search"><br>
	<input type="submit" value="search">
</p>
</form>

<?php
// Connect to MySQL.
require ('mysql_connect.php');

// Connect to the Database
// Name for the Database
$d = "bardwangsql";

//collect
if(isset($_POST['search'])){
	$searchq = $_POST['search'];
	
	// Make the query:
	$q = "SELECT * FROM $d.product WHERE productname LIKE '%$searchq%'";
	$r = mysql_query ($q); // Run the query.
	$count = mysql_num_rows($r);
	if($count == 0){
		echo "<p class='red'>There was no search results!</p>";
	} else{
	echo "<table><tbody><br>";
	
		while ($row = mysql_fetch_array($r, MYSQLI_ASSOC)){
			$name = $row['productname'];
			$image = $row['productimage'];
			$price = $row['productprice'];
			$url = $row['productcategory'] . ".php#" . $image;
			
			echo "<tr><td><a href='$url'><img class='teaimage2' src='images/$image' /></a>&nbsp;&nbsp;</td>
				      <td><a href='$url'><p class='blackp'>$name&nbsp;&nbsp;</p></a></td>
					  <td><p class='redp'>$$price</p></td></tr>";
		}
	
	echo "</tbody></table>";
	}
}
?>
</fieldset>

<hr>
<p class="red"><a href="Credit.html">Credits</a>&nbsp;&nbsp;&nbsp;&nbsp;
</p>
</body>
</html>
