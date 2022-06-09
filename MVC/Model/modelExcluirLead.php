<?php 
	
	include_once("modelBancoDeDados.php");

	$idLead = $_GET['id'];
	$tipo = $_GET['tipo'];
	$filtrarLeads = $_GET['filtro'];

	$verificaLeads = $pdo->prepare("SELECT * FROM lead WHERE id_lead = '$idLead'");
	$verificaLeads->execute();
	$totalLeads = $verificaLeads->fetchAlL(); 

	$filtro = $totalLeads[0]['data_entrada_lead'];
	
	$excluirLead = $pdo->prepare("DELETE FROM lead WHERE id_lead = '$idLead'");
	$excluirLead->execute();

	if($filtrarLeads != 0){
		echo "<script>document.location='../View/viewLeadsInfo.php?tipo=$tipo&filtro=$filtro'</script>";
	}else{
		echo "<script>document.location='../View/viewLeadsInfo.php?tipo=$tipo&filtro='</script>";
	}

?>