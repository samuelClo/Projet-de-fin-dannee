<?php

require('./models/contact.php');

$test = getContactInfo(null,$_GET['sector_id']);


echo(json_encode($test)) ;

