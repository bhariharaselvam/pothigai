<?php
require('api.php');
require('db.php');
session_start();
$username = $_SESSION["username"];
$fname = $_POST["first_name"];
$lname = $_POST["last_name"];
$phone = $_POST["phone"];
$email = $_POST["email"];

$sql="update `user` set firstname='$fname', lastname='$lname', email='$email', phone='$phone' WHERE username='$username'";

$rows = array();
$status = "unknown";
$result_json = array("result" => "unknown");
$sql_result = mysql_query($sql);

if ($sql_result)
{
  	$result_json = array("result" => "success");
  
}
else
{
	$result_json = array("result" => "error");
}


if(!isset($_SESSION["username"])){
	$result=array('result' => 'auth_error');
}
echo json_encode($result_json);

?>