<?php
require_once('./models/event.php');

$event = selectEvent($_GET["eventId"]);

$title = "Evénement";
$style = '
<link rel="stylesheet" type="text/css" href="./assets/style/event.css">';
$action = "";
$view = "./views/event.php";
require ('./views/layout.php');
