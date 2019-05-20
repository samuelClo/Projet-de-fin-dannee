<?php
$title = "Evénement";
$style = '
<link rel="stylesheet" type="text/css" href="./assets/style/events.css">
<link rel="stylesheet" type="text/css" href="./assets/style/date-picker/cuppa-datepicker-styles.css">
';
$action = "
<script type=\"text/javascript\" src=\"./assets/js/date-picker/cuppa-calendar.js\"></script>
<script type=\"text/javascript\" src=\"./assets/js/date-picker/moment.js\"></script>
<script type=\"text/javascript\" src=\"./assets/js/date-picker/popper.min.js\"></script>
<script type=\"text/javascript\" src=\"./assets/js/events.js\"></script>
";
$view = "./views/events.php";
require ('./views/layout.php');
