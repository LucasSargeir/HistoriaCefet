<?php


	include("conectaBanco.php"); 
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

	$sql = "insert into professor (nome,email,token,blog,biografia,imagem,admin) values ('$nome','$email','$token','$blog','$biografia','images/pic011.jpg', 0)";


	$resposta = mysqli_query($link, $sql);				

	if($resposta){
		header("location: index.php");

	}
	else{
		echo mysqli_error($link);										
	}


?>
