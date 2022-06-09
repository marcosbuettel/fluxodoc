<?php 
	
	include_once("modelBancoDeDados.php");
	include_once("../Controller/controllerCalcularIdade.php");

	$id = $_GET['id'];

	$nomeCliente = $_POST['nome-cliente'];
	$nascCliente = $_POST['nasc-cliente'];

	$idadeCliente = calcularIdade($nascCliente);


	$sexoCliente = $_POST['sexo-cliente'];
	$dddCliente = $_POST['ddd-cliente'];
	$telCliente = $_POST['tel-cliente'];

	$cidadeCliente = $_POST['cidade-cliente'];
	$ufCliente = $_POST['uf-cliente'];
	$dataEntrada = $_POST['data-entrada'];
	
	$opcaoCliente = $_POST['cliente-option'];	

	//$opcaoLead = $_POST['lead-option'];
	$entrouContatoTipoLead = $_POST['entrouContato-lead-option'];
	$marcouConsultaTipoLead = $_POST['marcouConsulta-lead-option'];
	$agendouTratamentoTipoLead = $_POST['agendouTratamento-lead-option'];

	$motivoContato = $_POST['motivo-contato'];

	$opcaoAgendar = $_POST['agendar-option'];

	$origemContato = $_POST['origem-contato'];
	$conheceuServico = $_POST['conheceu-servico'];

	$opcaoMedico = $_POST['medico-option'];

	$opcaoTratamento = $_POST['tratamento-option'];

	$opcaoAtendente = $_POST['atendente-option'];

	$obsLead = $_POST['obs-lead'];

	$date = date("Y-m-d H:i:s");  


	$editarLead = $pdo->prepare("UPDATE lead SET nome_cliente_lead = '$nomeCliente', data_nasc_lead = '$nascCliente', idade_lead = '$idadeCliente', sexo_lead = '$sexoCliente', ddd_lead = '$dddCliente', telefone_lead = '$telCliente', cidade_lead = '$cidadeCliente', uf_lead = '$ufCliente', data_entrada_lead = '$dataEntrada', verifica_cliente_lead = '$opcaoCliente', entrou_contato_tipo_lead = '$entrouContatoTipoLead', marcou_consulta_tipo_lead = '$marcouConsultaTipoLead', agendou_tratamento_tipo_lead = '$agendouTratamentoTipoLead', motivo_contato_lead = '$motivoContato', agendar_lead = '$opcaoAgendar', origem_contato_lead = '$origemContato', origem_servico_lead = '$conheceuServico', medico_lead = '$opcaoMedico', tipo_tratamento_lead = '$opcaoTratamento', atendente_lead = '$opcaoAtendente', obs_lead = '$obsLead', data_registro_lead = '$date' WHERE id_lead = '$id'");

	$editarLead->execute();

	echo "<script>document.location='../View/viewEditarLead.php?id=$id'</script>";

?>
