<?php 

	$entre18e24 = 0;
	$entre25e34 = 0;
	$entre35e44 = 0;
	$entre45e54 = 0;
	$entre55e64 = 0;
	$mais65 = 0;
	
	for($i = 0; $i < count($totalLeads); $i++){
		if($totalLeads[$i]['idade_lead'] <= 24){
			$entre18e24++;
		}else if($totalLeads[$i]['idade_lead'] <= 34){
			$entre25e34++;
		}else if($totalLeads[$i]['idade_lead'] <= 44){
			$entre35e44++;
		}else if($totalLeads[$i]['idade_lead'] <= 54){
			$entre45e54++;
		}else if($totalLeads[$i]['idade_lead'] <= 64){
			$entre55e64++;
		}else if($totalLeads[$i]['idade_lead'] > 64){
			$mais65++;
		}
	}


?>

