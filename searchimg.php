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
	
	
        
		
        $sql="select * from img ";
		
		if(mysqli_query($link,$sql))
        {
            $res=mysqli_query($link,$sql);
            while($row=mysqli_fetch_array($res))
            {
                  
				  $msg="<img src='serverimg/".$row['image']."' width='200px' height='200px' />"; 
			?>	
				<div>

				<?php
				echo $msg;
				?>
				</div>
			<?php

            }
        }
        else
            echo"Query failed";
		
}
mysqli_close($link);
?>