
	<?php
//SEARCH.PHP PAGE
    //connect to database.db name = images
        // mysql_connect("localhost", "root", "") OR DIE (mysql_error());
        //mysql_select_db ("image") OR DIE ("Unable to select db".mysql_error());
//display all the image present in the database
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
			if(isset($_POST['submit']))
				{
						$name=$_POST['image_name'];
						$img=$_FILES['img'] ['name'];
						$temp=$_FILES['img']['tmp_name'];
						$fold="serverimg/".$img;
						move_uploaded_file($temp,$fold);
											
					
								// our sql query
								$sql = "update img set image='$img' where name='$uname'";
								if(mysqli_query($link,$sql))
								{
									echo "<script>";
									echo "alert('your Resistration Is Successfull')";
									echo "</script>";
									header("refresh:0; url=imgupdate.html");
								
								}
					
				} 
			
			
		
		
}
mysqli_close($link);
?>