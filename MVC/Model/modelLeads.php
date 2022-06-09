<?php

	$verificaLeads = $pdo->prepare("SELECT * FROM lead");
	$verificaLeads->execute();
	$totalLeads = $verificaLeads->fetchAlL(); 
?>