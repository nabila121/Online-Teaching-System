<?php
session_start();
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
		<th colspan="11"><h2>Booked Teacher</h2></th>

	</tr>

	<t>
		<th>teacher_name</th>  
		<th>subject</th>
        <th>Student Name</th>
        <th>Institution</th>
		
	</t>

	<?php
    
    try{
    $sql = "SELECT teacher.teacher_name, teacher.subject, booking.Institution, student.first_name, student.last_name from teacher join booking join student where teacher.teacher_id=booking.teacher_id AND booking.student_id=student.student_id";
    $result = $conn-> query($sql);
    $table=$result->fetchAll();

        
	foreach($table as $row){
    ?>
		<tr> 
		  
		  <td><?php echo $row[0]; ?></td>
		  <td><?php echo $row[1]; ?></td>
		  <td><?php echo $row[3]." "; ?><?php echo $row[4]; ?></td>
            <td><?php echo $row[2]; ?></td>
		  
		  

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