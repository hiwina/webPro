<?php
require "sqlConnection.php";
mysql_select_db("hiwotb");
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<script src="https://apis.google.com/js/client:platform.js" async defer></script>
	<script type="text/javascript" src="autho1.js"></script>
	<link rel="stylesheet" type="text/css" href="styles.css" media="screen">
	<title>ToyNet</title>	
</head>
<body>


<?php

if(isset($_POST['submit']))
	{
		$age=/*cleanData*/($_POST['age']);
		$category=/*cleanData*/($_POST['category']);
		$sex=/*cleanData*/($_POST['sex']);
		$price=/*cleanData*/($_POST['price']);
		$country=/*cleanData*/($_POST['country']);
		$region=/*cleanData*/($_POST['region']);
		//addData($age,$category,$sex,$price,$country,$region);
	


if(isset($_FILES['upload']['tmp_name'])) {
$allowed = array('image/pjpeg','image/jpeg','image/JPG','image/PNG','image/X-PNG','image/png','image/x-png','image/gif');
if(in_array($_FILES['upload']['type'],$allowed)){
		if(move_uploaded_file($_FILES['upload']['tmp_name'], "index/{$_FILES['upload']['name']}")){
		echo "<p><em>The file has been uploaded!</em></p>";
		$image="{$_FILES['upload']['name']}";
		print "$image";
		}//end of move if
		}else {
				echo '<p class="error">Please upload a JPEG, GIG or PNG image.</p>';
	
	if($_FILES['upload']['error']>0) {
		echo '<p class="error">The file could not be uploaded because: <strong>';
		switch ($_FILES['upload']['error']) {
			case 1:
				print 'The file exceeds the upload_max_fileseze setting in php ini.';
				break;
			case 2:
				print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form';
				break;
			case 3:
				print 'The file was only partially uploaded';
				break;
			case 4:
				print 'No file was uploaded';
				break;
			case 5:
				print 'No temporary folder was available';
				break;
			case 6:
				print 'unable to write to disk';
				break;
			case 7:
				print 'File upload stopped';
				break;
			default:
				print 'A system error occurred';
				break;
		}
	}
		print '</strong></p>';
	}
	if(file_exists($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name'])) {
		print "file exists";
		unlink($_FILES['upload']['tmp_name']);
	}
	$image=checkUpload();
	$sql="INSERT INTO Toys (age,toy_name,sex,price,place,region,images)  VALUES('$age','$category','$sex','$price','$country','$region','$image')";
	$result=mysql_query($sql) or die(mysql_error());
		
		
}




	
/*function cleanData($data){
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		$data=strip_tags($data);
		return $data;
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
	<form action="imgtest.php" method="POST" enctype="multipart/form-data">
		<p> Age   </p>
		<select name="age">
		  <option value="0-6month">Newborn-6 Months</option>
		  <option value="6-12month"  >6 Months-1 Year</option>
		  <option value="1-2years">1-2 Years</option>  
		  <option value="2-3years">2-3 Years</option>  
		  <option value="3-4years">3-4 Years</option>  
		  <option value="4+years">4+ Years</option> 
		</select>
	   
    <p>Category
      <select name="category">
        <option value="Balls">Balls</option>
        <option value="Building sets and blocks" >Building sets and blocks</option>
        <option value="Crib Toys">Crib Toys</option>  
        <option value="Games/Puzzles">Games/Puzzles</option>  
        <option value="Wooden Toys">Wooden Toys</option>  
        <option value="Vehicles">Vehicles</option>  
      </select></p>
	<p>Location
	</p>
	<p>Country
	  <select name="country">
        <option value="Finland" >Finland</option>
        <option value="Sweden">Sweden</option>
        <option value="Norway">Norway</option>  
        <option value="Switzerland">Switzerland</option>  
        <option value="Holland">Holland</option>  
      </select></p>
   <p>Region
      <select name="region">
        <option value="Espoo">Espoo</option>
        <option value="Vanta" >Vanta</option>
        <option value="Helsinki">Helsinki</option>  
      </select>	</p>
	<p>Price <input type="text" name="price"/></p>
	<p>Contact Info <input type="text" name="info"/></p>
	<div>	<fieldset>
		<p>Sex<br></p>
		<input type="radio" name="sex" value="boy">A Boy
		<p><input type="radio" name="sex" value="girl">A girl</p>
		</fieldset>
	</div>
		<p>Upload image here.</p>
		<input type="file" name="upload" class="img"/>
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