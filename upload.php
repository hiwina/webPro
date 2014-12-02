<?php
require "sqlConnection.php";
mysql_select_db("hiwotb"); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script src="https://apis.google.com/js/client:platform.js" async defer></script>
	<script type="text/javascript" src="autho1.js"></script>
	<link rel="stylesheet" type="text/css" href="styles.css" media="screen">
	<title>ToyNet</title>	
</head>
<body>


<?php
if (isset($_POST['submit'])) {
	
	


	$name=mysql_real_escape_string($_FILES["imageFile"]["name"]);
	$type=mysql_real_escape_string($_FILES["imageFile"]["type"]);
	$size=mysql_real_escape_string($_FILES["imageFile"]["size"]);
	$temp=mysql_real_escape_string(file_get_contents($_FILES["imageFile"]["tmp_name"]));
	//$error=mysql_real_escape_string(_FILES["imageFile"]["error"]);
	
	
	if(substr($type,0,5)=="imageFile")
	{
		echo "working code";}
	else{
		echo "only images are allowed!";}
	/*if($error > 0){
	
	
	die("Error uploading file! code $error.");
	
	}
	else{
	
		if($type=="video/avi"){
		die("File format is not allowed!");
	
	}
		else if(isset($temp)){
		move_uploaded_file($temp, "index /$name");}
		//move_uploaded_file($temp,"uploaded/".$name);
		//echo "Upload complete!";
	}
	
	
	
	$sql = "INSERT INTO Toys (age,toy_name,sex,price,place,region,images) VALUES ('$_POST[age]','$_POST[category]','$_POST[sex]','$_POST[price]','$_POST[country]','$_POST[region]','$temp')";
	$result = mysql_query($sql);
	if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $sql;
    die($message);
}
*/
	
}
?>


	<header>
  <hgroup>
    

    <h1>ToyNet</h1>
	<h2>Buy and Sell Used Toys</h2>
  </hgroup>
  
  <nav>
    <ul>
	  <li><a href="index.html">Home&nbsp &nbsp </a></li>
	  <li><a href="upload.php">Apload&nbsp &nbsp </a></li>
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
    <h3>Upload Your Toys</h3>
	<form action="upload.php" method="POST" enctype="multipart/form-data">
		<p> Age   </p>
		<select name="age">
		  <option value="0-6month">Newborn-6 Months</option>
		  <option value="6-12month" selected >6 Months-1 Year</option>
		  <option value="1-2years">1-2 Years</option>  
		  <option value="2-3years">2-3 Years</option>  
		  <option value="3-4years">3-4 Years</option>  
		  <option value="4+years">4+ Years</option> 
		</select>
	   
    <p>Category
      <select name="category">
        <option value="Balls">Balls</option>
        <option value="Building sets and blocks" selected >Building sets and blocks</option>
        <option value="Crib Toys">Crib Toys</option>  
        <option value="Games/Puzzles">Games/Puzzles</option>  
        <option value="Wooden Toys">Wooden Toys</option>  
        <option value="Vehicles">Vehicles</option>  
      </select></p>
	<p>Location
	</p>
	<p>Country
	  <select name="country">
        <option value="Finland" selected>Finland</option>
        <option value="Sweden">Sweden</option>
        <option value="Norway">Norway</option>  
        <option value="Switzerland">Switzerland</option>  
        <option value="Holland">Holland</option>  
      </select></p>
   <p>Region
      <select name="region">
        <option value="Espoo">Espoo</option>
        <option value="Vanta" selected >Vanta</option>
        <option value="Helsinki">Helsinki</option>  
      </select>	</p>
	<p>Price <input type="text" name="price"/></p>
	<p>Contact Info <input type="text" name="info"/></p>
	<div>	<fieldset>
		<p>Sex<br></p>
		<input type="radio" name="sex" value="boy">A Boy
		<p><input type="radio" name="sex" value="girl" checked>A girl</p>
		</fieldset>
	</div>
		<p>Upload image here.</p>
		<input type="file" name="imageFile" class="img"/>
		<input type="submit" name="submit" value="Upload"/>
	</form>
  
</section>
<footer>
  <small>ToyNet © all rights reserved 2014</small>
    <nav>
      <li><a href="index.html">Home&nbsp &nbsp </a> </li>
	  <li><a href="postedToy.html">Upload&nbsp &nbsp </a> </li>
	  <li><a href="">About&nbsp &nbsp </a> </li>
	  <li><a href="">Contact </a></li>
	</nav>
</footer>


</body>
</html>