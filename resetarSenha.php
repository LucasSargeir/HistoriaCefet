<?php
	include("conectaBanco.php");
	include("functionImagem.php");
	$id = $_REQUEST['id'];
	$email = $_REQUEST['email'];
	if(isset($_REQUEST['senha'])){

		$senha = $_REQUEST['senha'];
		$local = "location:index.php";

	}else{

		$senha = "12345678";
		$local = "location:resetarSenhaPag.php";

	}

	$token = sha1("$email$senha");
	
	$sql = "update professor set `token`= '$token' where id_professor = $id";
	

	$resposta = mysqli_query($link, $sql);				/* Enviando a consulta para o banco de dados */
	

	if($resposta){
		header($local); //. mysql_insert_id(); se quiser mostrar o id 		/* Deu Certo */
	}
	else{
		echo mysqli_error($link);												/* Erro ao executar a consulta */
	}

	mysqli_close($link);													/* Fecha a conexão */

?>