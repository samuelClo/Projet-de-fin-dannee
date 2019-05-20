<?php
require ('./models/events.php');


header("Access-Control-Allow-Origin: *");
$data = file_get_contents('php://input');
$json = json_decode($data);

var_dump($data);

$res = new stdClass();

if ($data->type == 'eventDate') {
    $dataTime = substr($data->date, 0, -14);
    getEvents($dataTime);
} elseif ($data->type == 'allEvents') {
    getEvents();
}











$eventList = getEventlist();

$res = new stdClass();
for ( $i = 0 ; $i < sizeof($eventList) ; $i++ ){

    $array[$i] = [
        "title" => $eventList[$i]['title'],
        "description" => $eventList[$i]['description'],
        "content" => $eventList[$i]['content'],
        "title_picture" =>$eventList[$i]['title_picture'],
        "secondary_picture" => $eventList[$i]['secondary_picture'],
    ];

}

$res->arrayAllEvents = $array;

echo json_encode($res);

