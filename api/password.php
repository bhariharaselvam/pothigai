<?php
require('api.php');
require('db.php');
session_start();
$username = $_SESSION["username"];
$password = $_POST["password"];
$password = md5($password);
$npassword = $_POST["npassword"];
$npassword = md5($npassword);
$sql="update `user` set password='$npassword' WHERE username='$username' and password='$password'";

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