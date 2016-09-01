<?php
session_start();
include('db.php');
include('api.php');

$username = $_POST["username"];
$password = $_POST["password"];
$password = md5($password);

$result_json=array('result' => 'unknown');
$query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";

$result = mysql_query($query);
if(!$result)
{
     	$result_json=array('result' => 'dberror','reason' => 'Data base error');
}


$rows = mysql_num_rows($result);
if($rows>0)
{
	
	$_SESSION['username'] = $username;
		
	$result_json=array('result' => 'success');		
}
else
{
		
	$result_json=array('result' => 'failure','reason' => 'username or password is not available');
}



echo json_encode($result_json);

?> 