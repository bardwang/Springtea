<?php 
// Connect to MySQL.
require ('mysql_connect.php');

$d = "bardwangsql";

// Make the query:
$q = "DELETE FROM $d.order2 WHERE username = '".$_COOKIE['username']."' AND confirm = 0";
$r = mysql_query ($q); // Run the query.

printf("<script>location.href='cart.php'</script>");
?>