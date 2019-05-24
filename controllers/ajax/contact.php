<?php

//header("Access-Control-Allow-Origin: *");
//$data = file_get_contents('php://input');
//$json = json_decode($data);

require('./models/contact.php');

$test = getContactInfo(null,$_GET['sector_id']);
var_dump($test);

//echo(json_encode() ;

