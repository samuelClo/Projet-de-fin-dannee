<?php
$title = "Page principale";
$style = '<link rel="stylesheet" type="text/css" href="./assets/style/main-page.css">';
$action = "<script type=\"text/javascript\" src=\"./assets/js/carroussel.js\"></script>";
$view = "./views/main-page.php";
require ('./models/event-main-page.php');
$events = eventMainPage();

require ('./views/layout.php');