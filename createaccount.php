<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="Springtea.css">
<script src="files/jquery.min.js"></script>
<script src="files/jquery.validate.min.js"></script>
<script src="files/validation.js"></script>

<title>Spring Tea - Create Account</title>
</head>
<body>
<h1><em>Spring Tea - Create Account</em></h1>
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

<form id="form" action="addaccount.php" method="post">
<h1 class="info">Create Your Account</h1>

<fieldset>
<p class="redp">
Username:
<input type="text" name="username" size="10" maxlength="20" /><br>
Password:
<input type="password" name="password" size="10" maxlength="20" /><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email Address:
<input type="text" name="email" size="20" maxlength="40" /><br>

<input type="submit" name="submit" value="Submit" />
</p>
</fieldset>

</form>
<hr>
<p class="red"><a href="Credit.html">Credits</a>&nbsp;&nbsp;&nbsp;&nbsp;
</p>
</body>
</html>
