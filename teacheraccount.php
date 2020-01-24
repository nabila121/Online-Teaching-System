<?php
session_start();
if(!isset($_SESSION['teacher_id']))
{
	echo "<script>window.location='teacher_login.php';</script>";
}
include("dbconnection.php");
include("header.php");
?>
<div class="wrapper col2">
	<div id="breadcrumb">

		<div class="dropdown">
			<strong>Teacher Dashboard</strong>
		</div>


	</div>
</div>

<div class="clear"></div>

<!--<?php
include("sfooter.php");
?>-->
