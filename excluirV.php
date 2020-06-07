<?php
	include("conectaBanco.php");
	
	$id = $_REQUEST['id'];

	$sql = "delete from video where id_video ='$id'";

	$resposta = mysqli_query($link, $sql);				/* Enviando a consulta para o banco de dados */

	if($resposta){
		header("location: professor.php"); //. mysql_insert_id(); se quiser mostrar o id 		/* Deu Certo */
	}
	else{
		echo mysqli_error($link);												/* Erro ao executar a consulta */
	}

	mysqli_close($link);													/* Fecha a conexão */

?>