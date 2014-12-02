<?php

	include "sqlConnection.php";
	$sql = "SELECT * FROM Toys ";
	
	
	if(isset($_POST['submit'])) {
	
		$result= mysql_real_escape_string($_POST['age']);
		$sql .="WHERE age='{result}'";
	
	}
	if(isset($_POST['submit'])) {
	
		$result= mysql_real_escape_string($_POST['toy_name']);
		$sql .="WHERE token_name='{result}'";
	
	}
	
	
	$query=mysql_query($sql) or die(mysql_query());

?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <script src="https://apis.google.com/js/client:platform.js" async defer></script>
  <script type="text/javascript" src="autho.js"></script>
  
  <link rel="stylesheet" type="text/css" href="styles.css" media="screen">
  <title>ToyNet</title>
  </head>
<body>

<header>
  <hgroup>
    

    <h1>ToyNet</h1>
	<h2>Buy and Sell Used Toys</h2>
  </hgroup>
  
  <nav>
    <ul>
	  <li><a href="index.html">Home&nbsp &nbsp </a></li>
	  <li><a href="postedToy.html">Apload&nbsp &nbsp </a></li>
	  <li><a href="">About&nbsp &nbsp </a></li>
	  <li><a href="">Contact </a></li>
	</ul>
  </nav>
<div id="loginform">  
	<p>
     <form action="">
	User Nmae: <input type="text" name="user"><br>
	Password: <input type="password" name="password">
	<input type="submit" value="Login"></p>
	</form>
	<form>
	<p>
	<a href=""><span id="signinButton">
	<span 
    class="g-signin"
    data-callback="signinCallback"
    data-clientid="811052799304-vu50to0234maqpn8cpba5bhgidf7ecdb.apps.googleusercontent.com"
    data-cookiepolicy="single_host_origin"
    data-requestvisibleactions="http://schema.org/AddAction"
    data-scope="https://www.googleapis.com/auth/plus.login">
  </span>
</span></a>
	</p></form>


</div>
</header>

<section> 
  <div class="search">
    <h3>Browse Toys</h3>
	<form action="index.php" method="post">
   <p>Age</p> 
	<form name="age" action="index.php" method="post">
    <select name="age">
      <option value="0-6month">Newborn-6 Months</option>
      <option value="6-12month" selected >6 Months-1 Year</option>
      <option value="1-2years">1-2 Years</option>  
      <option value="2-3years">2-3 Years</option>  
      <option value="3-4years">3-4 Years</option>  
      <option value="4+years">4+ Years</option> 
     </select>
	 </form>
	 
	   
    <p>Catagory
	  <form name="toy_name" action="index.php" method="post">
      <select name="toy_name">
        <option value="Balls">Balls</option>
        <option value="Building sets and blocks" selected >Building sets and blocks</option>
        <option value="Crib Toys">Crib Toys</option>  
        <option value="Games/Puzzles">Games/Puzzles</option>  
        <option value="Wooden Toys">Wooden Toys</option>  
        <option value="Vehicles">Vehicles</option>  
      </select>
	  </form>
	</p>
	Location
	<p>Country
	  <select name="country">
        <option value="fin" selected>Finland</option>
        <option value="swd">Sweden</option>
        <option value="nor">Norway</option>  
        <option value="swt">Switherland</option>  
        <option value="hol">Holand</option>  
      </select>
	</p>
    <p>Region
      <select name="finstreet">
        <option value="espoo">Espoo</option>
        <option value="vanta" selected >Vanta</option>
        <option value="hel">Helsinki</option>  
      </select>	  
	</p>
	
	<div>	<fieldset>
   <p>Sex<br></p>
 <input type="radio" name="sex" value="boy"/>A Boy
  <p><input type="radio" name="sex" value="girl" checked>A girl</p>
    </fieldset>
  </div>
  <input type="submit" name="submit" value="Search"/>
  </form>
  
  
  </div>




<?php 
	if(isset($_POST['submit'])) {
	while ($row=mysql_fetch_array($query)) { ?>
	 

	<div class="img">
	 <a target="_blank" href="klematis_big.htm"><img src="showImg.php " alt="check" width="110" height="90"><?php echo $row['image']; ?></a>
	 <div class="desc"><?php echo $row['price']; ?></div>
	</div>
	
	
	
	

	
<?php }}?>



</section>
<footer>
  <small>ToyNet © all rights reserved 2014</small>
    <nav>
    <ul>
	  <li><a href="index.html">Home &nbsp &nbsp </a></li>
	  <li><a href="">About &nbsp &nbsp </a></li>
	  <li><a href="">Contact </a></li>
	</ul>
  </nav>
</footer>


</body>
</html>