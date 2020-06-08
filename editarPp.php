<?php
	include("conectaBanco.php");
	session_start();
	if (isset($_SESSION["usuario"])){
		$id= $_SESSION["usuario"];
		$nome = $_REQUEST['nome'];
		$email= $_REQUEST['email'];	
		$biografia = $_REQUEST['biografia'];
		if(isset($_REQUEST['blog'])){
			$blog = $_REQUEST['blog'];
		}
		else{
			$blog = " ";
		}

		$sql = "update professor set nome='$nome',email='$email',blog='$blog',biografia='$biografia' where id_professor='$id'";

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
