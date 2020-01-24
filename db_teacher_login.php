<?php

include("studenthome.php");

$conn = mysqli_connect("localhost", "root" , "", "online_teaching_system");
if ($conn-> connect_error) {
die("Connection failed:" . $conn-> connect_error);
echo "Good Job!";
}

$sql = "SELECT  teacher_id, teacher_name,  email, phone_number, subject from teacher" ;
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
		<th colspan="9"><h2>Teacher Account</h2></th>

	</tr>

	<t>
	    <th>teacher_id</th>
		<th>teacher_name</th>
		<th>email</th>
		<th>phone_number</th>
        <th>subject</th>
	</t>


	<?php
	while($row = $result->fetch_assoc()){
    ?>
		<tr> 
	
	      <td><?php echo $row['teacher_id']; ?></td>
          <td><?php echo $row['teacher_name']; ?></td>
          <td><?php echo $row['email']; ?></td>
		  <td><?php echo $row['phone_number']; ?></td>
		  <td><?php echo $row['subject']; ?></td>

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