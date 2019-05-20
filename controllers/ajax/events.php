<?php
require('./models/events.php');


header("Access-Control-Allow-Origin: *");
$data = file_get_contents('php://input');
$json = json_decode($data);


if ($json->type == 'eventDate') {
    $dataTime = substr($json->date, 0, -14);
    $res = getEventlist($dataTime);
} elseif ($json->type == 'allEvents') {
    $res = getEventlist();
}


echo json_encode($res);


