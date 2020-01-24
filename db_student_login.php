<?php

include("studenthome.php");

$conn = mysqli_connect("localhost", "root" , "", "online_teaching_system");
if ($conn-> connect_error) {
die("Connection failed:" . $conn-> connect_error);
echo "Good Job!";
} 

$sql = "SELECT student_id, first_name, last_name, email, phone_number from student" ;
$result = $conn-> query($sql);
       
?>

<!DOCTYPE html>
<html>
<head>
<title>Student database</title>
</head>
<body>

<table align ="center" border="1px">
	<tr>
		<th colspan="5"><h2>Student Account</h2></th>

	</tr>

	<t>
		<th>student_id</th>
		<th>first_name</th>
		<th>last_name</th>
		<th>email</th>
		<th>phone_number</th>
	</t>


	<?php
	while($row = $result->fetch_assoc()){
    ?>
		<tr> 
          

		  <td><?php echo $row['student_id']; ?></td>
          <td><?php echo $row['first_name']; ?></td>
          <td><?php echo $row['last_name']; ?></td>
		  <td><?php echo $row['email']; ?></td>
		  <td><?php echo $row['phone_number']; ?></td>

		</tr>
	<?php

    }

    $conn-> close();

	?>
</table>

</body>
</html>

<?php
include("footer.php");
?>