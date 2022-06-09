<?php 

	include_once("../View/viewHead.php");
	include_once("../Model/modelBancoDeDados.php");	
	include_once("../Model/modelUsuarios.php");	
?>

<?php if($_SESSION['tipo-usuario'] == 'master' || $_SESSION['tipo-usuario'] == 'adm'){?>

	<section class="form-content separador">

		<form method="POST" action="../Model/modelCadastroLead.php">

			<div class="form-content-box">

				<div>
					<label>Nome do cliente</label><br>
					<input type="text" name="nome-cliente">
				</div>

				<div>
					<label>Data de Nascimento</label><br>
					<input type="date" name="nasc-cliente">
				</div>

				<div>
					<label>Sexo</label><br>
					<input type="radio" name="sexo-cliente" value="masculino"><span> Masculino</span>
					<input type="radio" style="margin-left: 10px" name="sexo-cliente" value="feminino"><span> Feminino</span>
				</div>

				<div>
					<label>Telefone</label><br>
					<div>
						<input id="inputDDD" class="input-style" type="text" name="ddd-cliente">				
						<input id="inputTel" type="text" name="tel-cliente">
					</div>
				</div>				

			</div>

			<div class="form-content-box">

				<div>
					<label>Cidade</label><br>
					<input type="text" name="cidade-cliente">
				</div>

				<div>
					<label>UF</label><br>
					<input id="inputUF" class="input-style" type="text"  name="uf-cliente"> 
				</div>

				<div>
					<label>Data de entrada</label><br>
					<input type="date" name="data-entrada">
				</div>
			</div>

			<div class="form-content-box select-option-wrapper">

				<label>É cliente</label>

				<div class="select-option">	

					<div class="select-option-cliente">Sim</div>

					<div class="select-option-cliente">Não</div>

					<input readonly type="hidden" id="select-option-cliente" name="cliente-option">
				</div>

			</div>

			<div class="form-content-box select-option-wrapper">

				<label>Leads</label>

				<div class="select-option">	

					<div class="select-entrouContato-lead">Entrou em contato</div>

					<div class="select-option-selected-entrouContato">Entrou em contato</div>


					<div class="select-marcouConsulta-lead">Marcou consulta</div>

					<div class="select-option-selected-marcouConsulta">Marcou consulta</div>


					<div class="select-agendouTratamento-lead">Agendou tratamento</div>

					<div class="select-option-selected-agendouTratamento">Agendou tratamento</div>

					<input readonly type="hidden" id="select-entrouContato-lead" name="entrouContato-lead-option">

					<input readonly type="hidden" id="select-marcouConsulta-lead" name="marcouConsulta-lead-option">

					<input readonly type="hidden" id="select-agendouTratamento-lead" name="agendouTratamento-lead-option">
				</div>
			</div>

			<div class="form-content-box">
				<div>

					<label>Motivo do contato</label><br>
					<select name="motivo-contato">
						<option value="vazio"></option>
						<option value="agendar-paciente">Agendar paciente</option>
						<option value="retorno">Retorno</option>
						<option value="reagendar">Reagendar</option>
						<option value="duvida">Dúvida</option>
						<option value="nao-informou">Não informou</option>
					</select>

				</div>
			</div>

			<div class="form-content-box select-option-wrapper">

				<label>Agendar</label>

				<div class="select-option">	

					<div class="select-option-agendar">Consulta</div>

					<div class="select-option-agendar">Exame</div>

					<div class="select-option-agendar">Procedimento</div>

					<input readonly type="hidden" id="select-option-agendar" name="agendar-option">

					<div class="btn btn-limpar-option-agendar" onclick="limparOptionAgendar()">LIMPAR</div>
				</div>
			</div>

			<div class="form-content-box">
				<div>

					<label>Origem do contato</label><br>
					<select name="origem-contato">
						<option value="vazio"></option>
						<option value="fixo">Fixo</option>
						<option value="whatsapp">Whatsapp</option>
						<option value="email">Email</option>
						<option value="recepcao">Recepção</option>
						<option value="webchat">Webchat</option>
						<option value="facebook">Facebook</option>
						<option value="instagram">Instagram</option>
					</select>

				</div>

				<div>

					<label>Por onde o cliente conheceu nosso serviço?</label><br>
					<select name="conheceu-servico">
						<option value="vazio"></option>
						<option value="indicacao">Indicação</option>
						<option value="indicacao-parceiro">Indicação Parceiro (Clínicas e Hospitais parceiros)</option>
						<option value="doctoraria">Doctoraria</option>
						<option value="google">Google</option>
						<option value="facebook">Facebook</option>
						<option value="instagram">Instagram</option>
						<option value="youtube">Youtube</option>
						<option value="site">Site</option>
						<option value="radio">Radio</option>
						<option value="tv">TV</option>
						<option value="jornal">Jornal</option>
						<option value="revista">Revista</option>
						<option value="outdoor">Outdoor</option>
						<option value="panfleto">Panfleto</option>
					</select>

				</div>

			</div>

			<div class="form-content-box select-option-wrapper">

				<label>Médico</label>

				<div class="select-option">	

					<div class="select-option-medico">Dra Mônica</div>

					<div class="select-option-medico">Dr Flávio</div>

					<input readonly type="hidden" id="select-option-medico" name="medico-option">
				</div>
			</div>

			<div class="form-content-box select-option-wrapper">
				<label>Tipo de tratamento</label>

				<div class="select-option">					
					<div class="select-option-tratamento">Vascular</div>

					<div class="select-option-tratamento">Cardio</div>

					<input readonly type="hidden" id="select-option-tratamento" name="tratamento-option">
				</div>
			</div>

			<div class="form-content-box select-option-wrapper">
				<label>Quem atendeu?</label>

				<div class="select-option">			

					<?php 
						for($i = 0; $i < count($totalUsuarios); $i++){ 
							if($totalUsuarios[$i]['tipo_usuario'] == 'adm'){	
					?>	

					<div class="select-option-atendente"><?php echo strtoupper($totalUsuarios[$i]['nome_usuario']) ?></div>

					<?php } } ?>		

					<input readonly type="hidden" id="select-option-atendente" name="atendente-option">
				</div>
			</div>

			<label>Observações:</label>
			<textarea name="obs-lead"></textarea>

			<button class="btn">Cadastrar Atendimento</button>

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



		/*$('.select-entrouContato-lead').on('click', function() {
			$('.select-entrouContato-lead').removeClass('select-option-selected');
			$(this).addClass("select-option-selected");
			$('#select-entrouContato-lead').val($(this).text());
		});

		$('.select-marcouConsulta-lead').on('click', function() {
			$('.select-marcouConsulta-lead').removeClass('select-option-selected');
			$(this).addClass("select-option-selected");
			$('#select-marcouConsulta-lead').val($(this).text());
		});

		$('.select-agendouTratamento-lead').on('click', function() {
			$('.select-agendouTratamento-lead').removeClass('select-option-selected');
			$(this).addClass("select-option-selected");
			$('#select-agendouTratamento-lead').val($(this).text());
		});*/

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