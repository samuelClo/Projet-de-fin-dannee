<?php
if (!isset($_SESSION))
    session_start();
if (isset($_GET['page']) && $_GET['page'] == 'admin') {
    header('location:./admin/index.php');
    exit();
}
if (isset($_GET['action'])) {

    switch ($_GET['action']) {
        case 'switchConnexion':
            require('./controllers/switchConnexion.php');
            break;
    }

} else {



    if (isset($_GET['page'])) {

        switch ($_GET['page']) {
            case 'events':
                require('./controllers/events.php');
                break;
        }
    } else {
        require('./controllers/main-page.php');
    }

}











