<?php
	//ARQUIVO PARA BUSCAR TODOS OS USUÁRIOS
	
	if(!empty($_GET['id'])){
		$id = $_GET['id'];
		$verificaUsuarios = $pdo->prepare("SELECT * FROM usuarios WHERE id_usuario = '$id'");
	}else{
		$verificaUsuarios = $pdo->prepare("SELECT * FROM usuarios");
	}

	
	$verificaUsuarios->execute();
	$totalUsuarios = $verificaUsuarios->fetchAlL(); 
?>