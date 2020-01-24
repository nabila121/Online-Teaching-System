<?php
session_start();
if(!isset($_SESSION['adminid']))
{
	echo "<script>window.location='admin_login.php';</script>";
}
include("dbconnection.php");
include("studenthome.php");
?>

<div class="wrapper col2">
	<div id="breadcrumb">

		<div class="dropdown">
			<strong>Admin Dashboard</strong>
		</div>
		
	</div>
</div>

<div class="clear"></div>

<?php
include("footer.php");
?>
