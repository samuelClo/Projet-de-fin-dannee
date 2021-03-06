<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo  $title ?></title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--- <link rel="icon" type="image/png" href="../assets/pictures/sayme.png"/>  -->


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


    <link href="./assets/style/noty/noty.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./assets/style/normalize.css">
    <link rel="stylesheet" href="./assets/polices/segoe-ui-4-cufonfonts-webfont/style.css">

    <?php echo $style ?>

</head>
<body id="body">



<header data-size = "desktop">
    <a href="index.php"><img src="./assets/pictures/logo_ville.svg" alt="Logo de la ville"></a>
    <nav>
        <a href="index.php?page=services" id="services">services</a>
        <a href="index.php?page=contact" id="contact">contact</a>
        <a href="index.php?page=events" id="events">événements</a>
        <?php if (isset($_SESSION['user'])) : ?>
            <a href="index.php?page=bills" id="bill">mes factures</a>
            <a href="#" class="disconnection switchConnexion">déconnexion</a>
        <?php else : ?>
            <a href="#" class="connexion switchConnexion">connexion</a>
        <?php endif; ?>
        <?php if (isset($_SESSION['user']['is_admin']) && $_SESSION['user']['is_admin'] == 1): ?>
            <a href="index.php?page=admin" >Espace admin</a>
        <?php endif; ?>
    </nav>
</header>

<header data-size = "smartphone">
    <nav>
        <i id="burger" class="fas fa-bars"></i>
    </nav>
</header>

<div class="navSmartphone" data-size = "smartphone" >
    <span><i class="fas fa-times"></i></span>
    <nav>
        <a href="index.php?page=services" id="services">services</a>
        <a href="index.php?page=contact" id="contact">contact</a>
        <a href="index.php?page=events" id="events">événements</a>
        <?php if (isset($_SESSION['user'])) : ?>
            <a href="index.php?page=bills" id="bill">mes factures</a>
            <a href="#" class="disconnection switchConnexion">déconnexion</a>
        <?php else : ?>
            <a href="#" class="connexion switchConnexion">connexion</a>
        <?php endif; ?>
        <?php if (isset($_SESSION['user']['is_admin']) && $_SESSION['user']['is_admin'] == 1): ?>
            <a href="index.php?page=admin" >Espace admin</a>
        <?php endif; ?>
    </nav>
</div>