<!doctype html>
<?php
if(isset($_COOKIE["username"])){
$username = $_COOKIE["username"];
echo "<div class='welcome'>Welcome $username</div>";
}
?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="Springtea.css">
<script src="files/geolocation.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="files/jquery.min.js"></script>
<script src="files/login.js"></script>

<title>Spring Tea - Contact Info</title>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
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
<li><a href="contact_info.php" class="here">Contact Info</a></li>
</ul>
</div>
<br><br><br><br><br>
<fieldset class="main">
<h1 class="info">
Contact Us</h1>
<a href="mailto:Bardwang@qq.com"><img class="email"/><p class="blackp">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please feel free to email us</p></a>
<img class="phone"/><p class="blackp">
&nbsp;&nbsp;&nbsp;&nbsp;617-111-1111</p></a>
<img class="address"/><p class="blackp">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;409 Huntington Ave, Boston, Massachusetts 02115</p></a>

<body onload="showPosition()">
<div id="mapholder"></div>
<br>
<div class="white">
<div class="fb-like-box" data-href="https://www.facebook.com/chinesetea" data-width="560" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="true" data-show-border="true"></div>
</div>
</body>
</fieldset>
<hr>
<p class="red"><a href="Credit.html">Credits</a>&nbsp;&nbsp;&nbsp;&nbsp;
</p>
</body>
</html>

<script>

</script>
