<?php

$searchval="";
if(isset($_GET['search'])) $searchval=$_GET['search'];

try{
    $conn=new PDO("mysql:host=localhost;dbname=online_teaching_system",'root','');

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $ex){
    echo "<script>window.alert('db connection errror')</script>";
}
?>


<?php
$searchquery="SELECT teacher_name,email,phone_number,gra_complete,aca_result,study_field,subject,sala_tution FROM teacher WHERE subject LIKE '%$searchval%'";
if($searchval==""){
            echo "<div align='center'><div class='id3' align='center'>No Data Found</div></div>";
}
else{
    try{
    $object=$conn->query($searchquery);
    if($object->rowCount() == 0){
        echo "<div align='center'><div class='id3' align='center'>No Data Found</div></div>";
    }
    else{

        $tablecode="";
        $table=$object->fetchAll();
        ?>
        <div align="center">
            <span id="id1">
                <section id="id2">
                    
        <table align="center" style="width:100%;height:20%; border: 2px solid #fff;">
        <tbody >
        <th style='text-align:center;border:2px solid #fff'>teacher</th>
		<th style='text-align:center;border:2px solid #fff'>email</th>
		<th style='text-align:center;border:2px solid #fff'>phone</th>
		<th style='text-align:center;border:2px solid #fff'>university</th>
		<th style='text-align:center;border:2px solid #fff'>result</th>
        <th style='text-align:center;border:2px solid #fff'>field</th>
		<th style='text-align:center;border:2px solid #fff'>subject</th>
		<th style='text-align:center;border:2px solid #fff'>Charge</th>
        <th style='text-align:center;border:2px solid #fff'>Add/Contact<th>
        <?php
        foreach($table as $row){
            $tablecode.= "<tr><td style='padding-right:45px; padding-left:30px; border:2px solid #fff'>$row[0]</td>
                            <td style='text-align:center;border:2px solid #fff'>$row[1]</td>
                            <td style='text-align:center;border:2px solid #fff'>$row[2]</td>
                            <td style='text-align:center;border:2px solid #fff'>$row[3]</td>
                            <td style='text-align:center;border:2px solid #fff'>$row[4]</td>
                            <td style='text-align:center;border:2px solid #fff'>$row[5]</td>
                            <td style='text-align:center;border:2px solid #fff'>$row[6]</td>
                            <td style='text-align:center;border:2px solid #fff'>$row[7]</td>
                             
            <td style='text-align:center;border:2px solid #fff'><a href='Math.php'><input type='button' name='Booked' id='btn1' value='Booked'> </a>  <input type='button' name='Chat' id='btn2' Value='Chat'></td>
                            </tr>";
        }
        
        echo $tablecode;
        ?>
        </tbody>
</table>
                </section>
            </span>
</div>

<?php
    }
}
catch(PDOException $ex1){
    echo "<script>console.log('search error')</script>";
}

    
}



?>