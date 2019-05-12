﻿<?php
	//nombre d'enregistrements de la table user
$nbEvents = $db->query("SELECT COUNT(*) FROM events ")->fetchColumn();
$nbUsers = $db->query("SELECT COUNT(*) FROM user ")->fetchColumn();

?>
<nav class="col-3 py-2 categories-nav">
	<a class="d-block btn btn-warning mb-4 mt-2" href="./index.php">Site</a>
	<ul>
		<li><a href="./index.php?page=users hp">Gestion des Events (<?= $nbEvents; ?>)</a></li>
        <li><a href="./index.php?page=users-list">Gestion des Users (<?= $nbUsers; ?>)</a></li>
	</ul>
</nav>
