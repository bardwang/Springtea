<?php 
// Connect to MySQL.
require ('mysql_connect.php');
// database name
$d = "bardwangsql";
$idorder = $_GET['id'];

// Make the query:
$q = "DELETE FROM $d.order2 WHERE idorder = '".$idorder."'";
$r = mysql_query ($q); // Run the query.

printf("<script>location.href='cart.php'</script>");
?>