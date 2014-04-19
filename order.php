<?php 
if(isset($_COOKIE["username"])){
$username = $_COOKIE['username'];

foreach($_POST as $n => $content){
$id = $n;
}
if(isset($_POST['q'])){
$quantity = $_POST['q'];
}
else {
$quantity = 1;
}

// Connect to MySQL.
require ('mysql_connect.php');
// database
$d = "bardwangsql";

// Make the query:
$q = "SELECT * FROM $d.product WHERE idproduct = '".$id."'";
$r = mysql_query ($q); // Run the query.
while ($row = mysql_fetch_array($r, MYSQLI_ASSOC)) {
$ordername = $row['productname'];
$price = $row['productprice'];
$image = $row['productimage'];
	}
// insert the product to the cart	
$q2 = "INSERT INTO $d.order2 (ordername, price, quantity, image, username)
	VALUES ('".$ordername."', '".$price."', '".$quantity."', '".$image."', '".$username."')";
$r2 = mysql_query ($q2); // Run the query.
printf("<script>location.href='cart.php'</script>");
}
else{
printf("<script>location.href='login.php'</script>");
}

?>