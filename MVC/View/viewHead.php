<?php 
	//PÁGINA ONDE TEM TODAS AS INFORMAÇÕES DO CABEÇALHO DE CA
	//PÁGINA DO SISTEMA
	//QUALQUER ALTERAÇÃO NO CABEÇALHO, DEVE SER FEITA AQUI,
	//POIS IRÁ SER ALTERADO EM TODAS AS PÁGINAS

	session_start();

	$idUsuarioLogado = $_SESSION['id-usuario-logado'];
	
	include_once("../Model/modelBancoDeDados.php");
	include_once("../Controller/controllerFormatarData.php");

	//SE UM USUARIO QUE NÃO FEZ O LOGIN TENTAR ENTRAR DIRETAMENTE
	//NESSA PÁGINA, ESSA CONDIÇÃO IRÁ RETORNAR ELE PARA A TELA
	//DE LOGIN
	if(empty($_SESSION['login'])){
		echo "<script>document.location = '../../index.php'</script>";
	}	
?>

<!DOCTYPE html>

<html lang="pt-BR">

	<head>
		<title>Fluxodoc</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="../../js/main.js"></script>	
		<link href="../../css/fontawesome.min.css" rel="stylesheet">
		<link href="../../css/all.css" rel="stylesheet">
		<link href="../../css/style-pa.css" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
 		<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
 		<script src="https://rawgit.com/RobinHerbots/Inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
 		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	</head>

	<body>		

		<header>

			<!-- DIV QUE CONTEM A BARRA SUPERIOR, ONDE FICA O SINO
				COM AS NOTIFICAÇÕES -->
			<div class="nav-superior">	

				<img src="../../images/logo-branca.png">

				<div class="img-sino">
					<div style="position: relative;top: 10px; display: flex">
						<span>OLÁ <?php echo strtoupper($_SESSION['login'])?></span>
						<?php if($_SESSION['imagem-usuario'] != null){?>
							<div class="imagem-perfil-usuario-nav" style="background-image: url('<?php echo $_SESSION['imagem-usuario']?>')"></div>
							
						<?php }else{?>
							<img style="border-radius: 50%; position: relative; top: -10px; left: 5px" src="../../images/profile.png">
						<?php }?>
					</div>
					
				</div>

			</div>			

			<!-- DIV DA BARRA (MENU) LATERAL -->
			<div class="nav-left">	
				<div class="ico-menu">			
					<i style="color: white;" class="fas fa-bars"></i>
				</div>
				
				<!--<h2>Painel Administrativo</h2>--><br><br><br>
				
				<a href="viewPainelAdministrativo.php"><i class="fas fa-house-user"></i>Início</a><br><br>

				<?php if($_SESSION['tipo-usuario'] == 'master'){?>
					<a href="viewUsuarios.php"><i class="fas fa-user"></i>Usuários Cadastrados</a><br><br>
				<?php } ?>

				<?php if($_SESSION['tipo-usuario'] == 'master'){?>
					<!--<a href="viewFormularios.php"><i class="fab fa-wpforms"></i>Controle de Formulários</a><br><br>-->
				<?php } ?>

				<?php if($_SESSION['tipo-usuario'] == 'adm' or $_SESSION['tipo-usuario'] == 'master'){?>
					<a href="viewLeads.php"><i class="fas fa-clipboard-list"></i>Consultar Lead</a><br><br>
				<?php }else{?>
					<a href="viewLeads.php"><i class="fas fa-clipboard-list"></i>Consultar Lead</a><br><br>
				<?php }?>


				<?php if($_SESSION['tipo-usuario'] == 'adm' or $_SESSION['tipo-usuario'] == 'master'){?>
					<a href="viewCadastrarLead.php"><i class="fas fa-clipboard-check"></i>Cadastrar Lead</a><br><br>
				<?php }else{?>
					<a href="viewCadastrarLead.php"><i class="fas fa-clipboard-check"></i>Cadastrar Lead</a><br><br>
				<?php }?>

				

				<a href="../Controller/controllerLogout.php"><i class="fas fa-door-open"></i>Sair</a>
			</div>

			<!-- DIV DA BARRA (MENU) LATERAL -->
			<div class="nav-left-mini">	
				<div class="ico-menu-mini">			
					<i style="color: white" class="fas fa-bars" onmouseover="exibeInfoMenu('abrir-menu')"></i>
					<div class="info-ico-menu" id="abrir-menu">ABRIR MENU</div>
				</div>

				<br><br><br>
				<a href="viewPainelAdministrativo.php">
					<i class="fas fa-house-user" onmouseover="exibeInfoMenu('inicio')"></i>
					<div class="info-ico-menu" id="inicio">INÍCIO</div>
				</a><br><br>

				<?php if($_SESSION['tipo-usuario'] == 'master'){?>
					<a href="viewUsuarios.php">
						<i class="fas fa-user" onmouseover="exibeInfoMenu('usuarios')"></i>
						<div class="info-ico-menu" id="usuarios">USUÁRIOS</div>
					</a><br><br>
				<?php } ?>

				<?php if($_SESSION['tipo-usuario'] == 'master'){?>
					<!--<a href="viewFormularios.php"><i class="fab fa-wpforms"></i>Controle de Formulários</a><br><br>-->
				<?php } ?>

				<?php if($_SESSION['tipo-usuario'] == 'adm' or $_SESSION['tipo-usuario'] == 'master'){?>
					<a href="viewLeads.php">
						<i class='fas fa-clipboard-list' onmouseover="exibeInfoMenu('leads')"></i>
						<div class="info-ico-menu" id="leads">LEADS</div>
					</a><br><br>
				<?php }else{?>
					<a href="viewLeads.php">
						<i class='fas fa-clipboard-list' onmouseover="exibeInfoMenu('leads')"></i>
						<div class="info-ico-menu" id="leads">LEADS</div>
					</a><br><br>
				<?php }?>	

				

				<?php if($_SESSION['tipo-usuario'] == 'adm' or $_SESSION['tipo-usuario'] == 'master'){?>
					<a href="viewCadastrarLead.php">
				<?php }else{?>
					<a href="viewCadastrarLead.php">
				<?php }?>
						<i class="fas fa-clipboard-check" onmouseover="exibeInfoMenu('cadastrar')"></i>
						<div class="info-ico-menu" id="cadastrar">CADASTRAR</div>
					</a><br><br>
				


				<a href="../Controller/controllerLogout.php">
					<i class="fas fa-door-open" onmouseover="exibeInfoMenu('sair')"></i>
					<div class="info-ico-menu" id="sair">SAIR</div>
				</a>
			</div>
			
			<!-- DIV DA BARRA (MENU) LATERAL PARA O MOBILE -->
			<div class="nav-left-mobile">
				<div class="sub-header-mobile">
					<!--<img src="../../images/logoiSeven2.png">
					<h2>Painel Administrativo</h2>
					<p>OLÁ <?php echo strtoupper($_SESSION['login'])?>!</p><br><br>-->
					<i class="fas fa-bars" id="icone-menu"></i>
				</div>

				<div class="menu-mobile">
					<a href="viewPainelAdministrativo.php"><i class="fas fa-house-user"></i>Início</a><br><br>

					<?php if($_SESSION['tipo-usuario'] == 'master'){?>
						<a href="viewUsuarios.php"><i class="fas fa-user"></i>Usuários Cadastrados</a><br><br>
					<?php } ?>

					<?php if($_SESSION['tipo-usuario'] == 'master'){?>
						<!--<a href="viewFormularios.php"><i class="fab fa-wpforms"></i>Controle de Formulários</a><br><br>-->
					<?php } ?>

					<?php if($_SESSION['tipo-usuario'] == 'adm' or $_SESSION['tipo-usuario'] == 'master'){?>
						<a href="viewProjetos.php"><i class="fas fa-clipboard-list"></i>Visualizar Projetos</a><br><br>
					<?php }else{?>
						<a href="viewProjetosPorUsuario.php"><i class="fas fa-clipboard-list"></i>Visualizar Projetos</a><br><br>
					<?php }?>

					<!--<?php if($_SESSION['tipo-usuario'] == 'adm' or $_SESSION['tipo-usuario'] == 'master'){?>
						<a href="viewProjetos.php"><i class="fas fa-paste"></i>Gerenciar Projetos</a><br><br>
					<?php }else{?>
						<a href="viewProjetosPorCliente.php"><i class="fas fa-paste"></i>Projetos</a><br><br>
					<?php }?>-->


					<?php if($_SESSION['tipo-usuario'] == 'adm' or $_SESSION['tipo-usuario'] == 'master'){?>
						<a href="viewProjetosFiltrados.php?filtro=6"><i class="fas fa-clipboard-check"></i>Projetos Aprovados</a><br><br>
					<?php }else{?>
						<a href="viewProjetosFiltradosPorUsuario.php?filtro=6"><i class="fas fa-clipboard-check"></i>Projetos Aprovados</a><br><br>
					<?php }?>

					<?php if($_SESSION['tipo-usuario'] == 'adm' or $_SESSION['tipo-usuario'] == 'master'){?>
						<a href="viewProjetosFiltrados.php?filtro=7"><i class="fas fa-running"></i>Projetos em Andamento</a><br><br>
					<?php }else{?>
						<a href="viewProjetosFiltradosPorUsuario.php?filtro=7"><i class="fas fa-running"></i>Projetos em Andamento</a><br><br>
					<?php }?>

					<?php if($_SESSION['tipo-usuario'] == 'adm' or $_SESSION['tipo-usuario'] == 'master'){?>
						<a href="viewProjetosFiltrados.php?filtro=8"><i class="fas fa-file-excel"></i>Projetos com Pendências</a><br><br>
					<?php }else{?>
						<a href="viewProjetosFiltradosPorUsuario.php?filtro=8"><i class="fas fa-file-excel"></i>Projetos com Pendências</a><br><br>
					<?php }?>

					<?php if($_SESSION['tipo-usuario'] == 'leitor'){?>
						<a href="viewAnexos.php"><i class="fas fa-file-excel"></i>Ver Anexos</a><br><br>
					<?php }?>

					<a href="../Controller/controllerLogout.php"><i class="fas fa-door-open"></i>Sair</a>
				</div>
			</div>

		</header><!-- FIM DO HEADER -->

		<script>

			$( ".ico-menu-mini" ).click(function() {
				$('.nav-left-mini').css('display', 'none');
				$( ".nav-left" ).animate({
			    width: "toggle"
			  }, 500, function() {
			  	$('.separador').css('width', '70%'); 
				$('.separador').css('margin-left', '300px'); 
				
			  });
			});

			$( ".ico-menu" ).click(function() {
				$('.nav-left-mini').css('display', 'block');
				$( ".nav-left" ).animate({
			    width: "toggle"
			  }, 500, function() {
			  	$('.separador').css('width', '90%'); 
				$('.separador').css('margin-left', '100px'); 
				
			  });
			});

			function exibeInfoMenu(icone){
				$('#'+icone).css('display', 'block');
			}

			$('.nav-left-mini i').mouseleave(function(){
				$('.info-ico-menu').css('display', 'none');
			});

			function marcarNotificacao(id){
				document.location = '../Model/modelDesativarNotificacao.php?id='+id;
			}

			
		</script>	