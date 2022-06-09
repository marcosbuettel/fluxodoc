<?php

	if(!empty($_GET['filtro'])){
		$filtrarLeads = $_GET['filtro'];
		$verificaLeads = $pdo->prepare("SELECT * FROM lead WHERE data_entrada_lead = '$filtrarLeads' AND (entrou_contato_tipo_lead = '$tipo' OR marcou_consulta_tipo_lead = '$tipo' OR agendou_tratamento_tipo_lead = '$tipo')");
	}else if(!empty($_GET['filtroinicio']) && !empty($_GET['filtrofim'])){
		$filtrarInicio = $_GET['filtroinicio'];
		$filtrarFim = $_GET['filtrofim'];

		$queryFiltrarMes = "SELECT * FROM lead WHERE data_entrada_lead >= '$filtrarInicio' AND data_entrada_lead <= '$filtrarFim' AND (entrou_contato_tipo_lead = '$tipo' OR marcou_consulta_tipo_lead = '$tipo' OR agendou_tratamento_tipo_lead = '$tipo')";

		$verificaLeads = $pdo->prepare($queryFiltrarMes);
	}else{
		$filtrarLeads = 0;
		$verificaLeads = $pdo->prepare("SELECT * FROM lead WHERE entrou_contato_tipo_lead = '$tipo' OR marcou_consulta_tipo_lead = '$tipo' OR agendou_tratamento_tipo_lead = '$tipo'");
	}
	
	$verificaLeads->execute();
	$totalLeads = $verificaLeads->fetchAlL(); 
?>