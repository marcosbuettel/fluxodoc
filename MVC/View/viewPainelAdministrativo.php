<?php
	//PÁGINA INICIAL DO SISTEMA. DEPOIS DO LOGIN VEM PRA CA 
	include_once("../View/viewHead.php");
	include_once("../Model/modelBancoDeDados.php");

	$nomeCliente = $_SESSION['nome-cliente'];
?>

<!-- DEPENDENDO DO TIPO DO USUARIO, SERÁ DIFERENTE 
	A VISÃO DESSA PÁGINA-->
<?php if($_SESSION['tipo-usuario'] == 'adm' or $_SESSION['tipo-usuario'] == 'master'){?>

	<section class="dashboard-wrapper separador">

		<a href="viewUsuarios.php">
			<div class="dashboard-box" style="background-color: #0a579f">
				<i class="fa-solid fa-user-group"></i>
				<p>Usuários</p>
			</div>
		</a>

		<a href="viewLeads.php">
			<div class="dashboard-box" style="background-color: #5f9e97">
				<i class="fa-solid fa-magnifying-glass"></i>
				<p>Consultar Lead</p>
			</div>
		</a>

		<a href="viewCadastrarLead.php">
			<div class="dashboard-box" style="background-color: #cc6411">
				<i class="fa-solid fa-circle-plus"></i>
				<p>Cadastrar Lead</p>
			</div>
		</a>


	</section><!-- FIM DO CLIENTES-BOX-WRAPPER -->


<?php }?>

<script type="text/javascript">
		
	
</script>

<?php 
	include_once("../View/viewFooter.php");	
?>