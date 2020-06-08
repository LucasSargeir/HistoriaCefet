<?php
	session_start();
	include("conectaBanco.php");
	
	$nome = $_REQUEST['titulo'];
	$resumo=$_REQUEST["resumo"];
	$link=$_REQUEST["link"];
	$idM=$_REQUEST["materia"];
	$idP=$_SESSION["usuario"];
	date_default_timezone_set('America/Sao_Paulo');
	$date = date('Y-m-d');
	$time = date('H:m');
	if($idM==0){
		echo"ESCOLHA UMA MATÉRIA!!!";
		//header("location:upTexto.php");
		echo"<a href='upVideo.php'><input type='button'value='Voltar'></a>";
	}
	else{

		$sql = "insert into video (titulo,resumo,link,idM,idP,date,time) values ('$nome','$resumo','$link','$idM','$idP','$date','$time')";

		$resposta = mysqli_query($link, $sql);				/* Enviando a consulta para o banco de dados */

		if($resposta){
			header("location: professor.php"); //. mysql_insert_id(); se quiser mostrar o id 		/* Deu Certo */

		}
		else{
			echo mysqli_error($link);												/* Erro ao executar a consulta */
		}

		mysqli_close($link);	
	}												/* Fecha a conexão */

?>