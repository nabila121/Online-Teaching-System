<?php
if($_SERVER['REQUEST_METHOD']=="OPTIONS"){
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
	header("Access-Control-Allow-Headers: Content-Type");
	header("Access-Control-Allow-Max-Age: 86400");
}

//---------------------to insert a new students data ------------------------------------------------

///request URI: POST http://localhost:port/RESTApis/students.php

///data is sent as raw data by setting the request Content-Type as application/json and the data is received in the server side through file_get_contents('php://input') method calling

///sample data to send with the request: { "name" : "new user 1", "email": "newuser@gmail.com", "dob" : "1993-01-01", "address" : "dhaka, bangladesh"}


if($_SERVER['REQUEST_METHOD']=='POST'){
	///setting the headers
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	
	///receiving the entity body of HTTP requests
	$jsonstring=file_get_contents("php://input");
	
	$phparray=json_decode($jsonstring,true);
	
	///connecting to database
	try{
		$conn=new PDO("mysql:host=localhost:3306;dbname=online_teaching_system",'root','');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		///automatically setting the next available id to the next student
		///next available id = current maxid + 1
		$maxidquery="SELECT MAX(teacher_id) FROM teacher";
		$table=$conn->query($maxidquery)->fetchAll();
		
		$newid=$table[0][0]+1;
		$teacher_name=$phparray['teacher_name'];
		$email=$phparray['email'];
		$phone_number=$phparray['phone_number'];
		$gra_complete=$phparray['gra_complete'];
        $aca_result=$phparray['aca_result'];
        $sala_tution=$phparray['sala_tution'];
        $password=$phparray['password'];
        $study_field=$phparray['study_field'];
        $subject=$phparray['subject'];
		
		$insertquery="INSERT INTO teacher VALUES($newid,'$teacher_name','$email','$phone_number','$gra_complete','$aca_result','$sala_tution','$password','$study_field','$subject')";
		$conn->exec($insertquery);
		
		http_response_code(201);
		echo json_encode(array("message"=>"Student added successfully", "id"=>$newid));
		
	}
	catch(PDOException $ex){
		///database or query error
		http_response_code(503);

		echo json_encode(array("message"=>"Service Unavailable"));
	}
}

?>