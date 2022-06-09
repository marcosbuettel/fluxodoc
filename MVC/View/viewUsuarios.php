<?php 
	//PÁGINA PARA EXIBIR OS USUÁRIOS CADASTRADOS NO SISTEMA

	include_once("../View/viewHead.php");
	include_once("../Model/modelBancoDeDados.php");	
	include_once("../Model/modelUsuarios.php");		
?>

<?php if($_SESSION['tipo-usuario'] == 'master' || $_SESSION['tipo-usuario'] == 'adm'){?>
	
	<section class="show-info separador">
		
		<div class="show-info-header">
			<ul>		
				<li>Usuários Cadastrados</li>
				<li><a href="viewCadastrarUsuario.php"><i class="fa-solid fa-plus"></i> CADASTRAR NOVO USUÁRIO</a></li>
			</ul>
		</div><!-- FIM SHOW-INFO-HEADER -->

		<div class="show-users show-info-table profile-image">
			<table>
				<tr>
					<th style="min-width: 80px!important;"></th>
					<th>Nome</th>
					<th>Senha</th>
					<th>Email</th>
					<th>Tipo</th>
					<th style="min-width: 10px!important;width: fit-content"></th>
				</tr>

				<?php 

					for($i = 0; $i < count($totalUsuarios); $i++){

				?>		

				<tr>
					<td>
							
						<?php if($totalUsuarios[$i]['imagem_usuario'] != null){?>
							<div class="imagem-perfil-usuario-edit" style="background-image: url('<?php echo $totalUsuarios[$i]['imagem_usuario'] ?>')"></div>
						<?php }else{?>
							<img src="../../images/profile-black.png">
						<?php }?>


					</td>
					<td><?php echo $totalUsuarios[$i]['nome_usuario']?></td>

					<?php if($_SESSION['tipo-usuario'] == 'master'){ ?>
					<td><?php echo $totalUsuarios[$i]['senha_usuario']?></td>
					<?php }else{ ?>
					<td><?php echo '********'?></td>
					<?php }?>


					<td><?php echo $totalUsuarios[$i]['email_usuario']?></td>
					<td><?php echo $totalUsuarios[$i]['tipo_usuario']?></td>
					<td style="min-width: 10px!important;width: fit-content;"><a href="viewEditarUsuario.php?id=<?php echo $totalUsuarios[$i]['id_usuario'] ?>"> <i class="fa-solid fa-pen-to-square" style="margin-right: 10px"></i></a> <i onclick="confirmarExcluir(<?php echo $totalUsuarios[$i]['id_usuario']?>)" class="fa-solid fa-trash-can"></i></td>
				</tr>

				<?php }?><!-- FIM DO FOR 'i' -->

			</table>

		</div><!-- FIM SHOW-USERS -->
			
	</section><!-- FIM DO CLIENTES-BOX-WRAPPER -->	

	<script type="text/javascript">

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