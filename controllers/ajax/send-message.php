<?php
require('./models/send-message.php');

header("Access-Control-Allow-Origin: *");
$data = file_get_contents('php://input');
$json = json_decode($data);

$content = trim($json->content);
$email = $json->email;
$testId = intval($json->testId);

var_dump($testId,$email,$content) ;

sendMessage($content,$email,$testId);

echo json_encode($res);