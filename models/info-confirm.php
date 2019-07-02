<?php
$query = $db->prepare('UPDATE user SET is_confirm = ? WHERE id = ?');
$result = $query->execute(
    [
        1,
        $_SESSION['user']['id']
    ]
);

$res = new stdClass();
$res->msg = "Vos informations on bien été confirmé";
echo json_encode($res);
