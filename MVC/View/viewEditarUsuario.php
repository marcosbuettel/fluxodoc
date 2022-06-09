<?php 

	include_once("../View/viewHead.php");
	include_once("../Model/modelBancoDeDados.php");	
	include_once("../Model/modelUsuarios.php");
?>

<?php if($_SESSION['tipo-usuario'] == 'master' || $_SESSION['tipo-usuario'] == 'adm'){?>

	<section class="form-content separador">

		<form method="POST" action="../Model/modelEditarUsuario.php?id=<?php echo $totalUsuarios[0]['id_usuario']?>" enctype="multipart/form-data">

			<div class="form-content-box">

				<div>
					<label>Login</label><br>
					<input type="text" name="nome-usuario" value="<?php echo $totalUsuarios[0]['nome_usuario']?>">
				</div>

				<div>
					<label>Senha</label><br>
					<input type="password" name="senha-usuario" value="<?php echo $totalUsuarios[0]['senha_usuario']?>">
				</div>		

			</div>


			<div class="form-content-box">

				<div>
					<label>Email do Usuário</label><br>
					<input type="email" name="email-usuario" value="<?php echo $totalUsuarios[0]['email_usuario']?>">
				</div>
			</div>

			<div class="form-content-box">
				<div>
					<label>Tipo</label><br>
					<select name="tipo-usuario">
						
						<option value="master"
						<?php if($totalUsuarios[0]['tipo_usuario'] == "master"){
						?> 
						selected
						<?php }?>
						>Master</option>

						<option value="adm"
						<?php if($totalUsuarios[0]['tipo_usuario'] == "adm"){
						?> 
						selected
						<?php }?>
						>Adm</option>

					</select>
				</div>	
				
			</div>

			<div class="form-content-box profile-image">
				<div>
					<label>Foto de perfil:</label><br>					
					<input type="file" name="fileToUpload2" id="fileToUpload2">		
				</div>

				<?php if($totalUsuarios[0]['imagem_usuario'] != null){?>
					<div class="imagem-perfil-usuario-edit" style="background-image: url('<?php echo $totalUsuarios[0]['imagem_usuario'] ?>')"></div>
				<?php }else{?>
					<img src="../../images/profile-black.png">
				<?php }?>
			</div>

			<button class="btn">Editar Usuário</button>

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