<?php 

	$base = 0;
	$indicacao = 0;
	$indicacaoParceiro= 0;
	$doctoraria = 0;
	$google = 0;
	$facebook = 0;
	$instagram = 0;
	$youtube = 0;
	$site = 0;
	$radio = 0;
	$tv = 0;
	$jornal = 0;
	$revista = 0;
	$outdoor = 0;
	$panfleto = 0;
	
	for($i = 0; $i < count($totalLeads); $i++){
		if($totalLeads[$i]['origem_servico_lead'] == 'base'){
			$base++;
		}else if($totalLeads[$i]['origem_servico_lead'] == 'indicacao'){
			$indicacao++;
		}else if($totalLeads[$i]['origem_servico_lead'] == 'indicacao-parceiro'){
			$indicacaoParceiro++;
		}else if($totalLeads[$i]['origem_servico_lead'] == 'doctoraria'){
			$doctoraria++;
		}else if($totalLeads[$i]['origem_servico_lead'] == 'google'){
			$google++;
		}else if($totalLeads[$i]['origem_servico_lead'] == 'facebook'){
			$facebook++;
		}else if($totalLeads[$i]['origem_servico_lead'] == 'instagram'){
			$instagram++;
		}else if($totalLeads[$i]['origem_servico_lead'] == 'youtube'){
			$youtube++;
		}else if($totalLeads[$i]['origem_servico_lead'] == 'site'){
			$site++;
		}else if($totalLeads[$i]['origem_servico_lead'] == 'radio'){
			$radio++;
		}else if($totalLeads[$i]['origem_servico_lead'] == 'tv'){
			$tv++;
		}else if($totalLeads[$i]['origem_servico_lead'] == 'jornal'){
			$jornal++;
		}else if($totalLeads[$i]['origem_servico_lead'] == 'revista'){
			$revista++;
		}else if($totalLeads[$i]['origem_servico_lead'] == 'outdoor'){
			$outdoor++;
		}else if($totalLeads[$i]['origem_servico_lead'] == 'panfleto'){
			$panfleto++;
		}

	}


?>

