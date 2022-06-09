<?php 

	$id = $_GET['id'];

	include_once("../View/viewHead.php");
	include_once("../Model/modelBancoDeDados.php");	
	include_once("../Model/modelLeadsInfoPorId.php");
		
?>

<?php if($_SESSION['tipo-usuario'] == 'master' || $_SESSION['tipo-usuario'] == 'adm'){?>

	<section class="form-content separador">

		<form method="POST" action="../Model/modelEditarLead.php?id=<?php echo $id?>">

			<div class="form-content-box">

				<div>
					<label>Nome do cliente</label><br>
					<input type="text" name="nome-cliente" value="<?php echo $totalLeads[0]['nome_cliente_lead'] ?>">
				</div>

				<div>
					<label>Data de Nascimento</label><br>
					<input type="date" name="nasc-cliente" value="<?php echo $totalLeads[0]['data_nasc_lead'] ?>">
				</div>

				<div>
					<label>Sexo</label><br>
					<input <?php if($totalLeads[0]['sexo_lead'] == "masculino"){ ?>checked 
					<?php } ?>
					type="radio" name="sexo-cliente" value="masculino"><span> Masculino</span>
					
					<input <?php if($totalLeads[0]['sexo_lead'] == "feminino"){ ?>checked 
					<?php } ?>
					type="radio" style="margin-left: 10px" name="sexo-cliente" value="feminino"><span> Feminino</span>
				</div>

				<div>
					<label>Telefone</label><br>
					<div>
						<input id="inputDDD" class="input-style" type="text" name="ddd-cliente" value="<?php echo $totalLeads[0]['ddd_lead'] ?>">				
						<input id="inputTel" type="text" name="tel-cliente" value="<?php echo $totalLeads[0]['telefone_lead'] ?>">
					</div>
				</div>				

			</div>

			<div class="form-content-box">

				<div>
					<label>Cidade</label><br>
					<input type="text" name="cidade-cliente" value="<?php echo $totalLeads[0]['cidade_lead'] ?>">
				</div>

				<div>
					<label>UF</label><br>
					<input id="inputUF" class="input-style" type="text"  name="uf-cliente" value="<?php echo $totalLeads[0]['uf_lead'] ?>"> 
				</div>

				<div>
					<label>Data de entrada</label><br>
					<input type="date" name="data-entrada" value="<?php echo $totalLeads[0]['data_entrada_lead'] ?>">
				</div>
			</div>

			<div class="form-content-box select-option-wrapper">

				<label>É cliente</label>

				<div class="select-option">	

					<div class="select-option-cliente
					<?php if($totalLeads[0]['verifica_cliente_lead'] == "Sim"){
						?> 
					select-option-selected	
					<?php } ?>
					">Sim</div>

					<div class="select-option-cliente
					<?php if($totalLeads[0]['verifica_cliente_lead'] == "Não"){
						?> 
					select-option-selected	
					<?php } ?>
					">Não</div>

					<input readonly type="hidden" id="select-option-cliente" name="cliente-option" value="<?php echo $totalLeads[0]['verifica_cliente_lead']?>">
				</div>

			</div>

			<div class="form-content-box select-option-wrapper">

				<label>Leads</label>

				<div class="select-option">	

					<?php if($totalLeads[0]['entrou_contato_tipo_lead'] == "Entrou em contato"){?>

					<div class="select-entrouContato-lead" style="display: none">Entrou em contato</div>

					<div class="select-option-selected-entrouContato" style="display: block">Entrou em contato</div>

					<?php }else{ ?>

					<div class="select-entrouContato-lead">Entrou em contato</div>

					<div class="select-option-selected-entrouContato">Entrou em contato</div>

					<?php } ?>


					<?php if($totalLeads[0]['marcou_consulta_tipo_lead'] == "Marcou consulta"){?>

					<div class="select-marcouConsulta-lead" style="display: none">Marcou consulta</div>

					<div class="select-option-selected-marcouConsulta" style="display: block">Marcou consulta</div>

					<?php }else{ ?>

					<div class="select-marcouConsulta-lead">Marcou consulta</div>

					<div class="select-option-selected-marcouConsulta">Marcou consulta</div>	

					<?php } ?>


					<?php if($totalLeads[0]['agendou_tratamento_tipo_lead'] == "Agendou tratamento"){?>

					<div class="select-agendouTratamento-lead" style="display: none">Agendou tratamento</div>

					<div class="select-option-selected-agendouTratamento" style="display: block">Agendou tratamento</div>

					<?php }else{ ?>
						<div class="select-agendouTratamento-lead">Agendou tratamento</div>

						<div class="select-option-selected-agendouTratamento">Agendou tratamento</div>
					<?php }?>


					<input readonly type="hidden" id="select-entrouContato-lead" name="entrouContato-lead-option" value="<?php echo $totalLeads[0]['entrou_contato_tipo_lead']?>">

					<input readonly type="hidden" id="select-marcouConsulta-lead" name="marcouConsulta-lead-option" value="<?php echo $totalLeads[0]['marcou_consulta_tipo_lead']?>">

					<input readonly type="hidden" id="select-agendouTratamento-lead" name="agendouTratamento-lead-option" value="<?php echo $totalLeads[0]['agendou_tratamento_tipo_lead']?>">
				</div>
			</div>

			<div class="form-content-box">
				<div>

					<label>Motivo do contato</label><br>
					<select name="motivo-contato">
						<option value="vazio"></option>
						
						<option value="agendar-paciente"
						<?php if($totalLeads[0]['motivo_contato_lead'] == "agendar-paciente"){
						?> 
						selected
						<?php }?>
						>Agendar paciente</option>

						<option value="retorno"
						<?php if($totalLeads[0]['motivo_contato_lead'] == "retorno"){
						?> 
						selected
						<?php }?>
						>Retorno</option>

						<option value="reagendar"
						<?php if($totalLeads[0]['motivo_contato_lead'] == "reagendar"){
						?> 
						selected
						<?php }?>
						>Reagendar</option>

						<option value="duvida"
						<?php if($totalLeads[0]['motivo_contato_lead'] == "duvida"){
						?> 
						selected
						<?php }?>
						>Dúvida</option>

						<option value="nao-informou"
						<?php if($totalLeads[0]['motivo_contato_lead'] == "nao-informou"){
						?> 
						selected
						<?php }?>
						>Não informou</option>

					</select>

				</div>
			</div>

			<div class="form-content-box select-option-wrapper">

				<label>Agendar</label>

				<div class="select-option">	

					<div class="select-option-agendar
					<?php if($totalLeads[0]['agendar_lead'] == "Consulta"){
						?> 
					select-option-selected	
					<?php } ?>
					">Consulta</div>

					<div class="select-option-agendar
					<?php if($totalLeads[0]['agendar_lead'] == "Exame"){
						?> 
					select-option-selected	
					<?php } ?>
					">Exame</div>

					<div class="select-option-agendar
					<?php if($totalLeads[0]['agendar_lead'] == "Procedimento"){
						?> 
					select-option-selected	
					<?php } ?>
					">Procedimento</div>

					<input readonly type="hidden" id="select-option-agendar" name="agendar-option" value="<?php echo $totalLeads[0]['agendar_lead'] ?>">

					<div class="btn btn-limpar-option-agendar" onclick="limparOptionAgendar()">LIMPAR</div>
				</div>
			</div>

			<div class="form-content-box">
				<div>

					<label>Origem do contato</label><br>
					<select name="origem-contato">
						<option value="vazio"></option>

						<option value="fixo"
						<?php if($totalLeads[0]['origem_contato_lead'] == "fixo"){
						?> 
						selected
						<?php }?>
						>Fixo</option>

						<option value="whatsapp"
						<?php if($totalLeads[0]['origem_contato_lead'] == "whatsapp"){
						?> 
						selected
						<?php }?>
						>Whatsapp</option>

						<option value="email"
						<?php if($totalLeads[0]['origem_contato_lead'] == "email"){
						?> 
						selected
						<?php }?>
						>Email</option>

						<option value="recepcao"
						<?php if($totalLeads[0]['origem_contato_lead'] == "recepcao"){
						?> 
						selected
						<?php }?>
						>Recepção</option>

						<option value="webchat"
						<?php if($totalLeads[0]['origem_contato_lead'] == "webchat"){
						?> 
						selected
						<?php }?>
						>Webchat</option>

						<option value="facebook"
						<?php if($totalLeads[0]['origem_contato_lead'] == "facebook"){
						?> 
						selected
						<?php }?>
						>Facebook</option>

						<option value="instagram"
						<?php if($totalLeads[0]['origem_contato_lead'] == "instagram"){
						?> 
						selected
						<?php }?>
						>Instagram</option>

					</select>

				</div>

				<div>

					<label>Por onde o cliente conheceu nosso serviço?</label><br>
					<select name="conheceu-servico">
						<option value="vazio"></option>

						<option value="indicacao"
						<?php if($totalLeads[0]['origem_servico_lead'] == "indicacao"){
						?> 
						selected
						<?php }?>
						>Indicação</option>

						<option value="indicacao-parceiro"
						<?php if($totalLeads[0]['origem_servico_lead'] == "indicacao-parceiro"){
						?> 
						selected
						<?php }?>
						>Indicação Parceiro (Clínicas e Hospitais parceiros)</option>

						<option value="doctoraria"
						<?php if($totalLeads[0]['origem_servico_lead'] == "doctoraria"){
						?> 
						selected
						<?php }?>
						>Doctoraria</option>

						<option value="google"
						<?php if($totalLeads[0]['origem_servico_lead'] == "google"){
						?> 
						selected
						<?php }?>
						>Google</option>

						<option value="facebook"
						<?php if($totalLeads[0]['origem_servico_lead'] == "facebook"){
						?> 
						selected
						<?php }?>
						>Facebook</option>

						<option value="instagram"
						<?php if($totalLeads[0]['origem_servico_lead'] == "instagram"){
						?> 
						selected
						<?php }?>
						>Instagram</option>
						
						<option value="youtube"
						<?php if($totalLeads[0]['origem_servico_lead'] == "youtube"){
						?> 
						selected
						<?php }?>
						>Youtube</option>

						<option value="site"
						<?php if($totalLeads[0]['origem_servico_lead'] == "site"){
						?> 
						selected
						<?php }?>
						>Site</option>

						<option value="radio"
						<?php if($totalLeads[0]['origem_servico_lead'] == "radio"){
						?> 
						selected
						<?php }?>
						>Radio</option>

						<option value="tv"
						<?php if($totalLeads[0]['origem_servico_lead'] == "tv"){
						?> 
						selected
						<?php }?>
						>TV</option>

						<option value="jornal"
						<?php if($totalLeads[0]['origem_servico_lead'] == "jornal"){
						?> 
						selected
						<?php }?>
						>Jornal</option>

						<option value="revista"
						<?php if($totalLeads[0]['origem_servico_lead'] == "revista"){
						?> 
						selected
						<?php }?>
						>Revista</option>

						<option value="outdoor"
						<?php if($totalLeads[0]['origem_servico_lead'] == "outdoor"){
						?> 
						selected
						<?php }?>
						>Outdoor</option>

						<option value="panfleto"
						<?php if($totalLeads[0]['origem_servico_lead'] == "panfleto"){
						?> 
						selected
						<?php }?>
						>Panfleto</option>

					</select>

				</div>

			</div>

			<div class="form-content-box select-option-wrapper">

				<label>Médico</label>

				<div class="select-option">	

					<div class="select-option-medico
					<?php if($totalLeads[0]['medico_lead'] == "Dra Mônica"){
						?> 
					select-option-selected	
					<?php } ?>
					">Dra Mônica</div>

					<div class="select-option-medico
					<?php if($totalLeads[0]['medico_lead'] == "Dr Flávio"){
						?> 
					select-option-selected	
					<?php } ?>
					">Dr Flávio</div>

					<input readonly type="hidden" id="select-option-medico" name="medico-option" value="<?php echo $totalLeads[0]['medico_lead']?>">
				</div>
			</div>

			<div class="form-content-box select-option-wrapper">
				<label>Tipo de tratamento</label>

				<div class="select-option">					
					<div class="select-option-tratamento
					<?php if($totalLeads[0]['tipo_tratamento_lead'] == "Vascular"){
						?> 
					select-option-selected	
					<?php } ?>
					">Vascular</div>

					<div class="select-option-tratamento
					<?php if($totalLeads[0]['tipo_tratamento_lead'] == "Cardio"){
						?> 
					select-option-selected	
					<?php } ?>
					">Cardio</div>

					<input readonly type="hidden" id="select-option-tratamento" name="tratamento-option" value="<?php echo $totalLeads[0]['tipo_tratamento_lead'] ?>">
				</div>
			</div>

			<div class="form-content-box select-option-wrapper">
				<label>Quem atendeu?</label>

				<div class="select-option">			

					<?php 
						
						$verificaUsuarios = $pdo->prepare("SELECT * FROM usuarios");
						$verificaUsuarios->execute();
						$totalUsuarios = $verificaUsuarios->fetchAlL(); 

						for($j = 0; $j < count($totalUsuarios); $j++){ 
							if($totalUsuarios[$j]['tipo_usuario'] == 'adm'){	
					?>	

					<div class="select-option-atendente
					<?php if(strtoupper($totalUsuarios[$j]['nome_usuario']) == $totalLeads[0]['atendente_lead']){
						?> 
					select-option-selected	
					<?php } ?>
					"><?php echo strtoupper($totalUsuarios[$j]['nome_usuario']) ?></div>

					<?php } } ?>		

					<input readonly type="hidden" id="select-option-atendente" name="atendente-option" value="<?php echo $totalLeads[0]['atendente_lead']?>">
				</div>
			</div>

			<label>Observações:</label>
			<textarea name="obs-lead"><?php echo $totalLeads[0]['obs_lead']?></textarea>

			<button class="btn">Editar</button>

		</form><!-- FIM DO FORM CADASTRO DE USUÁRIOS -->

	</section><!-- FIM DO FORM CONTENT -->

	<script type="text/javascript">
		$('.select-option-cliente').on('click', function() {
			$('.select-option-cliente').removeClass('select-option-selected');
			$(this).addClass("select-option-selected");
			$('#select-option-cliente').val($(this).text());
		});


		/****************************************************/
		//OPÇÃO DOS LEADS NESSA PARTE

		$('.select-entrouContato-lead').on('click', function() {
			$(this).css('display', 'none');
			$('#select-entrouContato-lead').val($(this).text());
			$('.select-option-selected-entrouContato').slideToggle();
		});

		$('.select-option-selected-entrouContato').on('click', function() {
			$(this).css('display', 'none');
			$('#select-entrouContato-lead').val('');
			$('.select-entrouContato-lead').slideToggle();
		});


		$('.select-marcouConsulta-lead').on('click', function() {
			$(this).css('display', 'none');
			$('#select-marcouConsulta-lead').val($(this).text());
			$('.select-option-selected-marcouConsulta').slideToggle();
		});

		$('.select-option-selected-marcouConsulta').on('click', function() {
			$(this).css('display', 'none');
			$('#select-marcouConsulta-lead').val('');
			$('.select-marcouConsulta-lead').slideToggle();
		});


		$('.select-agendouTratamento-lead').on('click', function() {
			$(this).css('display', 'none');
			$('#select-agendouTratamento-lead').val($(this).text());
			$('.select-option-selected-agendouTratamento').slideToggle();
		});

		$('.select-option-selected-agendouTratamento').on('click', function() {
			$(this).css('display', 'none');
			$('#select-agendouTratamento-lead').val('');
			$('.select-agendouTratamento-lead').slideToggle();
		});

		/****************************************************/


		$('.select-option-agendar').on('click', function() {
			$('.select-option-agendar').removeClass('select-option-selected');
			$(this).addClass("select-option-selected");
			$('#select-option-agendar').val($(this).text());
			$('.btn-limpar-option-agendar').css('display', 'block');
		});

		function limparOptionAgendar(){
			$('.select-option-agendar').removeClass('select-option-selected');
			$('#select-option-agendar').val('');
			$('.btn-limpar-option-agendar').css('display', 'none');
		}

		$('.select-option-medico').on('click', function() {
			$('.select-option-medico').removeClass('select-option-selected');
			$(this).addClass("select-option-selected");
			$('#select-option-medico').val($(this).text());
		});

		$('.select-option-tratamento').on('click', function() {
			$('.select-option-tratamento').removeClass('select-option-selected');
			$(this).addClass("select-option-selected");
			$('#select-option-tratamento').val($(this).text());
		});

		$('.select-option-atendente').on('click', function() {
			$('.select-option-atendente').removeClass('select-option-selected');
			$(this).addClass("select-option-selected");
			$('#select-option-atendente').val($(this).text());
		});


		$("#inputUF").inputmask({
		  mask: "aa"
		});

		$("#inputDDD").inputmask({
		  mask: "(99)"
		});

		$("#inputTel").inputmask({
		  mask: "999999999"
		});
	</script>

<?php }else{?>
<div class="separador">
	<h2>Desculpe, página não encontrada.</h2>
</div>
<?php }?><!-- FIM DO IF DO TIPO DE USUARIO LOGADO -->

<?php 
	include_once("../View/viewFooter.php");	
?>