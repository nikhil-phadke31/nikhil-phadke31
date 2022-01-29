<!-- this form is user to store images-->
<form action="insertimg.php" method="post"  enctype="multipart/form-data">
Enter the Image Name:<input type="text" name="image_name" id="" /><br />

<input name="img"  type="file"><br /><br />
<input type="submit" value="submit" name="submit" />
</form>
<br /><br />
<!-- this form is user to display all the images-->
<form action="searchimg.php" method="post"  enctype="multipart/form-data">
Retrive all the images:
<input type="submit" value="submit" name="retrive" />
</form>







