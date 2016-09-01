<?php

require('db.php');
$sql="SELECT * FROM user";

$rows = array();
$status = "unknown";
$sql_result = mysql_query($sql);

if (!$sql_result)
{
  	$status = "error";
  
}

while($row = mysql_fetch_row($sql_result)) 
{
	$status = "success";
    	$rows[] = $row;
}

header('Content-type: application/json');

$result = array('status' => $status,'rows' => $rows);
session_start();
if(!isset($_SESSION["username"])){
	$result=array('result' => 'auth_error');
}
echo json_encode($result);

?>