<html>
<head>
</head>
<body>
<?php>
$con = mysql_connect("mysql.metropolia.fi","hiwotb@users.metropolia.fi","sqlpwd");
if(!$con){
die("can not connect:".mysql_error());
}





mysql_close($con);	
?>
</body>
</html>