<?php

	$verificaLeads = $pdo->prepare("SELECT * FROM lead WHERE data_entrada_lead = '$filtrarLeads'");
	$verificaLeads->execute();
	$totalLeads = $verificaLeads->fetchAlL(); 
?>