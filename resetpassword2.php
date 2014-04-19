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

<title>Spring Tea - Reset Your Password</title>
</head>
<body>
<h1><em>Spring Tea - Reset Your Password</em></h1>
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
<br><br><br><br>

<h1 class="info">Reset Your Password</h1>

<fieldset>
<?php
// Connect to MySQL.
require ('mysql_connect.php');
// database name
$username = $_COOKIE["username"];
$oldpassword = $_POST['oldpassword'];
$newpassword = $_POST['newpassword'];

$d = "bardwangsql";
$q = "SELECT * FROM $d.user WHERE username = '".$username."' AND password = '".$oldpassword."'";
$r = mysql_query ($q); // Run the query.

if($oldpassword == $newpassword){
echo "<p class='redp'>Your new password cannot be the same as your old password.<br><br>";
echo "<a class='input' href='resetpassword.php'>Go Back</a></p>";
}
else if(mysql_fetch_array($r, MYSQLI_ASSOC) > 0){
// update password
$q = "UPDATE $d.user SET password = '".$newpassword."' WHERE username = '".$username."'";
$r = mysql_query ($q); // Run the query.

echo "<p class='redp'>Reset your password successfully.<br><br>";
echo "<a class='input' href='account.php'>Go Back</a></p>";
}
else{
echo "<p class='redp'>Your old password is not correct.<br><br>";
echo "<a class='input' href='resetpassword.php'>Go Back</a></p>";
}
?>
</fieldset>

</form>
<hr>
<p class="red"><a href="Credit.html">Credits</a>&nbsp;&nbsp;&nbsp;&nbsp;
</p>
</body>
</html>
