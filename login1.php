<?php
	//Start session
	session_start();
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
$host="localhost:3306";
$user="root";
$pass="";
$db="greenhouse";
$link=mysqli_connect($host,$user,$pass,$db);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db1 = mysqli_select_db($link,$db);
	if(!$db1) {
		die("Unable to select database");
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysqli_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$login = ($_POST['uname']);
	$password = ($_POST['pass']);
	
	//Input Validations
	if($login == '') {
		$errmsg_arr[] = 'Username missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: index.php");
		exit();
	}
	
	//Create query
	$qry="SELECT * FROM newlog WHERE uname='$login' AND pass='$password'";
	$result=mysqli_query($link,$qry);
	
	//Check whether the query was successful or not
	if($result) {
		if(mysqli_num_rows($result) > 0) {
			//Login Successful 	
			session_regenerate_id();
			$member = mysqli_fetch_assoc($result);
			$_SESSION['uname'] = $member['uname'];
			$_SESSION['SESS_FIRST_ADD'] = $member['add'];
			$_SESSION['SESS_LAST_CITY'] = $member['city'];
			$_SESSION['SESS_LAST_MNO'] = $member['mno'];
			$_SESSION['SESS_LAST_EMAIL'] = $member['email'];
			$_SESSION['SESS_LAST_PASS'] = $member['pass'];
			//$_SESSION['SESS_PRO_PIC'] = $member['profImage'];
			session_write_close();
			header("location:dashboard.php");
			exit();
		}else {
			//Login failed
						echo "<script>";
						echo "alert('Invalid User Id And Password...!')";
						echo "</script>";
						header("refresh:0; url=login.html");
						//header("location:login.html");
			
		}
	}else {
		die("Query failed");
	}
?>