<?php
session_start();
if(!isset($_SESSION['teacher_id']))
{
	echo "<script>window.location='student_login.php';</script>";
}
$teacher_id=$_SESSION['teacher_id'];
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
		<th colspan="11"><h2>Student Booked List</h2></th>

	</tr>

	<t>
		<th>Name</th>
		<th>email</th>
        <th>phone_number</th>
        <th>start_time</th>
        <th>start_date</th>
        <th>Class</th>
        <th>Institution</th>
        
        
		
		
	</t>

	<?php
    try{
            if(isset($_GET['booking_id'])){
                $booking_id=$_GET['booking_id'];
                $sqlquery="DELETE FROM booking WHERE booking_id='$booking_id'";
                $conn->exec($sqlquery);
                echo "<script>console.log('delete row')</script>";
            }
            
        }
        catch(PDOException $e){
            echo "<script>console.log('delete query error')</script>";
            
        }
    try{
    $sql = "SELECT student.first_name,student.last_name, student.email, student.phone_number, booking.start_time,booking.start_date,booking.Class,booking.Institution,booking.booking_id from student join booking join teacher where student.student_id=booking.student_id AND booking.teacher_id=teacher.teacher_id AND teacher.teacher_id='$teacher_id'";
    $result = $conn-> query($sql);
    $table=$result->fetchAll();

        
	foreach($table as $row){
    ?>
		<tr> 
		  
		  <td><?php echo $row[0]; ?> <?php echo $row[1]; ?></td>
		  <td><?php echo $row[2]; ?></td>
		  <td><?php echo $row[3]; ?></td>
          <td><?php echo $row[4]; ?></td>
          <td><?php echo $row[5]; ?></td>
          <td><?php echo $row[6]; ?></td>
          <td><?php echo $row[7]; ?></td>
            <td><input type="submit" name="Delete" id="btn1" value="Delete" onclick="booking(<?php echo $row[8]; ?>)">   <input type="submit" name="Confirm" id="btn2" Value="Confirm" onclick="confirm(<?php echo $row[8];?>)"></td>


		</tr>
    <script>
        function booking(id){
            location.assign('bookedinfo.php?booking_id='+id);
        }
        
        function confirm(id){
            location.assign('confirm.php?id='+id);
        }
    </script>
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

