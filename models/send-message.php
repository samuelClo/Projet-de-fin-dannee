<?php
function sendMessage($content, $email, $object)
{
    $res = new stdClass();
    $db = dbConnect();


        $query = $db->prepare('INSERT INTO message (content,email,object) VALUE (?,?,?)');
        $newMessage = $query->execute([
            $content,
            $email,
            $object
        ]);
        if ($newMessage) {
            mail('minecraft.cloarec@hotmail.fr', $object, $content);
            $res->sendMessage = 1;
        } else {
            $res->sendMessage = 0;
        }
    return $res;
}
