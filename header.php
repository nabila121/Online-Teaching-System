<?php
error_reporting(0);
include("dbconnection.php");
$dt = date("Y-m-d");
$tim = date("H:i:s");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Online Teaching System</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" href="layout/styles/layout.css" type="text/css">
</head>

	<body id="top">
		<div class="wrapper col1">
			<center><a href="index.php"><img src="images/logo_header.png"></a></center>
			<div id="head">

				<div id="topnav">
					<ul>
						<li><a href="index.php" <?php if(basename($_SERVER['PHP_fSELF'])=="index.php" ){ echo ' class="active"' ; } ?> >Home</a></li>
						<li><a href="aboutus.php" <?php if(basename($_SERVER['PHP_SELF'])=="aboutus.php" ){ echo ' class="active"' ; } ?>>About US</a></li>
        
                        <li>
                            <a href=" ######### ">Registration</a>
                             <ul>
                                <li><a href="student_signup.php">Student</a></li>
                                <li><a href="teacher_signup.php">Teacher</a></li>
                            </ul>

                        </li>
						  
						     <li>
                            <a href=" ######### ">Login</a>
                             <ul>
                                <li><a href="student_login.php">Student</a></li>
                                <li><a href="teacher_login.php">Teacher</a></li>
                            </ul>

                        </li>
						

						
				   </ul>
				</div>

			</div>
		</div>


		<div style="text-align:center">
		   <?php
			include("menu.php");
			?>
		</div>

	</body>
</html>