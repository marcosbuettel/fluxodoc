<?php 
	
	include_once("modelBancoDeDados.php");
	include_once("../Controller/controllerCalcularIdade.php");

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


	$cadastrarLead = $pdo->prepare("INSERT INTO lead (nome_cliente_lead, data_nasc_lead, idade_lead, sexo_lead, ddd_lead, telefone_lead, cidade_lead, uf_lead, data_entrada_lead, verifica_cliente_lead, entrou_contato_tipo_lead, marcou_consulta_tipo_lead, agendou_tratamento_tipo_lead, motivo_contato_lead, agendar_lead, origem_contato_lead, origem_servico_lead, medico_lead, tipo_tratamento_lead, atendente_lead, obs_lead, data_registro_lead) VALUES ('$nomeCliente', '$nascCliente', '$idadeCliente', '$sexoCliente', '$dddCliente', '$telCliente', '$cidadeCliente', '$ufCliente', '$dataEntrada', '$opcaoCliente', '$entrouContatoTipoLead', '$marcouConsultaTipoLead', '$agendouTratamentoTipoLead', '$motivoContato', '$opcaoAgendar', '$origemContato', '$conheceuServico', '$opcaoMedico', '$opcaoTratamento', '$opcaoAtendente','$obsLead', '$date')");

	$cadastrarLead->execute();

	echo "<script>document.location='../View/viewPainelAdministrativo.php'</script>";

?>
