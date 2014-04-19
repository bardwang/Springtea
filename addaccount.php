<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="Springtea.css">

<title>Spring Tea - Add Account</title>
</head>
<body>
<h1><em>Spring Tea - Add Account</em></h1>
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

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$d = "bardwangsql";

$q = "SELECT * FROM $d.user WHERE username = '".$username."'";
$r = mysql_query ($q); // Run the query.

if(mysql_fetch_array($r, MYSQLI_ASSOC) > 0){
echo "<p class='redp'>This account already exists, please create another one.<br><br>";
echo "<a class='input' href='account.php'>Go Back</a></p>";
}
else{
$q = "INSERT INTO $d.user (username, password, email)
	VALUES ('$username', '$password', '$email')";
	$r = mysql_query ($q);
	
echo "<p class='redp'>You have created your account successfully.<br><br>";
echo "<a class='input' href='login.php'>Go Back</a></p>";
}
?>
</fieldset>
<hr>
<p class="red"><a href="Credit.html">Credits</a>&nbsp;&nbsp;&nbsp;&nbsp;
</p>
</body>
</html>