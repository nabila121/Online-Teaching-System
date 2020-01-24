<?php
session_start();
if(!isset($_SESSION['student_id']))
{
	echo "<script>window.location='student_login.php';</script>";
}
$student_id=$_SESSION['student_id'];
include("studenthome.php");

try{
                $conn=new PDO("mysql:host=localhost;dbname=online_teaching_system;",'root','');
                echo "<script>console.log('connection successful')</script>";
                
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            }
            catch(PDOException $e){
                echo "<script>console.log('connection error')</script>";
                
            }

?>



<!DOCTYPE html>
<html>
<head>
<title>Teacher database</title>
</head>
<body>

<table align ="center" border="1px">
	<tr>
		<th colspan="11"><h2>Confirmed Teacher</h2></th>

	</tr>

	<t>
		<th>teacher_name</th>
		<th>email</th>
		<th>phone_number</th>
        <th>study_field</th>
		<th>subject</th>
		<th>sala_tution</th>
        <th>Institution</th>
        <th>Class</th>
        <th>start_time</th>
        <th>start_date</th>
        
		
	</t>

	<?php
    
    try{
    $sql = "SELECT teacher.teacher_name, teacher.email, teacher.phone_number, teacher.study_field, teacher.subject, teacher.sala_tution, booking.booking_id, booking.Institution, booking.Class, booking.start_time, booking.start_date from teacher join booking where teacher.teacher_id=booking.teacher_id AND booking.student_id='$student_id' AND booking.confirm=1";
        
    $result = $conn-> query($sql);
    $table=$result->fetchAll();

        
	foreach($table as $row){
    ?>
		<tr> 
		  
		  <td><?php echo $row[0]; ?></td>
		  <td><?php echo $row[1]; ?></td>
		  <td><?php echo $row[2]; ?></td>
            <td><?php echo $row[3]; ?></td>
		  <td><?php echo $row[4]; ?></td>
		  <td><?php echo $row[5]; ?></td>
            <td><?php echo $row[7]; ?></td>
            <td><?php echo $row[8]; ?></td>
            <td><?php echo $row[9]; ?></td>
            <td><?php echo $row[10]; ?></td>
            
		  

		</tr>
   
	<?php

    }
    }
    catch(PDOException $e){
        echo "<script>console.log('query error')</script>";
    }

	?>
    
</table>

</body>
</html>

<?php
include("footer.php");
?>