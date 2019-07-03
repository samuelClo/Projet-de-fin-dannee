<?php

require './partials/models/_toolConnection.php';

if (isset($_GET['page']) &&  $_GET['page'] == 'admin' && $_SESSION['user']['is_admin'] == 1) {
    header('location:./admin/index.php');
    exit();
}
function dbConnect(){

    try{
        return $db = new PDO('mysql:host=localhost;dbname=end_project;charset=utf8mb4', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $exception)
    {
        die( 'Erreur : ' . $exception->getMessage() );
    }

}
$db = dbConnect();


if (isset($_GET['action'])) {

    switch ($_GET['action']) {
        case 'switchConnexion':
            require('./controllers/ajax/switchConnexion.php');
            break;
        case 'eventList':
            require('./controllers/ajax/events.php');
            break;
        case 'contact':
            require ('./controllers/ajax/contact.php');
            break;
        case 'send-message':
            require ('./controllers/ajax/send-message.php');
            break;
        case 'bill':
            require ('./controllers/ajax/bills.php');
            break;
        case 'infoConfirm':
            require ('./models/info-confirm.php');
            break;
    }

} else{
    if (isset($_GET['page'])) {

        switch ($_GET['page']) {
            case 'events':
                require('./controllers/events.php');
                break;
            case 'event':
                require('./controllers/event.php');
                break;
            case 'contact':
                require('./controllers/contact.php');
                break;
            case 'bills':
                require ('./controllers/bills.php');
                break;
            case 'services':
                require ('./controllers/services.php');
                break;
            case 'faq':
                require ('./controllers/faq.php');
                break;
            case 'legal-mention':
                require ('./controllers/legal-mention.php');
                break;
            default :
                require ('./views/404.html');
                break;

        }

    } else {
        require('./controllers/main-page.php');
    }

}











