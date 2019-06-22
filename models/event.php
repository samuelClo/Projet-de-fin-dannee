<?php



function selectEvent($eventId)
{
    $db = dbConnect();

    $selectedEvent = $db->prepare('SELECT * FROM events WHERE is_published = 1 AND posted_at  <= NOW() AND id = ?');
    $selectedEvent->execute([
            $_GET["eventId"]
        ]
    );
    return $selectedEvent->fetch(PDO::FETCH_ASSOC);
}

