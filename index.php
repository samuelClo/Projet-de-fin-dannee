
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Sayme</title>
    <?php require './partials/views/head-assets.php'; ?>
</head>
<body id="body">
<header>
    <img src="./assets/pictures/logo_ville.svg" alt="Logo de la ville">
    <nav>
        <a href="#" id="bill">mes factures</a>
        <a href="#" id="services">services</a>
        <a href="#" id="information">informations</a>
        <a href="#" id="event">événement</a>
        <a href="#" id="connexion">connexion</a>
        <a href="#" id="contact">contact</a>
    </nav>
</header>


<?php

if (isset($_GET['page'])) {

    switch ($_GET['page']) {
        case 'article-list':
            require('./controllers/article-list.php');
            break;
    }

} else {
    require('./controllers/main-page.php');
} ?>

<?php require './partials/views/foot-assets.php'; ?>

<footer>
    <div class="contentInfoFooter">
        <img src="./assets/pictures/logo_ville.svg" alt="Logo de la ville">
        <div class="logoFooter">
            <a href="http://www.rt78.fr/" target="_blank">
                <img src="./assets/pictures/rambouille-territoires.jpg" alt="Logo de rambouillet-territoire">
            </a>

            <a href="https://www.yvelines.fr/" target="_blank">
                <img src="./assets/pictures/yvelines-conseil-général.jpg" alt="Logo de yvelines conseil général">
            </a>
        </div>
        <div class="textFooter">

            21 bis route de l'Etang de la Tour
            78125 VIEILLE-EGLISE-EN-YVELINES <br>
            Tél. : 01.30.41.16.13 <br>
            adresse e-mail : vieilleglise.yvelines@wanadoo.fr

        </div>
    </div>
    <div class="mapContainer">
        <div class="separatorFooter"></div>

        <a id="itineraire"
           href="https://maps.google.com/maps?ll=48.669545,1.875931&z=12&t=m&hl=fr&gl=FR&mapclient=embed&daddr=Vieille-%C3%89glise-en-Yvelines@48.67022,1.875431">
            <i class="fas fa-route"></i>
            <div>Itinéraires</div>

        </a>

        <div id="map" style="width:91%;height:400px;left: 0">

        </div>
    </div>


    <!-- AIzaSyBQanKZKLf5wnBK8zkZCpaOvdiX1GP1Je0 -->


</footer>
</body>


