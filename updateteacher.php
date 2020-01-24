<?php
$booking_id=-1;
if($_GET['id']){
    $id=$_GET['id'];
}
session_start();
$teacher_id=$_SESSION['teacher_id'];
try{
                $conn=new PDO("mysql:host=localhost;dbname=online_teaching_system;",'root','');
                echo "<script>console.log('connection successful')</script>";
                
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            }
            catch(PDOException $e){
                echo "<script>console.log('connection error')</script>";
                
            }
include("header.php");
//include("dbconnection.php");

?>


<div>
    <?php
    $sql="SELECT * FROM teacher WHERE teacher_id='$teacher_id'";
    $result=$conn->query($sql);
    $table=$result->fetchAll();
    foreach($table as $row){
    ?>
	<form action="teacherinfo.php" method="post">
			
			<div>
				<div>
					<hr>
    
					<input id="teacher_id"  type="hidden" name="teacher_id" value="<?php echo $row[0]?>" required>
					<label for="teacher_name"><b>Teacher Name</b></label>
					<input id="teacher_name" type="text" name="teacher_name" value="<?php echo $row[1]?>" required><br>

					<label for="email"><b>Email</b></label>
					<input id="email"  type="email" name="email" value="<?php echo $row[2]?>" required><br>

					<label for="phone_number"><b>Phone Number</b></label>
					<input id="phone_number"  type="text" name="phone_number" value="<?php echo $row[3]?>" required><br>


                    <label for="gra_complete"><b>Graduation Complete</b></label>
					<input id="gra_complete"  type="text" name="gra_complete" value="<?php echo $row[4]?>" required><br>

					<label for="aca_result"><b>Academic Result</b></label>
					<input id="aca_result"  type="text" name="aca_result" value="<?php echo $row[5]?>" required><br>

					<label for="subject"><b>Subject</b></label>
					<input id="subject"  type="text" name="subject" value="<?php echo $row[9]?>" required><br>

					<label for="sala_tution"><b>Salary For Tution</b></label>
					<input id="sala_tution"  type="text" name="sala_tution" value="<?php echo $row[6]?>" required><br>

					<label for="password"><b>Password</b></label>
					<input id="password"  type="password" name="password" value="<?php echo $row[7]?>" required><br>
                    
                    <label for="study_field"><b>Study Field</b></label>
					<input id="study_field"  type="text" name="study_field" value="<?php echo $row[8]?>" required><br>
					<hr class="mb-3">

					<input class="btn btn-success" type="submit" id="register" name="create" value="Sign Up">
				</div>
			</div>
	</form>
    <?php
    }
    ?>
</div>


<?php
include("footer.php");
?>