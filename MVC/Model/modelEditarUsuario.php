<?php

	session_start();
	include_once("modelBancoDeDados.php");
	require '../../vendor/autoload.php';

	use Aws\S3\S3Client;
	use Aws\S3\Exception\S3Exception;	

	$bucketName = 'deploy-arpoador';
	$IAM_KEY = '****';
	$IAM_SECRET = '****';

	// Connect to AWS
	try {
		// You may need to change the region. It will say in the URL when the bucket is open
		// and on creation.
		$s3 = S3Client::factory(
			array(
				'credentials' => array(
					'key' => $IAM_KEY,
					'secret' => $IAM_SECRET
				),
				'version' => 'latest',
				'region'  => 'us-east-1'
			)
		);
	} catch (Exception $e) {
		// We use a die, so if this fails. It stops here. Typically this is a REST call so this would
		// return a json object.
		die("Error: " . $e->getMessage());
	}

	$idUsuario = $_GET['id'];	

	$nomeUsuario = $_POST['nome-usuario'];
	$senhaUsuario = $_POST['senha-usuario'];
	
	$emailUsuario = $_POST['email-usuario'];
	$tipoUsuario = $_POST['tipo-usuario'];
	$dataLocal = date("Y-m-d H:i:s"); 

	if(!empty($_FILES["fileToUpload2"]['name'])){
		
		 
		// For this, I would generate a unqiue random string for the key name. But you can do whatever.
		$keyName = 'fluxodoc/' .$dataLocal. basename($_FILES["fileToUpload2"]['name']);
		$pathInS3 = 'https://s3.us-east-1.amazonaws.com/' . $bucketName . '/' . $keyName;

		// Add it to S3
		try {
			// Uploaded:
			$file = $_FILES["fileToUpload2"]['tmp_name']; //NOME TEMP DO ARQUIVO NO SERVIDOR

			$s3->putObject(
				array(
					'Bucket'=>$bucketName,
					'Key' =>  $keyName,
					'SourceFile' => $file,
					'StorageClass' => 'REDUCED_REDUNDANCY'
				)
			);

		} catch (S3Exception $e) {
			die('Error:' . $e->getMessage());
		} catch (Exception $e) {
			die('Error:' . $e->getMessage());
		}

		$linkImg = 'https://s3.us-east-1.amazonaws.com/' . $bucketName . '/' . $keyName;		
	
		$editarUsuario = $pdo->prepare("UPDATE usuarios SET nome_usuario = '$nomeUsuario', senha_usuario = '$senhaUsuario', email_usuario = '$emailUsuario', imagem_usuario = '$linkImg', tipo_usuario = '$tipoUsuario' WHERE id_usuario = '$idUsuario'");		
	}else{
		$editarUsuario = $pdo->prepare("UPDATE usuarios SET nome_usuario = '$nomeUsuario', senha_usuario = '$senhaUsuario', email_usuario = '$emailUsuario' ,tipo_usuario = '$tipoUsuario' WHERE id_usuario = '$idUsuario'");
	}

	$editarUsuario->execute();	

	//header('Location: ../View/viewUsuarios.php');

	echo "<script>document.location='../View/viewUsuarios.php'</script>";
?>
