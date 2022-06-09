<?php 
	//ARQUIVO PARA EXCLUIR O USUARIO
	
	include_once("modelBancoDeDados.php");

	$idUsuario = $_GET['id'];
	
	$excluirUsuario = $pdo->prepare("DELETE FROM usuarios WHERE id_usuario = '$idUsuario'");

	$excluirUsuario->execute();

	echo "<script>document.location='../View/viewUsuarios.php'</script>";

?>