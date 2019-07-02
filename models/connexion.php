<?php
require "./partials/models/_toolConnection.php";
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

        $userConnected = $checkConnexion->fetch(PDO::FETCH_ASSOC);

        if (!empty($userConnected)) {

            $user = new stdClass();

            $user = $userConnected;

            $_SESSION['user']['id'] = $userConnected['id'];
            $_SESSION['user']['email'] = $userConnected['email'];
            $_SESSION['user']['is_admin'] = $userConnected['is_admin'];
            $res->msg = "Vous etes connécté";
            $res->is_admin = $_SESSION['user']['is_admin'];

            $res->user = $user;


            $res->email = $_SESSION['user']['email'];

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






