﻿<?php
	//nombre d'enregistrements de la table user
$nbEvents = $db->query("SELECT COUNT(*) FROM events ")->fetchColumn();
$nbUsers = $db->query("SELECT COUNT(*) FROM user ")->fetchColumn();
$nbMessages = $db->query("SELECT COUNT(*) FROM message")->fetchColumn();
$nbBills = $db->query("SELECT COUNT(*) FROM bills")->fetchColumn();

?>
<nav class="col-3 py-2 categories-nav">
	<a class="d-block btn btn-warning mb-4 mt-2" href="./index.php">Site</a>
	<ul>
		<li><a href="./index.php?page=events-list">Gestion des Events (<?= $nbEvents; ?>)</a></li>
        <li><a href="./index.php?page=users-list">Gestion des Users (<?= $nbUsers; ?>)</a></li>
        <li><a href="./index.php?page=message-list">Gestion des Messages (<?= $nbMessages; ?>)</a></li>
        <li><a href="./index.php?page=bill-list">Gestion des Factures (<?= $nbBills; ?>)</a></li>
	</ul>
</nav>
