<?php 

$db_user = "root";
$db_pass = "";
$db_name = "online_teaching_system";

$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
   if(isset($_POST)){


        $first_name      = $_POST['first_name'];  
        $last_name       = $_POST['last_name'];
        $email           = $_POST['email'];
        $phone_number    = $_POST['phone_number'];
        $password        = $_POST['password'];

	    $sql = "INSERT INTO student(first_name, last_name, email, phone_number, password) VALUES(?,?,?,?,?)";
	    $stmtinsert = $db->prepare($sql);
	    $result = $stmtinsert->execute([$first_name, $last_name, $email, $phone_number, $password]);
	    if($result){
            echo 'Successfully saved.';
            //echo "<script>location.assign('student_login.php')</script>";
//            include('student_login.php');
//            exit();
	    }
        else{
        	echo 'Not saved have problem.';
        }
	    
	}

?>

