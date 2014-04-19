<!doctype html>
<?php
if(isset($_COOKIE["access"])){

// Connect to MySQL.
require ('mysql_connect.php');

// Connect to the Database
// Name for the Database
$d = "bardwangsql";

// Make the query:
$q = "SELECT * FROM $d.visitor ORDER BY state, city;";
$r = mysql_query ($q); // Run the query.

// to get an array of order numbers
$array = array();
// Fetch and print all the records:
while ($row = mysql_fetch_array($r, MYSQL_ASSOC)) {
$array[$row['city']." , ".$row['state']] = $row['number'];
	}
}
else{
printf("<script>location.href='adminaccess.php'</script>");
}
?>
<?php
echo "<div class='welcome'>Welcome Admin</div>";
?>
<html>
<head>
<!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

	  // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {
		var rows = new Array();
		<?php foreach($array as $key => $val){ ?>
        rows.push(['<?php echo $key; ?>', <?php echo $val; ?>]);
		<?php } ?>

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Number');
        data.addRows(rows);

        // Set chart options
        var options = {title:'Visitor',
					   hAxis: {title: 'City State', titleTextStyle: {color: 'red'}},
					   vAxis: {maxValue: 1},
                       width:600,
                       height:300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
<meta charset="utf-8">
<link rel="stylesheet" href="Springtea.css">
<script src="files/jquery.min.js"></script>
<script src="files/jquery.validate.min.js"></script>
<script src="files/validation.js"></script>
<script src="files/login.js"></script>

<title>Spring Tea - My Visitor</title>
</head>
<body>
<h1><em>Spring Tea - My Visitor</em></h1>
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
<h1 class="info">My Visitor</h1>
<div id="chart_div"></div>
<h1 class="info"><a class= 'back' href='admin.php'>Go to Admin</a></h1>
</fieldset>
<hr>
<p class="red"><a href="Credit.html">Credits</a>&nbsp;&nbsp;&nbsp;&nbsp;
</p>
</body>
</html>
