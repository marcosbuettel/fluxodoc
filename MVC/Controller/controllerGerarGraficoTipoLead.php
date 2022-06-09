<?php 

	$entrouContato = 0;
	$marcouConsulta = 0;
	$agendouTratamento = 0;
	
	for($i = 0; $i < count($totalLeads); $i++){
		if($totalLeads[$i]['entrou_contato_tipo_lead'] == 'Entrou em contato'){
			$entrouContato++;
		}
		if($totalLeads[$i]['marcou_consulta_tipo_lead'] == 'Marcou consulta'){
			$marcouConsulta++;
		}
		if($totalLeads[$i]['agendou_tratamento_tipo_lead'] == 'Agendou tratamento'){
			$agendouTratamento++;
		}
	}

?>

