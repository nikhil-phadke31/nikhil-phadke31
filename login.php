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
	
	if(isSet($_GET['log']))
	{
		$uname=$_GET["uname"];
		$pass1=$_GET["pass"];
		
		$sql=mysqli_query($link,"select *from  newlog where uname='$uname' and pass='$pass1'");
		$res=mysqli_fetch_assoc($sql);
		if($res)
		{
			echo "<script>";
			echo "alert('wel')";
			echo "</script>";
			header("");
		}
		else{
			echo "<script>";
			echo "alert('invalid user ID and Password')";
			echo "</script>";
			header("refresh:0; url=login.html");
		}
		
		
	}

}
mysqli_close($link);
?>