<?php 

	include_once("../View/viewHead.php");
	include_once("../Model/modelBancoDeDados.php");	
	include_once("../Model/modelUsuarios.php");
?>

<?php if($_SESSION['tipo-usuario'] == 'master'){?>

	<section class="form-content separador">

		<form method="POST" action="../Model/modelCadastroUsuario.php" enctype="multipart/form-data">

			<div class="form-content-box">

				<div>
					<label>Login</label><br>
					<input type="text" name="nome-usuario">
				</div>

				<div>
					<label>Senha</label><br>
					<input type="password" name="senha-usuario">
				</div>		

			</div>


			<div class="form-content-box">

				<div>
					<label>Email do Usuário</label><br>
					<input type="email" name="email-usuario">
				</div>
			</div>

			<div class="form-content-box">
				<div>
					<label>Tipo</label><br>
					<select name="tipo-usuario">
						<option value="master">Master</option>
						<option value="adm">Adm</option>
					</select>
				</div>	
				
			</div>

			<div class="form-content-box profile-image">
				<div>
					<label>Foto de perfil:</label><br>					
					<input type="file" name="fileToUpload2" id="fileToUpload2">		
				</div>
				<img src="../../images/profile-black.png">
			</div>

			<button class="btn">Cadastrar Usuário</button>

		</form><!-- FIM DO FORM CADASTRO DE USUÁRIOS -->

	</section><!-- FIM DO FORM CONTENT -->

	<script type="text/javascript">


		
	</script>

<?php }else{?>
<div class="separador">
	<h2>Desculpe, página não encontrada.</h2>
</div>
<?php }?><!-- FIM DO IF DO TIPO DE USUARIO LOGADO -->

<?php 
	include_once("../View/viewFooter.php");	
?>