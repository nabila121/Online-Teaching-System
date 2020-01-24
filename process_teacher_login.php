<?php 

$db_user = "root";
$db_pass = "";
$db_name = "online_teaching_system";

$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
   if(isset($_POST)){



        $teacher_id      = $_POST['teacher_id '];
        $teacher_name     = $_POST['teacher_name'];
        $email           = $_POST['email'];
        $phone_number    = $_POST['phone_number'];
        $subject         = $_POST['subject'];

	    $sql = "INSERT INTO teacher(teacher_id, teacher_name,  email, phone_number, subject) VALUES(?,?,?,?,?";
	    $stmtinsert = $db->prepare($sql);
	    $result = $stmtinsert->execute([$teacher_id, $teacher_name, $email, $phone_number, $subject]);
	    if($result){
            echo 'Successfully saved.';
	    }
        else{
        	echo 'Not saved have problem.';
        }
	    
	}

?>
