<?php
include("header.php");
include("dbconnection.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Teacher Registration | PHP</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<div>
	<form action="teacher_signup.php" method="post">
		<div class="container">
			
			<div class="row">
				<div class="col-sm-5">
					<h1>Teacher Registration</h1>
					<p>Fill up the below form.</p>
					<hr class="mb-3">
					<label for="teacher_name"><b>Teacher Name</b></label>
					<input class="form-control" id="teacher_name" type="text" name="teacher_name" required>

					<label for="email"><b>Email</b></label>
					<input class="form-control" id="email"  type="email" name="email" required>

					<label for="phone_number"><b>Phone Number</b></label>
					<input class="form-control" id="phone_number"  type="text" name="phone_number" required>


                    <label for="gra_complete"><b>Graduation Complete</b></label>
					<input class="form-control" id="gra_complete"  type="text" name="gra_complete" required>

					<label for="aca_result"><b>Academic Result</b></label>
					<input class="form-control" id="aca_result"  type="text" name="aca_result" required>

					<label for="subject"><b>Subject</b></label>
					<input class="form-control" id="subject"  type="text" name="subject" required>

					<label for="sala_tution"><b>Salary For Tution</b></label>
					<input class="form-control" id="sala_tution"  type="text" name="sala_tution" required>

					<label for="password"><b>Password</b></label>
					<input class="form-control" id="password"  type="password" name="password" required>
					<hr class="mb-3">
                    
                    
                    
                    
                    <label for="study_field"><b>Study Field</b></label>
					<input class="form-control" id="study_field"  type="text" name="study_field" required>
					<hr class="mb-3">
                    
                    
                    
                    
                    

					<input class="btn btn-success" type="submit" id="register" name="create" value="Sign Up">
					<p>Already a member? <a href="teacher_login.php">Sign In</a></p>
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

                    var teacher_name = $('#teacher_name').val();
                    var email = $('#email').val();
                    var phone_number = $('#phone_number').val();
                    var gra_complete = $('#gra_complete').val();
                    var aca_result = $('#aca_result').val();
                    var subject = $('#subject').val();
                    var sala_tution = $('#sala_tution').val();
                    var password = $('#password').val();
                    var study_field = $('#study_field').val();

                    e.preventDefault();

                    $.ajax({
					type: 'POST',
					url: 'process_teacher_signup.php',
					data: {
						teacher_name: teacher_name,
						email: email,
						phone_number: phone_number,
                        gra_complete: gra_complete,
                        aca_result: aca_result,
                        subject: subject,
                        sala_tution: sala_tution,
						password: password,
                        study_field: study_field
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