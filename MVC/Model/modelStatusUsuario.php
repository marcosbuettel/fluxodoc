<?php 
	//ARQUIVO PARA VERIFICAR O STATUS DO USUARIO (SE ESTÁ LOGADO OU NÃO)
	//PARA ELE NÃO PRECISAR FAZER O LOGIN NOVAMENTE CASO SAIA DO SISTEMA
	//SEM FAZER LOGOUT
	//SE ELE FECHAR O BROWSER POR COMPLETO, A SESSÃO SERÁ ENCERRADA
	//E PRECISARÁ FAZER LOGIN NOVAMENTE

	include_once("modelBancoDeDados.php");

	$atualizarStatus = $pdo->prepare("UPDATE usuarios SET status_usuario = '1' WHERE id_usuario = '$idUsuarioLogado'");

	$atualizarStatus->execute();

	//header('Location: ../View/viewPaginaCalendario.php?id='.$idCalendario);

	//echo "<script>document.location='../View/viewPaginaCalendario.php?id='.$idCalendario.</script>";
?>