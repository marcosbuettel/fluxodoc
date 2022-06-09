<?php
	//ARQUIVO PARA BUSCAR OS USUÁRIOS PARA PODER CONFERIR
	//OS DADOS NA HORA DO LOGIN
	include_once("modelBancoDeDados.php");

	$verificaUsuario = $pdo->prepare("SELECT * FROM usuarios");
	$verificaUsuario->execute();
	$totalUsuarios = $verificaUsuario->fetchAlL(); 
?>