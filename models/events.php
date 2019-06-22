<?php

function getEventlist($time = NULL, $selectAll = NULL)
{
    $db = dbConnect();
    $res = new stdClass();
    $array = [];


    $queryString = 'SELECT * FROM events WHERE is_published = 1 AND posted_at  <= NOW()';
    $queryParameters = [];

    if ($selectAll) {
        $queryString = 'SELECT * FROM events';
    }

    if ($time) {
        $queryString .= 'AND posted_at = ?';
        $queryParameters[] = $time;
    }

    $selectedEventslist = $db->prepare($queryString);
    $selectedEventslist->execute($queryParameters);

    $eventList = $selectedEventslist->fetchAll();

    for ($i = 0; $i < sizeof($eventList); $i++) {

        $array[$i] = [
            "id" => $eventList[$i]['id'],
            "title" => $eventList[$i]['title'],
            "description" => $eventList[$i]['description'],
            "content" => $eventList[$i]['content'],
            "title_picture" => $eventList[$i]['title_picture'],
            "secondary_picture" => $eventList[$i]['secondary_picture'],
        ];

    }


    return $res->arrayAllEvents = $array;
}