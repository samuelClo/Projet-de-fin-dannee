<?php
require('./models/bills.php');

$bill = getBill($_SESSION['user']['id']);




echo(json_encode($bill)) ;