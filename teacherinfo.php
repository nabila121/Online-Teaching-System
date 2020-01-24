<?php
session_start();
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
<?php
    
    if($_SERVER['REQUEST_METHOD']=="POST"){
        ///insert 
        if(isset($_POST['teacher_id'])) $teacher_id=$_POST['teacher_id'];
        if(isset($_POST['teacher_name'])) $teacher_name=$_POST['teacher_name'];
        if(isset($_POST['email'])) $email=$_POST['email'];        
        if(isset($_POST['gra_complete'])) $gra_complete=$_POST['gra_complete'];
        if(isset($_POST['aca_result'])) $aca_result=$_POST['aca_result'];
        if(isset($_POST['sala_tution'])) $sala_tution=$_POST['sala_tution'];
        if(isset($_POST['password'])) $password=$_POST['password'];
        if(isset($_POST['study_field'])) $study_field=$_POST['study_field'];
        if(isset($_POST['subject'])) $subject=$_POST['subject'];
        if(isset($_POST['phone_number'])) $phone_number=$_POST['phone_number'];
        
        
        try{
            $sqlquery="UPDATE teacher SET teacher_name='$teacher_name', email='$email', phone_number='$phone_number', gra_complete='$gra_complete',aca_result='$aca_result',sala_tution='$sala_tution',password='$password',study_field='$study_field',subject='$subject' WHERE teacher_id='$teacher_id'";
            $conn->exec($sqlquery);
            echo "<script>console.log('update successful')</script>";
        }
        catch(PDOException $e){
            echo "<script>console.log('query error')</script>";
            
            
        }
    }
        
            
            ?>
<?php
try{
            if(isset($_GET['id'])){
                $teacher_id=$_GET['teacher_id'];
                $sqlquery="DELETE FROM teacher WHERE teacher_id='$teacher_id'";
                $conn->exec($sqlquery);
                echo "<script>console.log('delete row')</script>";
            }
            
        }
        catch(PDOException $e){
            echo "<script>console.log('delete query error')</script>";
            
        }
$sql = "SELECT teacher_id, teacher_name, email, phone_number, gra_complete, aca_result, subject, sala_tution from teacher WHERE teacher_id='$teacher_id'" ;
$result = $conn-> query($sql);
$table=$result->fetchAll();

           
?>

<!DOCTYPE html>
<html>
<head>
<title>Teacher database</title>
</head>
<body>

<table align ="center" border="1px">
	<tr>
		<th colspan="9"><h2>Teacher Registration</h2></th>

	</tr>

	<t>
        
		<th>teacher_name</th>
		<th>email</th>
		<th>phone_number</th>
		<th>gra_complete</th>
		<th>aca_result</th>
		<th>subject</th>
		<th>sala_tution</th>
        <th>Delete/Update</th>
		
	</t>


	<?php
	foreach($table as $row){
    ?>
		<tr> 
		  
		  <td><?php echo $row[1]; ?></td>
		  <td><?php echo $row[2]; ?></td>
		  <td><?php echo $row[3]; ?></td>
		  <td><?php echo $row[4]; ?></td>
		  <td><?php echo $row[5]; ?></td>
		  <td><?php echo $row[6]; ?></td>
		  <td><?php echo $row[7]; ?></td>
            <td><input type="submit" name="Delete" id="btn1" value="Delete" onclick="deleteinfo(<?php echo $row[0]; ?>)">  <input type="submit" name="Update" id="btn2" Value="Update" onclick="updateinfo(<?php echo $row[0]; ?>)"></td>
		  

		</tr>
    <script>
        function deleteinfo(id){
            location.assign('teacherinfo.php?id='+id);
        }
        function updateinfo(id){
            location.assign('updateteacher.php?id='+id);
        }
    </script>
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