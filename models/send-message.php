<?php
function sendMessage($content, $email, $object)
{
    $res = new stdClass();
    $db = dbConnect();
//    $checksubjectId = $db->prepare('SELECT id FROM subject WHERE id = ?');
//
//    $checksubjectId->execute([
//        $subjectId
//    ]);

//    if ($checksubjectId->fetchColumn()) {


        $query = $db->prepare('INSERT INTO message (content,email,object) VALUE (?,?,?)');
        $newMessage = $query->execute([
            $content,
            $email,
            $object
        ]);
        if ($newMessage) {
//            $selectMessage = $db->query('SELECT m.content,m.email,t.name
//             FROM message m JOIN subject t
//             ON  m.subject_id = t.id
//             WHERE m.id ='.$db->lastInsertId());
//            $messageSelected = $selectMessage->fetch();
            mail('minecraft.cloarec@hotmail.fr', $object, $content);
            $res->sendMessage = 1;
        } else {
            $res->sendMessage = 0;
        }
//    } else {
//        $res->sendMessage = 0;
//    }
    return $res;
}
