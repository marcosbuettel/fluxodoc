<?php
	//ARQUIVO PARA BUSCAR O USUÁRIO LOGADO

	$verificaUsuarioLogado = $pdo->prepare("SELECT * FROM usuarios WHERE nome_usuario = '$usuarioLogado'");
	$verificaUsuarioLogado->execute();
	$totalUsuarioLogado = $verificaUsuarioLogado->fetchAlL(); 
?>