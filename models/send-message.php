<?php
function sendMessage($content, $email, $testId)
{
    $res = new stdClass();
    $db = dbConnect();
    $checkTestId = $db->prepare('SELECT id FROM test WHERE id = ?');

    $checkTestId->execute([
        $testId
    ]);

    if ($checkTestId->fetchColumn()) {
        $query = $db->prepare('INSERT INTO message (content,email,test_id) VALUE (?,?,?)');
        $newMessage = $query->execute([
            $content,
            $email,
            $testId
        ]);
        if ($newMessage) {

            $selectMessage = $db->query('SELECT m.content,m.email,t.name 
             FROM message m JOIN test t 
             ON  m.test_id = t.id 
             WHERE m.id ='.$db->lastInsertId());
            $messageSelected = $selectMessage->fetch();

           // mail('minecraft.cloarec@hotmail.fr', $messageSelected['name'], $messageSelected['content']);
            $res->sendMessage = 1;

        } else {
            $res->sendMessage = 0;
        }
    } else {
        $res->sendMessage = 0;
    }
    return $res;
}
