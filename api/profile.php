<?php
require('api.php');
require('db.php');
session_start();
$username = $_SESSION["username"];
$sql="SELECT * FROM `user` WHERE username='$username'";

$rows = array();
$status = "unknown";
$sql_result = mysql_query($sql);

if (!$sql_result)
{
  	$status = "error";
  
}

$profile = array();
while($row = mysql_fetch_row($sql_result)) 
{
	$status = "success";
    	$profile = array('username' => $row[1], 'first_name'=> $row[3],'last_name'=> $row[4], 'email' => $row[5],'phone'=> $row[6] );
}

header('Content-type: application/json');

$result = array('status' => $status,'profile' => $profile);

if(!isset($_SESSION["username"])){
	$result=array('result' => 'auth_error');
}
echo json_encode($result);

?>