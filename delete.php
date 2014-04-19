<?php 
// Connect to MySQL.
require ('mysql_connect.php');

$d = "bardwangsql";

$idproduct = $_GET['id'];
$image = $_GET['image'];

// Make the query:
$q = "DELETE FROM $d.product WHERE idproduct = '".$idproduct."'";
$r = mysql_query ($q); // Run the query.

// delete the image
unlink('images/' . $image);
printf("<script>location.href='filemanagement.php'</script>");
?>