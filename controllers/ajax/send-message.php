<?php
require('./models/send-message.php');

header("Access-Control-Allow-Origin: *");
$data = file_get_contents('php://input');
$json = json_decode($data);
$res = new stdClass();
$content = trim($json->content);



if (!empty($content) && !empty($json->email) && !empty($json->subjectId)){


    $email = $json->email;
    $object = ($json->subjectId);


    $res = sendMessage($content,$email,$object);
}else{
    $res->sendMessage = 0;
}



echo json_encode($res);