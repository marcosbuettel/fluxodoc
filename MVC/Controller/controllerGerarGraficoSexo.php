<?php 

	$masculino = 0;
	$feminino = 0;
	
	for($i = 0; $i < count($totalLeads); $i++){
		if($totalLeads[$i]['sexo_lead'] == "masculino"){
			$masculino++;
		}else{
			$feminino++;
		}
	}


?>

