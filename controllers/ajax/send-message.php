<?php
require('./models/send-message.php');

header("Access-Control-Allow-Origin: *");
$data = file_get_contents('php://input');
$json = json_decode($data);
$res = new stdClass();
$content = trim($json->content);

if (!empty($content) && !empty($json->email) && !empty($json->testId)){


    $email = $json->email;
    $testId = intval($json->testId);

    $res = sendMessage($content,$email,$testId);
}else{
    $res->sendMessage = 0;
}



echo json_encode($res);