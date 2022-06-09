<?php 
	include_once("body/head.php");
	include_once("MVC/Model/modelBancoDeDados.php");
	include_once("MVC/Model/modelLogin.php");
	
	//CONDIÇÃO PARA VERIFICAR SE O USUÁRIO JÁ ESTAVA 
	//LOGADO NO SISTEMA
	//SE TIVER LOGADO, NÃO VAI PRECISAR FAZER LOGIN NOVAMENTE
	if(empty($_SESSION['login'])){
		
	}else{
		$usuarioLogado = $_SESSION['login'];
		
		include_once("MVC/Model/modelVerificaUsuarioLogado.php");

		if($totalUsuarioLogado[0]['status_usuario'] == 1){
			echo "<script>document.location='MVC/View/viewPainelAdministrativo.php'</script>";
		}
	}
	
?>

<section class="login-sistema">

	<!--<img src="images/logoiSeven3.png">-->

	<div class="login-sistema-box">
		<img src="images/fluxodoc.png">
		<br><br>
		<form method="POST">
			<div class="input">
				<!--<i style="margin-right: 15px;color: #085AC3" class="fas fa-user"></i>-->
				<input type="text" name="login" required placeholder="Nome de usuário"><br>
			</div>
			<div class="input">
				<!--<i style="margin-right: 15px; color: #085AC3" class="fas fa-lock"></i>-->
				<input type="password" name="senha" required placeholder="Senha">
			</div>
			<br>
			<div class="botao-login">
				<button>LOGAR</button>
			</div>
			<br>
			<div class="dados-incorretos">
			<?php 
				include_once("MVC/Controller/controllerLogin.php");
			?>
			</div>
		</form>
	</div>

	

</section><!-- FIM DO FILTROS-WRAPPER -->

<?php include_once("body/footer.php");?>