<html !DOCTYPE>
<body>

<form action="testImg.php" method="post" enctype="multipart/form-data">
<fieldset>
<legend>Image Upload</legend>
<label for="userFile">Small image to upload: </label>
<input type="file" size="40" name="userFile" id="userFile"/><br />
<br />
<label for="altText">Description of image</label>
<input type="text" size="60" name="altText" id="altText"/><br />
<br />
<input type="submit"  name="submit" value="Upload File" />
</fieldset>
</form>
<?php
 require "sqlConnection.php";
?>

<h1>Uploading Images to MySQL</h1><p>
<?php
if (isset($_POST['submit'])){





//Validate uploaded image file
if ( preg_match( '/gif|png|x-png|jpeg|jpg|JPEG/', $_FILES['userFile']['type']) ) {
   die('<p>Only browser compatible images allowed</p></body></html>');
} else if ( strlen($_POST['altText']) < 9 ) {
   die('<p>Please provide meaningful alternate text</p></body></html>');
} else if ( $_FILES['userFile']['size'] > 16384 ) {
   die('<p>Sorry file too large</p></body></html>');
/* Connect to database
} else if ( !($con=mysql_connect($host, $user, $pass)) ) {
   die('<p>Error connecting to database</p></body></html>');
} else if ( !(mysql_select_db($db)) ) {
   die('<p>Error selecting database</p></body></html>');*/
// Copy image file into a variable
 }else if ( !($handle = fopen ($_FILES['userFile']['tmp_name'], "r")) ) {
   die('<p>Error opening temp file</p></body></html>');
} else if ( !($image = fread ($handle, filesize($_FILES['userFile']['tmp_name']))) ) {
   die('<p>Error reading temp file</p></body></html>');
} else {
   fclose ($handle);
   // Commit image to the database
   $image = mysql_real_escape_string($image);
   $alt = htmlentities($_POST['altText']);
   $query = 'INSERT INTO Toys (sex,price,place,images) VALUES ("' . $_FILES['userFile']['type'] . '","' . $_FILES['userFile']['name']  . '","' . $alt  . '","' . $image . '")';
   if ( !(mysql_query($query,$con)) ) {
      die('<p>Error writing image to database</p></body></html>');
   } else {
      die('<p>Image successfully copied to database</p></body></html>');
   }
}
}
?>
</body>
</html>