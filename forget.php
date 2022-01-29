<html lang="en">
<head>
  <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
	
  
</head>
<body>
<?php
$host="localhost:3306";
$user="root";
$pass="";
$db="greenhouse";
$link=mysqli_connect($host,$user,$pass,$db);
if(!$link)
{
	die("Database is not connected");
}
else
{
	
	if(isSet($_GET['sub']))
	{
		$uname=$_GET["uname"];
		$pass=$_GET["pass"];
		
		$sql="update newlog set pass='$pass' where uname='$uname'";
		if(mysqli_query($link,$sql))
		{
?>
			<div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
			<span class="badge badge-pill badge-primary">Success</span>
			You successfully read this important alert.
			</div>
<?php											
		}
		else
		{
			echo "<script>";
			echo "alert('invalid user ID and Password')";
			echo "</script>";
			header("refresh:0; url=forget.html");
		}
	
	}

}
mysqli_close($link);
?>
</body>
</html>