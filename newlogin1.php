
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
	
	if(isSet($_POST['sub']))
	{
		
		$uname=$_POST["uname"];
		$add=$_POST["add"];
		$city=$_POST["city"];
		$mno=$_POST["mno"];
		$email=$_POST["email"];
		$pass1=$_POST["pass"];
							
					
		$sql="insert into newlog values('$uname','$add','$city','$mno','$email','$pass1')";
		
						$name=$_POST['uname'];
						$img=$_FILES['img'] ['name'];
						$temp=$_FILES['img']['tmp_name'];
						$fold="serverimg/".$img;
						move_uploaded_file($temp,$fold);
											
					
								// our sql query
								$sql = "INSERT INTO img VALUES('$name','$img')";
								if(mysqli_query($link,$sql))
								{
									echo "<script>";
									echo "alert('your Resistration Is Successfull')";
									echo "</script>";
									//header("refresh:0; url=imgupdate.html");
								
								}
		
		
		if(mysqli_query($link,$sql))
		{
			echo "<script>";
			echo "alert('welcome '+'$uname'+' Your Resistration is Seccessful')";
			echo "</script>";
			//header("refresh:0; url=login.html");
		}
		else
		{
		   echo "Not Resisterd".mysqli_error($link); 
		}
	}

}
mysqli_close($link);
?>