<?php
$title = "Contact";
$style = '
<link rel="stylesheet" type="text/css" href="./assets/style/contact.css">
 
';
$action = "
<script type=\"text/javascript\" src=\"./assets/js/contact.js\"></script>
";
$view = "./views/contact.php";


require('./models/contact.php');

$allSectors = getContactInfo(true);





require ('./views/layout.php');