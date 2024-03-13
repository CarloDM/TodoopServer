<?php

header("Access-Control-Allow-Origin: *");

// var_dump('ciao');
$response = array('message' => 'Questa è una risposta dall\'index.php');
echo json_encode($response);

?>