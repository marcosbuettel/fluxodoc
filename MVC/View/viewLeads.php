<?php 
	//PÁGINA PARA EXIBIR OS USUÁRIOS CADASTRADOS NO SISTEMA	
	

	include_once("../View/viewHead.php");
	include_once("../Model/modelBancoDeDados.php");	
	include_once("../Controller/controllerVerificarTipoLead.php");		

	if(!empty($_GET['filtro'])){
		$filtrarLeads = $_GET['filtro'];	
		include("../Model/modelLeadsFiltrado.php");
	}else if(!empty($_GET['filtroinicio']) && !empty($_GET['filtrofim'])){
		$filtrarInicio = $_GET['filtroinicio'];
		$filtrarFim = $_GET['filtrofim'];
		include("../Model/modelLeadsFiltradoMes.php");
	}else{
		$filtrarLeads = 0;
		$filtrarInicio = 0;
		$filtrarFim = 0;
		include("../Model/modelLeads.php");
	}

	$entrouContatoTipo = 0;
	$marcouConsultaTipo = 1;
	$agendouTratamentoTipo = 2;

	$pieChart = 0;
	$histogramChart	= 1;
	$scatterChart = 2;

	include_once("../Controller/controllerGeradorDeGraficos.php");
?>

<?php if($_SESSION['tipo-usuario'] == 'master' || $_SESSION['tipo-usuario'] == 'adm'){?>
	
	<section class="separador">

		<div class="janela-modal-grafico">
			
			<div class="janela-modal-grafico-header">
				<i onclick="fecharJanela()" class="fa-solid fa-xmark"></i>
			</div>

			<div class="janela-modal-grafico-box" id="tipo_lead_chart"></div>
			<div style="display: none" class="janela-modal-grafico-box"  id="sexo_chart" ></div>
			<div style="display: none" class="janela-modal-grafico-box"  id="idade_chart" ></div>
			<div style="display: none" class="janela-modal-grafico-box" id="contato_chart" ></div>
		</div>
		
		<div class="show-info-header">
			<ul>		
				<li>Leads Cadastrados</li>
				<li><a href="viewCadastrarLead.php"><i class="fa-solid fa-plus"></i> CADASTRAR NOVO LEAD</a></li>
			</ul>
		</div><!-- FIM SHOW-INFO-HEADER -->
		
		<br>

		<div class="button-graph">

			<button onclick="gerarGrafico(<?php echo $pieChart ?>)" class="btn"><i class="fa-solid fa-chart-pie"></i> GERAR GRÁFICO</button>

			<button onclick="gerarGrafico(<?php echo $histogramChart ?>)" class="btn"><i class="fa-solid fa-chart-column"></i> GERAR GRÁFICO</button>

			<button onclick="gerarGrafico(<?php echo $scatterChart ?>)" class="btn"><i class="fa-solid fa-chart-line"></i> GERAR GRÁFICO</button>

			<form method="POST">
				<input style="font-size: 20px" value="<?php echo $filtrarLeads ?>" id="filtrar-leads" type="date" onchange="filtrarLeads()">

				<?php if(!empty($_GET['filtro'])){ ?>
					<a class="btn" href="viewLeads.php"><i class="fa-solid fa-broom"></i> LIMPAR</a>
				<?php } ?>
			</form>

		</div>

		<br>

		<div class="relatorio-mensal-wrapper">
			<button style="background-color: #cc6411" class="btn" onclick="mostrarFiltroMes()"><i class="fa-solid fa-file-lines"></i> RELATÓRIO MENSAL</button>

			<div class="form-relatorio-mensal">
				<div>
					<label>De</label><br>
					<input value="<?php echo $filtrarInicio ?>" style="font-size: 20px"  id="filtrar-inicio" type="date">
				</div>

				<div>
					<label>Até</label><br>
					<input value="<?php echo $filtrarFim ?>" style="font-size: 20px"  id="filtrar-fim" type="date">
				</div>

				<button onclick="filtroMes()" class="btn">FILTRAR</button>

				<a class="btn" href="viewLeads.php"> LIMPAR</a>
			</div>
		</div>

		<br>

		
		
		<div onclick="goLeadsInfo(<?php echo $entrouContatoTipo ?>)" class="lead-box lead-box-1">
			<h4>Entrou em contato</h4>
			<div class="lead-box-info">
				<h2><?php echo verificarTipoLead("Entrou em contato", $totalLeads) ?></h2>
				<p>LEADS</p>
			</div>
		</div><!-- FIM LEAD-BOX -->	

		<div onclick="goLeadsInfo(<?php echo $marcouConsultaTipo ?>)" class="lead-box lead-box-2">
			<h4>Marcou consulta</h4>
			<div class="lead-box-info">
				<h2><?php echo verificarTipoLead("Marcou consulta", $totalLeads) ?></h2>
				<p>PACIE...</p>
			</div>
		</div><!-- FIM LEAD-BOX -->	

		<div onclick="goLeadsInfo(<?php echo $agendouTratamentoTipo ?>)" class="lead-box lead-box-3">
			<h4>Agendou tratamento</h4>
			<div class="lead-box-info">
				<h2><?php echo verificarTipoLead("Agendou tratamento", $totalLeads) ?></h2>
				<p>PACIE...</p>
			</div>
		</div><!-- FIM LEAD-BOX -->	

	</section><!-- FIM DO CLIENTES-BOX-WRAPPER -->	

	

	<script type="text/javascript">
		
		function fecharJanela(){
			$('.janela-modal-grafico').slideToggle();
		}

		function filtrarLeads(){
			var filtro = document.getElementById('filtrar-leads').value;
			//alert(document.getElementById('filtrar-leads').value);
			window.location.replace("viewLeads.php?filtro="+filtro);
		}

		function mostrarFiltroMes(){			
			$('.form-relatorio-mensal').css('display', 'flex');
			//var filtro = document.getElementById('filtrar-leads').value;
			//alert(document.getElementById('filtrar-leads').value);
			//window.location.replace("viewLeads.php?filtromes="+"06");
		}

		function filtroMes(){
			var filtroInicio = document.getElementById('filtrar-inicio').value;
			var filtroFim = document.getElementById('filtrar-fim').value;
			window.location.replace("viewLeads.php?filtroinicio="+filtroInicio+"&filtrofim="+filtroFim);
		}

		function goLeadsInfo(tipo){
			var filtro = document.getElementById('filtrar-leads').value;
			var filtroInicio = document.getElementById('filtrar-inicio').value;
			var filtroFim = document.getElementById('filtrar-fim').value;

			if(filtroInicio != 0 && filtroFim != 0){
				window.location.replace('../View/viewLeadsInfo.php?tipo='+tipo+'&filtroinicio='+filtroInicio+"&filtrofim="+filtroFim);	
			}else{
				window.location.replace('../View/viewLeadsInfo.php?tipo='+tipo+'&filtro='+filtro);
			}
			
		}

		function confirmarExcluir(idUsuario){
			var idUsuario = idUsuario;
	        var doc; 
	        var result = confirm("Confirmar exclusão do usuário?"); 

	        if (result == true) { 
	            doc = "../Model/modelExcluirUsuario.php?id="+idUsuario; 
	        } else { 
	            doc = "viewUsuarios.php"; 
	        } 

	        window.location.replace(doc);
		}

		function exibeFuncao(funcao, id){
			if(funcao == 'view'){
				$('#view'+id).css('display', 'block');
			}else if(funcao == 'arquivar'){
				$('#arquivar'+id).css('display', 'block');
			}else if(funcao == 'editar'){
				$('#editar'+id).css('display', 'block');
			}else{
				$('#excluir'+id).css('display', 'block');
			}	
		}

	</script>

<?php }else{?>
<div class="separador">
	<h2>Desculpe, página não encontrada.</h2>
</div>
<?php }?><!-- FIM DO IF DO TIPO DE USUARIO LOGADO -->

<?php 
	include_once("../View/viewFooter.php");	
?>