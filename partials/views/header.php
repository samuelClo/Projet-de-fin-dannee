<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Sayme</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--- <link rel="icon" type="image/png" href="../assets/pictures/sayme.png"/>  -->


    <!--<link> rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">-->

    <link href="./assets/style/noty/noty.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./assets/style/normalize.css">
    <link rel="stylesheet" type="text/css" href="./assets/style/modal/modal.css">
    <link rel="stylesheet" href="./assets/polices/segoe-ui-4-cufonfonts-webfont/style.css">
    <link rel="stylesheet" href="./assets/polices/Raleway/raleway.css">

</head>
<body id="body">
<header>
    <a href="index.php"><img src="./assets/pictures/logo_ville.svg" alt="Logo de la ville"></a>
    <nav>
        <a href="#" id="bill">mes factures</a>
        <a href="#" id="services">services</a>
        <a href="#" id="information">informations</a>
        <a href="index.php?page=events" id="events">événements</a>
        <?php if (isset($_SESSION['user'])) : ?>
            <a href="#" class="disconnection switchConnexion">déconnexion</a>
        <?php else : ?>
            <a href="#" class="connexion switchConnexion">connexion</a>
        <?php endif; ?>
        <?php if (isset($_SESSION['user']['is_admin']) && $_SESSION['user']['is_admin'] == 1): ?>
            <a href="index.php?page=admin" >Espace admin</a>
        <?php endif; ?>


        <a href="#" id="contact">contact</a>
    </nav>
</header>