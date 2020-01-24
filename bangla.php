<?php

include("studenthome.php");

$conn = mysqli_connect("localhost", "root" , "", "online_teaching_system");
if ($conn-> connect_error){
die("Connection failed:" . $conn-> connect_error);
echo "Good Job!";
} 

$sql = "SELECT teacher_id, teacher_name, email, phone_number, gra_complete, aca_result, study_field, subject, sala_tution from teacher where subject='Bangla'" ;
$result = $conn-> query($sql);

           
?>

<!DOCTYPE html>
<html>
<head>
<title>Teacher database</title>
</head>
<body>

<table align ="center" border="1px">
	<tr>
		<th colspan="9"><h2>Bangla Teacher</h2></th>

	</tr>

	<t>
		<th>teacher_name</th>
		<th>email</th>
		<th>phone_number</th>
		<th>gra_complete</th>
		<th>aca_result</th>
        <th>study_field</th>
		<th>subject</th>
		<th>sala_tution</th>
        <th>Add/Contact<th>
		
	</t>


	<?php
	while($row = $result->fetch_assoc()){
    ?>
		<tr> 
		  
		  <td><?php echo $row['teacher_name']; ?></td>
		  <td><?php echo $row['email']; ?></td>
		  <td><?php echo $row['phone_number']; ?></td>
		  <td><?php echo $row['gra_complete']; ?></td>
		  <td><?php echo $row['aca_result']; ?></td>
            <td><?php echo $row['study_field']; ?></td>
		  <td><?php echo $row['subject']; ?></td>
		  <td><?php echo $row['sala_tution']; ?></td>
            <td><input type="submit" name="Booked" id="btn1" value="Booked" onclick="booking(<?php echo $row['teacher_id']; ?>)">   <input type="submit" name="Chat" id="btn2" Value="Chat"></td>
		  

		</tr>
	<?php

    }

    $conn-> close();

	?>
    
    <script>
        function booking(id){
            location.assign('booking.php?id='+id);
        }
    </script>
</table>

</body>
</html>

<?php
include("sfooter.php");
?>