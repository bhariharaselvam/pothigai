
<?php
session_start();
if(!isset($_SESSION["username"])){
header('Cache-Control: no-cache, must-revalidate');
header('Content-type: application/json');
$result_json = array('result' => 'loginerror');
echo json_encode($result_json);

exit(); 
}
?>
