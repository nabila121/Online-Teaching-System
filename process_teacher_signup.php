<?php 

$db_user = "root";
$db_pass = "";
$db_name = "online_teaching_system";

$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   if(isset($_POST)){


        $teacher_name    = $_POST['teacher_name'];
        $email           = $_POST['email'];
        $phone_number    = $_POST['phone_number'];
        $gra_complete    = $_POST['gra_complete'];
        $aca_result      = $_POST['aca_result'];
        $subject         = $_POST['subject'];
        $sala_tution     = $_POST['sala_tution'];
        $password        = $_POST['password'];
        $study_field     = $_POST['study_field'];
       echo $study_field;

	    $sql = "INSERT INTO teacher(teacher_name, email, phone_number, gra_complete, aca_result, sala_tution,  password, study_field, subject ) VALUES(?,?,?,?,?,?,?,?,?)";
	    $stmtinsert = $db->prepare($sql);
	    $result = $stmtinsert->execute([$teacher_name, $email, $phone_number, $gra_complete, $aca_result, $sala_tution, $password, $study_field, $subject]);
        
	    if($result){
            echo 'Successfully saved.';
	    }
        else{
        	echo 'Not saved have problem.';
        }
	    
	}

?>

