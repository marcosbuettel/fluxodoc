<?php 	

	function verificarTipoLead($tipo, $totalLeads){
		$contagemLeads = 0;

		for($i = 0; $i < count($totalLeads); $i++){
			if($tipo == "Entrou em contato"){
				if($totalLeads[$i]['entrou_contato_tipo_lead'] == $tipo){
					$contagemLeads++;
				}
			}else if($tipo == "Marcou consulta"){
				if($totalLeads[$i]['marcou_consulta_tipo_lead'] == $tipo){
					$contagemLeads++;
				}
			}else{
				if($totalLeads[$i]['agendou_tratamento_tipo_lead'] == $tipo){
					$contagemLeads++;
				}
			}
		}

		return $contagemLeads;
	}

?>