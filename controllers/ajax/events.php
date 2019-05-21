<?php
require('./models/events.php');


header("Access-Control-Allow-Origin: *");
$data = file_get_contents('php://input');
$json = json_decode($data);


if ($json->type == 'eventDate') {
    $res = getEventlist($json->date);
} elseif ($json->type == 'allEvents') {
    $res = getEventlist();
}


echo json_encode($res);


