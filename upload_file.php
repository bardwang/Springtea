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
<script src="files/geolocation.js"></script>
<script src="files/login.js"></script>

<title>Spring Tea - Contact Info</title>
</head>
<body>
<h1><em>Spring Tea - Contact Info</em></h1>
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

$product = $_POST['product'];
$description = $_POST['description'];
$category = $_POST['category'];
$price = $_POST['price'];
$filename = $_FILES["file"]["name"];
// to replace ' to '' in order to avoid database error
$description = str_replace("'","''",$description);

// Name for the database
$d = "bardwangsql";

//Upload file

//file upload restrictions  
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 2097152)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "<p class='redp'>Return Code: " . $_FILES["file"]["error"] . "<br></p>";
    }
  else
    {
    echo "<p class='redp'>Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br></p>";

    if (file_exists("images/" . $_FILES["file"]["name"]))
      {
      echo "<p class='redp'>" . $_FILES["file"]["name"] . " already exists.</p>";
	  echo "<h1 class='info'><a class='back' href='admin.php'>Go Back</a></h1>";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "images/" . $_FILES["file"]["name"]);
      echo "<p class='redp'>Stored in: " . "images/" . $_FILES["file"]["name"] . "</p>";
	  
	  $q = "INSERT INTO $d.product (productname, productcategory, productdescription, productprice, productimage)
	  VALUES ('$product', '$category', '$description', '$price', '$filename')";
	  $r = mysql_query ($q);// Run the query.
	  echo "<h1 class='info'><a class='back' href='admin.php'>Go Back</a></h1>";
      }
    }
  }
else
  {
  echo "<p class='redp'>Invalid file</p>";
  echo "<h1 class='info'><a class='back' href='admin.php'>Go Back</a></h1>";
  }
?>
</fieldset>
<hr>
<p class="red"><a href="Credit.html">Credits</a>&nbsp;&nbsp;&nbsp;&nbsp;
</p>
</body>
</html>