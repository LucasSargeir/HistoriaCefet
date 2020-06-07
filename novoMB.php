<?php
	include("conectaBanco.php");
	include("functionImagem.php");
	$nome = $_REQUEST['titulo'];
	$local = $_REQUEST['local'];

	$sql = "insert into materia (nome) values ('$nome')";

	$resposta = mysqli_query($link, $sql);				/* Enviando a consulta para o banco de dados */

	if($resposta){
		if($local==1){
			echo"Matéria adicionada com sucesso<br>";
			echo"<a href='upTexto.php'><input type='button'value='Voltar'></a>"; //. mysql_insert_id(); se quiser mostrar o id 		/* Deu Certo */
		}
		if($local==2){
			echo"Matéria adicionada com sucesso<br>";
			echo"<a href='upVideo.php'><input type='button'value='Voltar'></a>"; //. mysql_insert_id(); se quiser mostrar o id 		/* Deu Certo */
		}
		if($local==3){
			echo"Matéria adicionada com sucesso<br>";
			echo"<a href='upTextoAluno.php'><input type='button'value='Voltar'></a>"; //. mysql_insert_id(); se quiser mostrar o id 		/* Deu Certo */
		}
	}
	else{
		echo mysqli_error($link);												/* Erro ao executar a consulta */
	}

	mysqli_close($link);													/* Fecha a conexão */

?>