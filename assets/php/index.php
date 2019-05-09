<?php
session_start();
header("Access-Control-Allow-Origin: *");
$data = file_get_contents('php://input');
$json = json_decode($data);


$email = $json->{'email'};
$password = $json->{'password'};



$res = new stdClass();
if (!empty($data)) {
    if (!empty($email) && !empty($password)) {
        try {
            $db = new PDO('mysql:host=localhost;dbname=ajaxbase;charset=utf8', 'root', '',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $exception) {
            die('Erreur : ' . $exception->getMessage());
        }
        $checkConnexion = $db->prepare('SELECT user_id FROM user WHERE password = ? AND  email = ?');
        $checkConnexion->execute(
            array(
                md5($password . $email),
                $email
            ));
        $userConnected = $checkConnexion->fetch();
        if (!empty($userConnected)) {
            if ($_SESSION['user']['id'] == $userConnected['user_id']){
                $res->msg = " Vous êtes déjà connecté  ";
            }else{
                $_SESSION['user']['id'] = $userConnected['user_id'];
                $res->userConnect = "userConnect";
            }
        } else {
            $res->msg = "Aucun compte n'est assigné a ces identifiants";
        }

    }
} else {
    $res->msg = "Problème lors de la connexion";
}

echo json_encode($res);
