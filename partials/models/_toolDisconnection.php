<?php

$res = new stdClass();

if (isset($_SESSION) && !empty($_SESSION)){
    session_destroy();
    $res->msg = "Déconnecté";
}else{
    $res->msg = "Erreur lors de la déconnexion, vous etes deja déconnecté";
}
echo json_encode($res);