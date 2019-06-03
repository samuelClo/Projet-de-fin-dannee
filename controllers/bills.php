<?php
$title = "Mes factures";
$style = '
<link rel="stylesheet" type="text/css" href="./assets/style/bills.css">
';
$action = "
<script type=\"text/javascript\" src=\"./assets/js/bills.js\"></script>
";
$view = "./views/bills.php";

require('./models/bills.php');

require ('./views/layout.php');
