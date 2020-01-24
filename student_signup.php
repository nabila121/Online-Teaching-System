<?php
//include("studenthome.php");
include("dbconnection.php");

include("header.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Registration | PHP</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<div>
	<form action="student_signup.php" method="post">
		<div class="container">
			
			<div class="row">
				<div class="col-sm-5">
					<h1>Student Registration</h1>
					<p>Fill up the below form.</p>
					<hr class="mb-3">
					<label for="first_name"><b>First Name</b></label>
					<input class="form-control" id="first_name" type="text" name="first_name" required>

					<label for="last_name"><b>Last Name</b></label>
					<input class="form-control" id="last_name"  type="text" name="last_name" required>

					<label for="email"><b>Email</b></label>
					<input class="form-control" id="email"  type="email" name="email" required>

					<label for="phone_number"><b>Phone Number</b></label>
					<input class="form-control" id="phone_number"  type="text" name="phone_number" required>

					<label for="password"><b>Password</b></label>
					<input class="form-control" id="password"  type="password" name="password" required>
					<hr class="mb-3">
					<input class="btn btn-success" type="submit" id="register" name="create" value="Sign Up">
					<p>Already a member? <a href="student_login.php">Sign In</a></p>
				</div>
			</div>
		</div>
	</form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script type="text/javascript">
        $(function() {
            $('#register').click(function(e) {

                var valid = this.form.checkValidity();

                if (valid) {

                    var first_name = $('#first_name').val();
                    var last_name = $('#last_name').val();
                    var email = $('#email').val();
                    var phone_number = $('#phone_number').val();
                    var password = $('#password').val();

                    e.preventDefault();

                    $.ajax({
					type: 'POST',
					url: 'process_student_signup.php',
					data: {
						first_name: first_name,
						last_name: last_name,
						email: email,
						phone_number: phone_number,
						password: password
					},
					success: function(data){
					Swal.fire({
								'title': 'Successful',
								'text': data,
								'type': 'success'
								})
							
					},
					error: function(data){
						Swal.fire({
								'title': 'Errors',
								'text': 'There were errors while saving the data.',
								'type': 'error'
								})
					}
				});

                } 
                else {

                }
            });
        });
    </script>
    </body>
</html>
	

<?php
include("footer.php");
?>