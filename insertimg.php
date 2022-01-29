<?php
//THIS IS INDEX.PHP PAGE
//connect to database.db name is images
       // mysql_connect("", "", "") OR DIE (mysql_error());
       // mysql_select_db ("") OR DIE ("Unable to select db".mysql_error());
//to retrive send the page to another page

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

				//to upload
				if(isset($_POST['submit']))
				{
						$name=$_POST['image_name'];
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
									header("refresh:0; url=imgupdate.html");
								
								}
					
				} 
				else if(isset($_POST['retrive']))
				{
					header("refresh:0; url=searchimg.php");
				}
				
}
?>
