<?php

if (isset($_GET['connect']))
    require ('./models/connexion.php');
if (isset($_GET['disconnection']))
    require ('./partials/models/_toolDisconnection.php');