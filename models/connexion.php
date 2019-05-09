<?php
require "./../partials/models/_toolConnection.php";

header("Access-Control-Allow-Origin: *");
$data = file_get_contents('php://input');
$json = json_decode($data);
$res = new stdClass();

$email = $json->{'email'};
$password = $json->{'password'};

if (!empty($data)) {
    if (!empty($email) && !empty($password)) {

        $checkConnexion = $db->prepare('SELECT * FROM user WHERE password = ? AND  email = ?');

        $checkConnexion->execute(
            array(
                md5($password),
                $email
            ));

        $userConnected = $checkConnexion->fetch();

        if (!empty($userConnected)) {
            $_SESSION['user'] = $userConnected['id'];
            $_SESSION['user'] = $userConnected['email'];
            $res->userConnect = "yes";
        } else {
            $res->msg = "Aucun compte n'est assigné a ces identifiants";
        }
    } else {
        $res->msg = "Veuillez rentrez tous les champs";
    }

} else {
    $res->msg = "Problème lors de l'enregistrement";
}

echo json_encode($res);






