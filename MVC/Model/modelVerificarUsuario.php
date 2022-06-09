<?php
	//ARQUIVO PARA BUSCAR O USUARIO SOLICITADO

	$verificaUsuarioEscolhido = $pdo->prepare("SELECT * FROM usuarios WHERE id_usuario = '$idUsuarioEscolhido'");
	$verificaUsuarioEscolhido->execute();
	$totalUsuarioEscolhido = $verificaUsuarioEscolhido->fetchAlL(); 
?>