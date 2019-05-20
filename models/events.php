<?php



function getEventlist(){
    $db = dbConnect();
    $selectedEventslist = $db->query('SELECT title,description,content,title_picture,secondary_picture FROM events WHERE is_published = 1 AND posted_at  <= NOW()');
    return $selectedEventslist->fetchAll();
}