
<?php
$host="localhost:3306";
$user="root";
$pass="";
$db="greenhouse";
$link=mysqli_connect($host,$user,$pass,$db);

session_start();
$_SESSION['uname'];

if(!$link)
{
	die("Database is not connected");
}
else
{
	//for showing user Details
	
				if(isset($_POST['submit']))
				{
						$name=$_SESSION['uname'];
						$img=$_FILES['img'] ['name'];
						$temp=$_FILES['img']['tmp_name'];
						$fold="serverimg/".$img;
						move_uploaded_file($temp,$fold);
											
					
								// our sql query
								$sql = "update img set image='$img' where name='$name'";
								if(mysqli_query($link,$sql))
								{
									echo "<script>";
									echo "</script>";
									
								
								}
					
				} 
	
					
	//for showing image of who loged
	$uname=$_SESSION['uname'];
	$sql=mysqli_query($link,"select *from  newlog where uname='$uname'");
	$row=mysqli_fetch_assoc($sql);	
	
$uname=$_SESSION['uname'];
$sql1="select * from img where name='$uname'";
$res1=mysqli_query($link,$sql1);
$row1=mysqli_fetch_array($res1);	
		if($row1)
        {
             $msg="<div class='image img-cir img-40'>
			 <img src='serverimg/".$row1['image']."' width='50px' height='50px' />
			 </div>"; 
        }
		else
		{
			$sql1="select * from img where name='logo'";
			$res1=mysqli_query($link,$sql1);
			$row1=mysqli_fetch_array($res1);
			
			$msg="<div class='image img-cir img-40'>
			 <img src='serverimg/".$row1['image']."' width='50px' height='50px' />
			 </div>"; 
			
	
		}
	
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

   
    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

	 <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
	
	<script src="js1.js"></script>
  <style> 

.counter {
  display: inline-flex;
  cursor:pointer;
  width:150px;
  height:150px;
  max-width:100%;
  position:relative;
  justify-content:center;
  align-items:center;
  font-size: calc(1em + 1vmin);
  transition: height .2s ease-in-out;
  background: #fff;
  border-radius:50%;
  box-shadow:0px 1px 10px 2px rgba(0,0,0,0.2);
  margin:1em 0;
}
.percentage {
  position:absolute;
  text-align:center;
  top:50%;
  left:0;
  right:0;
  vertical-align:middle;
  transform:translate3d(0,-50%,0);
}
canvas {
  position:absolute;
  top:0;
  left:0;
}
input {
    width: 200px;
}
@import url('https://fonts.googleapis.com/css?family=Open+Sans');
body {
  font-family: 'Open Sans', sans-serif;
  text-align:center;
}
body{
background-color:#aaffaa;
}
  
  </style>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="dashb.html">
                            <img src="images/icon/mgh.jpg" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="">Dashboard </a>
                                </li>
                               
                            </ul>
                        </li>
                        <li>
                            <a href="info.html">
                                <i class="fas fa-chart-bar"></i>Crops Info..</a>
                        </li>
                        <li>
                            <a href="table.html">
                                <i class="fas fa-table"></i>Goods Sell</a>
                        </li>
                        
						
                        <li>
                            <a href="calendar.html">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="newlogin.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                       
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/mgh.jpg" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ol  class="list-unstyled navbar__list" >
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class=""></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="info.html">
                                <i class=""></i>Goods Info...</a>
                        </li>
                        <li>
                            <a href="table.html">
                                <i class=""></i>Goods Sell</a>
                        </li>
                        
						
                       
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ol class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="newlogin.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ol>
                        </li>
                        
                    </ol>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
								
								<div class="card">
									<button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#staticModal">Edit Profile</button>
								</div>
								<div class="card">
								<button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#smallmodal">Small</button>
								</div>
                            </form>
							
                            <div class="header-button">
                                 <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                          <div class="content">
										  
											 <?php	echo $msg; ?>
											 <a><?php echo $row['uname']; ?></a>
										 </div>
										  <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <?php	echo $msg; ?>
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $row['uname']; ?></a>
                                                    </h5>
                                                    <span class="email"><?php echo $row['email']; ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="login.html">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
									
                                </div>
                            </div>
							
                        </div>
                    </div>
                </div>
				
            </header>
			
			
			
  <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
					
				
								<div class="">
								  <h1 class="p-3">GreenHouse Updates</h1>
								  <div class="wrapper">
									<div class="row pt-5 pb-5">
									
									<div class="col-sm-6 col-lg-3">
									 <div class="overview-item overview-item--c2">
									  <div class="col-6 col-sm-12">
										<div class="counter" data-cp-percentage="30" data-cp-color="lime">
										</div>
										<h4>Tempreture 40</h4>
									  </div>
									  </div>
									  </div>
									  <div class="col-sm-6 col-lg-3">
									  <div class="overview-item overview-item--c1">
									  <div class="col-6 col-sm-12">
										<div class="counter" data-cp-percentage="80" data-cp-color="#EA4C89">
										</div>
										<h4>Humadity 80</h4>
									  </div>
									  </div>
									  </div>
									  <div class="col-sm-6 col-lg-3">
									  <div class="overview-item overview-item--c3">
									  <div class="col-6 col-sm-12">
										<div class="counter" data-cp-percentage="65" data-cp-color="#FF9900">
										</div>
										<h4>Soil Humadity 65</h4>
									  </div>
									  </div>
									  </div>
									  <div class="col-sm-6 col-lg-3">
									  <div class="overview-item overview-item--c4">
									  <div class="col-6 col-sm-12">
										<div class="counter" data-cp-percentage="44" data-cp-color="#FF675B">
										</div>
										<h4>Gas OvewFlow</h4>
									  </div>
									  </div>
									  </div>
									  
									</div>
								  </div>
								  <button class="btn-update">update</button>
								  </div>
							
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
	<div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
			 data-backdrop="static">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
								<h5 class="modal-title" id="staticModalLabel" style="color:red;">Cancel=></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
						</div>
						<div class="modal-body">
						<div class="login-form">
                            <form action="dashboard.php" method="post"  enctype="multipart/form-data">
							<input  type="text" value="<?php echo $row['uname']; ?>" name="uname" readonly="" /><br />

							<input name="img"  type="file"><br /><br />
							<input type="submit" class="btn btn-secondary mb-1" value="Edit Profile" name="submit" />
							</form>
							<br /><br />
							
                            </div>
                        </div>
							
						</div>
						
						
					</div>
				</div>
				
				<div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
								<h5 class="modal-title" id="staticModalLabel" style="color:red;">Cancel=></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
						</div>
						<div class="modal-body">
							<div class="fa-hover ">
                                        <a href="#">
                                            <i class="fa fa-bullseye"></i>ON Fan</a>
                              </div>
							 
							 <div class="col-sm-6 col-lg-15">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <div class="text">
                                                <h2>388,688</h2>
                                                <span>items solid</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
						
						
							
						
					</div>
				</div>
			</div>
</div>
	
<?php
mysqli_close($link);
?>
    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>

<!-- end document-->
