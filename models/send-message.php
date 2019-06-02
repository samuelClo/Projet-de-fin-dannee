<?php
function sendMessage($content, $email, $testId)
{
    $db = dbConnect();
    var_dump($testId);
    $checkTestId = $db->prepare('SELECT id FROM test WHERE id = ?');
    $uojip = $checkTestId->execute([
        $testId
        ]);


    if ( $checkTestId->fetchColumn()){
        $query = $db->prepare('INSERT INTO message (content,email,test_id) VALUE (?,?,?)');
        $newMessage = $query->execute([
            $content,
            $email,
            $testId
        ]);
    }
}


//$query = $db->prepare('INSERT INTO user (password, email, is_admin) VALUES (?, ?, ?)');
//$newUser = $query->execute([
//    hash('md5', $_POST['password']),
//    htmlspecialchars($_POST['email']),
//    $_POST['is_admin'],
//]);