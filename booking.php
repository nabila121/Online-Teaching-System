<?php
$id=-1;
if($_GET['id']){
    $id=$_GET['id'];
}
session_start();

if(!isset($_SESSION[student_id]))
{
	echo "<script>window.location='student_login.php';</script>";
}
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
?>
<div style="background:pink" class="wrapper col2">
	<div id="breadcrumb">

		<div  class="dropdown">
			<form action="bookingform.php" method="post">
                <input style="border:2px solid transparent;" type="hidden" name="teacher_id" value="<?php echo $id?>">
                Institution: <input  type="text" name="Institution" placeholder="Enter institute name"><br><br>
                class: <input type="text" name="Class" placeholder="Enter class"><br><br>
                Time: <input type="time" name="start_time"><br><br>
                Date: <input type="date" name="start_date"><br><br>
                Comments: <textarea style="width: 100%;height: 150px;padding: 12px 20px;box-sizing: border-box;border: 2px solid #ccc;border-radius: 4px;background-color: #f8f8f8;resize: none;"name="comments" style="width:20%;height:20%;"></textarea><br><br>
                <input style="border-radius:5px; background:blue; color:#fff" type="submit" value="Submit" name="submit">
            </form>
		</div>


	</div>
</div>

<div class="clear"></div>

<?php
include("footer.php");
?>
