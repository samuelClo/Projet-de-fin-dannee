<?php
$title = "F.A.Q";
$style = '<link rel="stylesheet" type="text/css" href="./assets/style/faq.css">';
$action = "<script type=\"text/javascript\" src=\"./assets/js/faq.js\"></script>";
$view = "./views/faq.php";

require ('./models/faq.php');
$faqList = getFaqList();


require ('./views/layout.php');