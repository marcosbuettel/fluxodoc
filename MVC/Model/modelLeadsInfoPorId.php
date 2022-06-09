<?php
	
	$verificaLeads = $pdo->prepare("SELECT * FROM lead WHERE id_lead = '$id'");	
	$verificaLeads->execute();
	$totalLeads = $verificaLeads->fetchAlL(); 
?>