
<?php
include('api.php');
session_start();

$result_json=array('result' => 'unknown');
if(session_destroy())
{

$result_json=array('result' => 'success');

}
echo json_encode($result_json);
?>