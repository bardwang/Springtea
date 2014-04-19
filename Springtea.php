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
<script src="files/jquery.min.js"></script>
<script src="files/jquery-ui.min.js"></script>
<script src="files/slider.js"></script>
<script src="files/login.js"></script>

<title>Spring Tea - Homepage</title>
</head>
<h1><em>Spring Tea - Homepage</em></h1>
<div class ="navbar">
<ul>
<li><a href="Springtea.php" class="here">Home</a></li>
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
<fieldset class="main">
<p class = 'left'>China is the birthplace of tea, where it was accidentally discovered by Emperor Shen Nong over 5,000 years ago.
In the next centuries, green tea is the only type of tea and the world's finest one.
Tea leaves (raw material of green tea) are steamed or pan-dried immediately after picking, which can arrest bacterial growth and prevent oxidation.
Then they are rolled by hand to squeeze out excess moisture and release flavor enzymes. Leaves are finally dried in large driers and packed.
When brewed, tea turn into a light green color, with a delicate and somewhat tangy flavor. </p>
</fieldset>


<div class="main">
<div class="sliders">
<div class="slider">
<a href="regular_tea.php#green-tea.jpg">
<img id="1" src="images/slideshow/green-tea.jpg" width= "450px" alt= "Green Tea
<p class ='left'> Green tea is the variety which keeps the original colour of the tea leaves without fermentation during processing. 
This category consists mainly of Longjing tea of Zhejiang Province, 
Maofeng of Huangshan Mountain in Anhui Province and Biluochun produced in Jiangsu.</p>"/></a>

<a href="pu-erh_tea.php#pu-erh-tea.jpg">
<img id="2" src="images/slideshow/pu-erh-tea.jpg" width= "450px" alt= "Pu-erh Tea
<p class = 'left'>Pu-erh is a variety of fermented dark tea produced in Yunnan province, China.
Fermentation is a tea production style in which the tea leaves undergo microbial fermentation and oxidation after they are dried and rolled.</p>"/></a>

<a href="regular_tea.php#wulong-tea.jpg">
<img id="3" src="images/slideshow/wulong-tea.jpg" width= "450px" alt= "Wulong Tea
<p class = 'left'>This represents a variety half way between the green and the black teas, being made after partial fermentation.
It is a specialty from the provinces on China's southeast coast: Fujian, Guangdong and Taiwan.</p>"/></a>

<a href="teapot.php#teapot1.jpg">
<img id="4" src="images/slideshow/teapot1.jpg" width= "450px" alt= "Teapot
<p class='redp'>Chinese traditional teapot on sale<br><br>Price: $50</p>"/></a>
</div>
</div>
<div class="caption"></div>
</div>

<br>
<hr>
<p class="red"><a href="Credit.html">Credits</a>&nbsp;&nbsp;&nbsp;&nbsp;
</p>
</html>
