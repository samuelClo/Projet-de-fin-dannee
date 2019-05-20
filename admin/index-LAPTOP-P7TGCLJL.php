<?php
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['user']) OR $_SESSION['user']['is_admin'] == 0) {
    header('location:./index.php');
    exit;
}
require './../partials/models/_toolConnection.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Administration - Mon premier blog !</title>
    <?php require './partials/head_assets.php'; ?>
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
                        require ('./events-list.php');
                        break;
                    case 'event-form':
                        require ('./event-form.php');
                        break;

                }


            }
            ?>


        </section>
    </div>

</div>
</body>
</html>

