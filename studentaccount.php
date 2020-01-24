<?php
session_start();

if(!isset($_SESSION['student_id']))
{
	echo "<script>window.location='student_login.php';</script>";
}
include("dbconnection.php");
//include("studenthome.php");
?>
<div class="wrapper col2">
	<div id="breadcrumb">

		<div class="dropdown">
			<strong> Student Dashboard</strong>
		</div>


	</div>
</div>

<div class="clear"></div>

<?php
include("sfooter.php");
?>
