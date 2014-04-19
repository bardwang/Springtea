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
$email = $_POST['email'];

// get random string
function getRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string ='';
    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters))];
    } 
    return $string;
}
// temporary password
$temp = getRandomString(6);

// The information for email
$to      = $email;
$subject = "Temporary Password From Springtea.com";
$message = "Your temporary password is $temp\n
Please reset your password at http://www.bardwang.com/Springtea/resetpassword.php \n
Springtea.com";
$headers = 'From: Passwordrecover@springtea.com' . "\r\n" . 'Reply-To: Passwordrecover@springtea.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

$d = "bardwangsql";

$q = "SELECT * FROM $d.user WHERE username = '".$username."' AND email = '".$email."'";
$r = mysql_query ($q); // Run the query.

if(mysql_fetch_array($r, MYSQLI_ASSOC) > 0){
// update password
$q = "UPDATE $d.user SET password = '".$temp."' WHERE username = '".$username."'";
$r = mysql_query ($q); // Run the query.
// send email
mail($to, $subject, $message, $headers);

echo "<p class='redp'>You will receive an email of your temporary password.<br><br>";
echo "<a class='input' href='login.php'>Go Back</a></p>";
}
else{
echo "<p class='redp'>Your username or your email address is incorrect.<br><br>";
echo "<a class='input' href='login.php'>Go Back</a></p>";
}

?>
</fieldset>
<hr>
<p class="red"><a href="Credit.html">Credits</a>&nbsp;&nbsp;&nbsp;&nbsp;
</p>
</body>
</html>