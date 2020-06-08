<?php
	include("conectaBanco.php"); 
	
	$nome = $_REQUEST['nome'];
	$email= $_REQUEST['email'];
	$senha = $_REQUEST['senha'];	
	$biografia = $_REQUEST['biografia'];
	if(isset($_REQUEST['blog'])){
		$blog = $_REQUEST['blog'];
	}
	else{
		$blog = " ";
	}

	$token = sha1("$email$senha");

	$sql = "insert into professor (nome,email,token,blog,biografia,imagem) values ('$nome','$email','$token','$blog','$biografia','images/pic011.jpg')";

	$resposta = mysqli_query($link, $sql);				/* Enviando a consulta para o banco de dados */

	if($resposta){
		header("location: index.php"); //. mysql_insert_id(); se quiser mostrar o id 		/* Deu Certo */

	}
	else{
		echo mysqli_error($link);												/* Erro ao executar a consulta */
	}

	mysqli_close($link);													/* Fecha a conexão */

?>
