<?php
$booking_id=-1;
if($_GET['booking_id']){
    $booking_id=$_GET['booking_id'];
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
<div class="wrapper col2">
	<div id="breadcrumb">

		<div class="dropdown">
            
            <?php
            $sql="SELECT * FROM booking WHERE booking_id='$booking_id'";
            $result=$conn->query($sql);
            $table=$result->fetchAll();
            foreach($table as $row){
            ?>
			<form action="ordered.php" method="post">
                <input type="hidden" name="booking_id" value="<?php echo $booking_id?>">
                Institution: <input type="text" name="Institution" value="<?php echo $row[1]?>"><br><br>
                class: <input type="text" name="Class" value="<?php echo $row[2]?>"><br><br>
                Time: <input type="time" name="start_time" value="<?php echo $row[3]?>"><br><br>
                Date: <input type="date" name="start_date" value="<?php echo $row[4]?>"><br><br>
                Comments: <textarea name="comments" style="width:20%;height:20%;"><?php echo $row[5]?></textarea><br>
                <input type="submit" value="Submit" name="submit">
            </form>
            <?php
            }
            ?>
		</div>


    </div>
</div>

<div class="clear"></div>

<?php
include("footer.php");
?>
