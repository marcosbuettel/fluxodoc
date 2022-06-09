<?php 
	function formatarData($dataRecebida){
		$data = explode('-', $dataRecebida);

		return $data[2].'/'.$data[1].'/'.$data[0];
	}

?>