<?php
	//ARQUIVO PARA FAZER O LOGOUT DO SISTEMA E LIMPAR AS SESSÕES
	
	include("../Model/modelBancoDeDados.php");
	
	session_start();
	$logout = $_SESSION['login'];
	$idUsuarioLogado = $_SESSION['id-usuario-logado'];
	
	$_SESSION['login'] = array();

	$atualizarStatus = $pdo->prepare("UPDATE usuarios SET logado_usuario = '0' WHERE id_usuario = '$idUsuarioLogado'");

	$atualizarStatus->execute();
	
	//header("Location: ../../index.php");
	echo "<script>document.location='../../index.php'</script>";
	exit();
?>