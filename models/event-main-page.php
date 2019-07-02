<?php
function eventMainPage()
{
    $db = dbConnect();

    $selectedEvent = $db->query('SELECT * FROM events WHERE is_published = 1 AND posted_at  <= NOW() ORDER BY posted_at DESC  LIMIT 5');

    return $selectedEvent->fetchAll(PDO::FETCH_ASSOC);
}

