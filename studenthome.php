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

				

			</div>
		</div>


		<div style="text-align:center">
		   <?php
			include("menu.php");
			?>
		</div>

	</body>
</html>