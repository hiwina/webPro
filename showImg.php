<?php 

	include "sqlConnection.php";
	
	if(isset($_GET['id']))
	{
	
		$id=mysql_real_escape_string($_GET['id_toy']);
		$query=mysql_query("SELECT * FROM `Toys` WHERE `id_toy`='$id'");
		while($row=mysql_fetch_assoc($query))
		{
		
			$temp=$row["imageFile"];
		
		}
		header("content-type : image/jpeg");
		echo $temp;
		
	}
	else
	{
	
	
		echo "Error";
	
	
	}
?>