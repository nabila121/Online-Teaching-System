<?php

session_start();

if(!isset($_SESSION[student_id]))
{
	echo "<script>window.location='student_login.php';</script>";
}
$student_id=$_SESSION['student_id'];
//include("dbconnection.php");

            try{
                $conn=new PDO("mysql:host=localhost;dbname=online_teaching_system;",'root','');
                echo "<script>console.log('connection successful')</script>";
                
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            }
            catch(PDOException $e){
                echo "<script>console.log('connection error')</script>";
                
            }
        

include("studenthome.php");


 
   if($_SERVER["REQUEST_METHOD"]=="POST"){

       if(isset($_POST['teacher_id'])) $teacher_id=$_POST['teacher_id'];
       if(isset($_POST['Institution'])) $Institution= $_POST['Institution'];  
       if(isset($_POST['Class'])) $Class=$_POST['Class'];
       if(isset($_POST['start_time'])) $start_time=$_POST['start_time'];
       if(isset($_POST['start_date'])) $start_date=$_POST['start_date'];
       if(isset($_POST['comments'])) $comments=$_POST['comments'];
       $confirm=0;
             
       try{
	    $sql = "INSERT INTO booking(Institution, Class, start_time, start_date, comments,student_id,teacher_id,confirm) VALUES('$Institution','$Class','$start_time','$start_date','$comments','$student_id','$teacher_id','$confirm')";
           var_dump($sql);
        $conn->exec($sql);
	    
            echo "<script>location.assign('ordered.php')</script>";
       }
       catch(PDOException $e){
           echo "query error";
           echo $e->getMessage();
       }
            //echo "<script>location.assign('student_login.php')</script>";
//            include('student_login.php');
//            exit();
	    //}
        //else{
        	//echo 'Not saved have problem.';
        //}
	    
	}


?>



<div class="clear"></div>

<?php
include("footer.php");
?>