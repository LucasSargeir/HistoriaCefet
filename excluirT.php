<?php
	include("conectaBanco.php");
	
	$id = $_REQUEST['id'];
	if(isset($_REQUEST['aluno'])){

			$sql = "select * from textoaluno where id_textoA = $id";

	}
	else{
	
		$sql = "select * from texto where id_texto = $id";

	}
	$resposta = mysqli_query($link, $sql);
	
	if($resposta){

		$linha = mysqli_fetch_assoc($resposta);

		if($linha){
			echo unlink("./{$linha['arquivo']}");
		}

	}	
	if(isset($_REQUEST['aluno'])){

		$sql = "delete from textoaluno where id_textoA = $id ";

	}
	else{
	
		$sql = "delete from texto where id_texto = $id ";

	}
	

	$resposta = mysqli_query($link, $sql);				/* Enviando a consulta para o banco de dados */

	if($resposta){
		header("location: professor.php"); //. mysql_insert_id(); se quiser mostrar o id 		/* Deu Certo */
	}
	else{
		echo mysqli_error($link);												/* Erro ao executar a consulta */
	}

	mysqli_close($link);													/* Fecha a conexão */

?>