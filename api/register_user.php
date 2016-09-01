<?php

include('db.php');
include('api.php');



$flag = true;


$username = $_POST["username"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$password = $_POST["password"];

$password = md5($password);

$query = "SELECT * FROM `user` WHERE username='$username'";
$result = mysql_query($query);
if(!$result)
{
     	$result_json=array('result' => 'dberror','reason' => 'Data base error');
}

$rows = mysql_num_rows($result);
if($rows>0)
{
	$flag = false;	
	$result_json=array('result' => 'failure','reason' => 'username already exists');		
}

if($flag)
{
$result_json=array('result' => 'unknown');
$query = "INSERT into `user` (username, password, email, phone) VALUES ('$username', '$password', '$email', '$phone')";
$result = mysql_query($query);
if($result)
{
     	$result_json=array('result' => 'success');
     	$subject = "Registration successfull";
     	$message = "Hi User, <p>Your user registration is successfull on Hotel Pothigai. Please keep in touch.</p><p>Regards,<br> Hotel Pothigai</p>";
     	mail($email, $subject, $message, "From: admin@hotelpothigai.in"); 
}
else
{
	$result_json=array('result' => 'error');
}
}




echo json_encode($result_json);

?> 