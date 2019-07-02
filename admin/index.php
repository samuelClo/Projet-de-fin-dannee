<?php

require './../partials/models/_toolConnection.php';

function dbConnect()
{

    try {
        return $db = new PDO('mysql:host=localhost;dbname=end_project;charset=utf8mb4', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $exception) {
        die('Erreur : ' . $exception->getMessage());
    }

}

$db = dbConnect();

if (!isset($_SESSION['user']) OR $_SESSION['user']['is_admin'] == 0) {
    header('location:./index.php');
    exit;
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Administration - Mon premier blog !</title>
    <?php require './partials/head_assets.php'; ?>
    <script src="https://cdn.tiny.cloud/1/73fwzg4mux869vskiw5xk15n2u9p0jfxyeghkox2llgdnf9n/tinymce/5/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>
</head>
<body class="index-body">
<div class="container-fluid">
    <?php require './partials/header.php'; ?>
    <div class="row my-3 index-content">

        <?php require './partials/nav.php'; ?>

        <section class="col-9">


            <?php if (isset($_GET['page'])) {

                switch ($_GET['page']) {
                    case 'user-form':
                        require('./user-form.php');
                        break;
                    case 'users-list':
                        require('./user-list.php');
                        break;
                    case 'events-list':
                        require('./events-list.php');
                        break;
                    case 'event-form':
                        require('./event-form.php');
                        break;
                    case 'message-list':
                        require('./messages-list.php');
                        break;
                    case 'bill-list':
                        require('./bill-list.php');
                        break;
                    case 'bill-form':
                        require('./bill-form.php');
                        break;
                    case 'article-form':
                        require('./article-form.php');
                        break;
                    case 'article-list':
                        require('./article-list.php');
                        break;
                    case 'faq-list':
                        require('./faq-list.php');
                        break;
                    case 'faq-form':
                        require('./faq-form.php');
                        break;

                }


            }
            ?>


        </section>
    </div>

</div>
</body>

</html>

