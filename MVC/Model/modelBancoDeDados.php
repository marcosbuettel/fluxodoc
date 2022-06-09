<?php 
	//ARQUIVO QUE ACESSA O BANCO DE DADOS
	//UTILIZAR ELE TODA VEZ QUE PRECISAR ACESSAR
	//O BANCO, SEJA PARA CADASTRO, CONSULTA, EDIÇÃO OU
	//QUALQUER OUTRA SOLICITAÇÃO QUE ENVOLVA O BANCO

	try{
		$pdo = new PDO('mysql:host=localhost;dbname=fluxodoc','root','');
	}
	catch(Exception $e){
		echo 'Erro!';
	}	
?>