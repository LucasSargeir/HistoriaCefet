<?php
	include("conectaBanco.php");
	session_start();
	if (isset($_SESSION["usuario"])){
		$nome = $_REQUEST['nome'];
		$resumo = $_REQUEST['resumo'];
		$id = $_REQUEST['id'];
		$materia = $_REQUEST['materia'];

		$sql = "update texto set nome='$nome',resumo='$resumo',idM='$materia' where id_texto='$id'";

		$resposta = mysqli_query($link, $sql);				/* Enviando a consulta para o banco de dados */

		if($resposta){
			header("location: professor.php"); //. mysql_insert_id(); se quiser mostrar o id 		/* Deu Certo */

		}
		else{
			echo mysqli_error($link);												/* Erro ao executar a consulta */
		}

		mysqli_close($link);													/* Fecha a conexão */
	}
	else{
		echo"ERROR";
	}

?>
