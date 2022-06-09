<?php 
	//PÁGINA PARA EXIBIR OS USUÁRIOS CADASTRADOS NO SISTEMA	
	
	if($_GET['tipo'] == 0){
		$tipo = "Entrou em contato";
		$tipoLead = 0;
	}else if($_GET['tipo'] == 1){
		$tipo = "Marcou consulta";
		$tipoLead = 1;
	}else{
		$tipo = "Agendou tratamento";
		$tipoLead = 2;
	}

	$pieChart = 0;
	$histogramChart	= 1;
	$scatterChart = 2;

	include_once("../View/viewHead.php");
	include_once("../Model/modelBancoDeDados.php");	
	include_once("../Model/modelLeadsInfo.php");

	include_once("../Controller/controllerFormatarData.php");
	include_once("../Controller/controllerVerificarTipoLead.php");
	include_once("../Controller/controllerGeradorDeGraficos.php");	
?>

<?php if($_SESSION['tipo-usuario'] == 'master' || $_SESSION['tipo-usuario'] == 'adm'){?>
	
	<section class="separador">

		<div class="janela-modal-grafico">
			<div class="janela-modal-grafico-header">
				<i onclick="fecharJanela()" class="fa-solid fa-xmark"></i>
			</div>
			<div style="display:none" class="janela-modal-grafico-box" id="tipo_lead_chart"></div>
			<div class="janela-modal-grafico-box"  id="sexo_chart" ></div>
			<div class="janela-modal-grafico-box"  id="idade_chart" ></div>
			<div class="janela-modal-grafico-box" id="contato_chart" ></div>
			
		</div>
		
		<div class="show-info-header">
			<ul>
				<?php if(!empty($_GET['filtro'])){?>		
					<li><?php echo $tipo; echo " - " .formatarData($_GET['filtro']) ?></li>
				<?php }else{ ?>
					<li><?php echo $tipo ?></li>
				<?php } ?>
				
				<li><a href="viewLeads.php"><i class="fa-solid fa-circle-chevron-left"></i> VOLTAR</a></li>
			</ul>
		</div><!-- FIM SHOW-INFO-HEADER -->
		
		<br><br>

		<div class="button-graph">

			<button onclick="gerarGrafico(<?php echo $pieChart ?>)" class="btn"><i class="fa-solid fa-chart-pie"></i> GERAR GRÁFICO</button>

			<button onclick="gerarGrafico(<?php echo $histogramChart ?>)" class="btn"><i class="fa-solid fa-chart-column"></i> GERAR GRÁFICO</button>

			<button onclick="gerarGrafico(<?php echo $scatterChart ?>)" class="btn"><i class="fa-solid fa-chart-line"></i> GERAR GRÁFICO</button>

		</div>

		<div class="show-users show-info-table">
			<table>
				<tr>
					<th style="min-width: 120px!important"></th>
					<th>Nome</th>
					<th>Telefone</th>
					<th>Cidade</th>
					<th>UF</th>
					<th>Data</th>
					<th>Origem Contato</th>
					<th>Conheceu serviço por</th>
					<th>Médico</th>
					<th>Tipo de tratamento</th>
					<th>Atendente</th>
				</tr>

				<?php 

					for($i = 0; $i < count($totalLeads); $i++){

				?>		

				<tr>
					<td style="min-width: 120px!important">
						<a href="viewEditarLead.php?id=<?php echo $totalLeads[$i]['id_lead'] ?>">
							<i class="fa-solid fa-pen-to-square" style="margin-right: 10px"></i>
						</a>
						<i onclick="confirmarExcluir(<?php echo $totalLeads[$i]['id_lead']?>, <?php echo $tipoLead?>, <?php echo $filtrarLeads?>)" class="fa-solid fa-trash-can"></i></td>
					<td><?php echo $totalLeads[$i]['nome_cliente_lead']?></td>
					<td><?php echo $totalLeads[$i]['ddd_lead']; echo $totalLeads[$i]['telefone_lead'] ?></td>
					<td><?php echo $totalLeads[$i]['cidade_lead']?></td>
					<td><?php echo $totalLeads[$i]['uf_lead']?></td>
					<td><?php echo formatarData($totalLeads[$i]['data_entrada_lead']) ?></td>
					<td><?php echo $totalLeads[$i]['origem_contato_lead'] ?></td>
					<td><?php echo $totalLeads[$i]['origem_servico_lead'] ?></td>
					<td><?php echo $totalLeads[$i]['medico_lead'] ?></td>
					<td><?php echo $totalLeads[$i]['tipo_tratamento_lead'] ?></td>
					<td><?php echo strtoupper($totalLeads[$i]['atendente_lead']) ?></td>
					

				</tr>

				<?php }?><!-- FIM DO FOR 'i' -->

			</table>

		</div><!-- FIM SHOW-USERS -->
			
	</section><!-- FIM DO SEPARADOR -->	
	

	<script type="text/javascript">		

		function fecharJanela(){
			$('.janela-modal-grafico').slideToggle();
		}

		function filtrarLeads(){
			var filtro = document.getElementById('filtrar-leads').value;
			//alert(document.getElementById('filtrar-leads').value);
			window.location.replace("viewLeads.php?filtro="+filtro);
		}

		function confirmarExcluir(id,tipo, lead){
			var id = id;
			var tipo = tipo;
			var lead = lead;
	        var doc; 
	        var result = confirm("Confirmar exclusão do lead?"); 
	        

	        if (result == true) { 
	            doc = "../Model/modelExcluirLead.php?id="+id+"&tipo="+tipo+"&filtro="+lead; 
	        } else { 
	            doc = "viewUsuarios.php"; 
	        } 

	        window.location.replace(doc);
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