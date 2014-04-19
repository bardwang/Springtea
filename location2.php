<?php
// Connect to MySQL.
require ('mysql_connect.php');

$city = $_GET['city'];
$state = $_GET['state'];

if($city != NULL && $state != NULL){

$d = "bardwangsql";

$q = "SELECT * FROM $d.visitor WHERE city = '".$city."' AND state = '".$state."'";
$r = mysql_query ($q); // Run the query.

if(mysql_fetch_array($r, MYSQLI_ASSOC) > 0){
	$q = "UPDATE $d.visitor
	SET number = number + 1
	WHERE city = '".$city."' AND state = '".$state."'";
	$r = mysql_query ($q); // Run the query.
}
else {
$q2 = "INSERT INTO $d.visitor (city, state, number)
	VALUES ('".$city."', '".$state."', '1')";
$r2 = mysql_query ($q2); // Run the query.
}
printf("<script>location.href='Springtea.php'</script>");
}
else {
printf("<script>location.href='Springtea.php'</script>");
}
?>
