<?php
	
	$queryFiltrarMes = "SELECT * FROM lead WHERE data_entrada_lead >= '$filtrarInicio' AND data_entrada_lead <= '$filtrarFim'";

	$verificaLeads = $pdo->prepare($queryFiltrarMes);
	$verificaLeads->execute();
	$totalLeads = $verificaLeads->fetchAlL(); 
?>