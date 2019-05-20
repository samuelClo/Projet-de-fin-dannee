<?php

function getEventlist($time = NULL){


    if ($time){

    }
    $db = dbConnect();
    $res = new stdClass();

    $selectedEventslist = $db->query('SELECT title,description,content,title_picture,secondary_picture FROM events WHERE is_published = 1 AND posted_at  <= NOW()');

    $eventList = $selectedEventslist->fetchAll()


    for ( $i = 0 ; $i < sizeof($eventList) ; $i++ ){

        $array[$i] = [
            "title" => $eventList[$i]['title'],
            "description" => $eventList[$i]['description'],
            "content" => $eventList[$i]['content'],
            "title_picture" =>$eventList[$i]['title_picture'],
            "secondary_picture" => $eventList[$i]['secondary_picture'],
        ];

    }

    return $res->arrayAllEvents = $array;
}