<?php
	include("conectaBanco.php");

	$resposta = mysqli_query($link, "select * from professor");				

	$linha = mysqli_fetch_assoc($resposta);

	$email = $_REQUEST["email"];
	$senha = $_REQUEST["senha"];
	$confirmacao = 0;

	$token = sha1("$email$senha");

	if($resposta){	

		while($linha){
			if(($linha['email'] == $email)&&($linha['token'] == $token)){
				$confirmacao=1;
				break;
			}
			$linha = mysqli_fetch_assoc($resposta);
		}
	
	}
	mysqli_close($link);

	session_start();

	if($confirmacao == 1){
		
		$_SESSION["email"] = $linha['email'];
		$_SESSION["usuario"]=$linha['id_professor'];
		header("location:professor.php");
	
	}
	else{
		header("location:index.php");

	}
?>