<?php
require('./models/bills.php');
if (isset($_SESSION['user']['id']))
$bill = getBill($_SESSION['user']['id']);




echo(json_encode($bill)) ;