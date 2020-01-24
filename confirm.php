<?php

session_start();
$booking_id=-1;
if($_GET['id']){
    $booking_id=$_GET['id'];
   
}
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
    
        
        
        try{
             
            $sqlquery="UPDATE booking SET confirm=1 WHERE booking_id='$booking_id'";
            
            $conn->exec($sqlquery);
            echo "<script>console.log('update successful')</script>";
             echo "<script>location.assign('bookedinfo.php')</script>";
        }
        catch(PDOException $e){
            echo "<script>console.log('query error')</script>";
            
            
        }

        
            
            ?>