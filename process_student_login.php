<?php 

$db_user = "root";
$db_pass = "";
$db_name = "online_teaching_system";

$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   if(isset($_POST)){



        $student_id      = $_POST['student_id'];
        $first_name      = $_POST['first_name'];
        $last_name       = $_POST['last_name'];
        $email           = $_POST['email'];
       
	    $sql = "INSERT INTO student(student_id, first_name, last_name email, email) VALUES(?,?,?,?)";
	    $stmtinsert = $db->prepare($sql);
	    $result = $stmtinsert->execute([$student_id, $first_name, $last_name, $email]);
	    if($result){
            echo 'Successfully saved.';
	    }
        else{
        	echo 'Not saved have problem.';
        }
	    
	}

?>