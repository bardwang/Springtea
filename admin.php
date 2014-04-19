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
<script src="files/jquery.validate.min.js"></script>
<script src="files/validation.js"></script>
<script src="files/login.js"></script>

<title>Spring Tea - Admin</title>
</head>
<body>
<h1><em>Spring Tea - Admin</em></h1>
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
<h1 class="info">Admin</h1>

<form id="form" action="upload_file.php" method="post" enctype="multipart/form-data">
<p class="redp">
Product:<input type="text" name="product"><br>
Category: <select name="category">
        <option value="regular_tea">Regular Tea</option>
        <option value="pu-erh_tea">Pu-erh Tea</option>
		<option value="teapot">Teapot</option>
		</select><br>
Price:<input type="text" name="price"><br><br>
Can't upload files larger than 2MB<br>
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br><br>
Description:<br>
<textarea class="description" name="description" rows="10" cols="50"></textarea><br>
<input type="submit" name="submit" value="Submit">

</p>
</form>

<h1 class="info"><a class= 'back' href='filemanagement.php'>Go to File Management</a></h1>
<h1 class="info"><a class= 'back' href='chart.php'>Go to My Chart</a></h1>
<h1 class="info"><a class= 'back' href='visitor.php'>Go to My Visitor</a></h1>
</fieldset>
<hr>
<p class="red"><a href="Credit.html">Credits</a>&nbsp;&nbsp;&nbsp;&nbsp;
</p>
</body>
</html>
