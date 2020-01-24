<?php
session_start();
include("header.php");
include("dbconnection.php");
if(isset($_SESSION[adminid]))
{
	echo "<script>window.location='adminaccount.php';</script>";
}
if(isset($_POST[submit]))
{
	$sql = "SELECT * FROM admin WHERE loginid='$_POST[loginid]' AND password='$_POST[password]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_num_rows($qsql) == 1)
	{
		$rslogin = mysqli_fetch_array($qsql);
		$_SESSION[adminid]= $rslogin[adminid] ;
		echo "<script>window.location='adminaccount.php';</script>";
	}
	else
	{
		echo "<script>alert('Invalid login id and password entered..'); </script>";
	}
}
?>



<!DOCTYPE html>
<html>

<head>
    <title>Admin Login | PHP</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>

<body>

<div>
	<form action="" method="post" name="frmadminlogin" onSubmit="return validateform()">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<h1>Admin Login</h1>
					<p>Fill up the below form.</p>
					<hr class="mb-3">
                     
                    <label for="loginid"><b>Login ID</b></label>
					<input class="form-control" id="loginid" type="text" name="loginid" required>
 

					<label for="password"><b>Password</b></label>
					<input class="form-control" id="password"  type="password" name="password" required>
					<hr class="mb-3">

					<button class="btn btn-danger" type="submit" id="submit" name="submit">Login</button>
                    <hr class="mb-3">
				</div>
			</div>
		</div>
	</form>
</div>
    
</body>
</html>    
    
<?php
include("footer.php");
?>

<script type="application/javascript">
    var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
    var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
    var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
    var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
    var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

    function validateform() {
        if (document.frmadminlogin.loginid.value == "") {
            alert("Login ID should not be empty..");
            document.frmadminlogin.loginid.focus();
            return false;
        } else if (!document.frmadminlogin.loginid.value.match(alphanumericExp)) {
            alert("Login ID not valid..");
            document.frmadminlogin.loginid.focus();
            return false;
        } else if (document.frmadminlogin.password.value == "") {
            alert("Password should not be empty..");
            document.frmadminlogin.password.focus();
            return false;
        } else if (document.frmadminlogin.password.value.length < 8) {
            alert("Password length should be more than 8 characters...");
            document.frmadminlogin.password.focus();
            return false;
        } else {
            return true;
        }
    }
</script>
