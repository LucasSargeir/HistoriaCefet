
<?php
	
	session_start();
	     
	include("conectaBanco.php");  

	$titulo=$_REQUEST["titulo"];
	$aluno=$_REQUEST["aluno"];
	$resumo=$_REQUEST["resumo"];
	$idM=$_REQUEST["materia"];
	$id=$_SESSION["usuario"];
	date_default_timezone_set('America/Sao_Paulo');
	$date = date('Y-m-d');
	$time = date('H:m');

	$resposta = mysqli_query($link, "select * from texto");
	if($idM==0){
		echo"ESCOLHA UMA MATÉRIA!!!";
		//header("location:upTexto.php");
		echo"<a href='upTextoAluno.php'><input type='button'value='Voltar'></a>";
	}
	else{

	if($resposta){	
		//CORRIGIR

		//$randon=rand (1,9999999);

		$pathToSave = "upload/$id/";

		/*Checa se a pasta existe - caso negativo ele cria*/
		if (!file_exists($pathToSave)) {
		    mkdir($pathToSave);
		}

		$pathToSave = "upload/$id/Aluno/";

		/*Checa se a pasta existe - caso negativo ele cria*/
		if (!file_exists($pathToSave)) {
		    mkdir($pathToSave);
		}


		//$pathToSave = "upload/$id/$randon/";

		/*Checa se a pasta existe - caso negativo ele cria*/
		//if (!file_exists($pathToSave)) {
		//    mkdir($pathToSave);
		//}

		if ($_FILES) { // Verificando se existe o envio de arquivos.

		    if ($_FILES['txtArquivo']) { // Verifica se o campo não está vazio.
			$dir = $pathToSave; // Diretório que vai receber o arquivo.
			$tmpName = $_FILES['txtArquivo']['tmp_name']; // Recebe o arquivo temporário.
			}
			$name = $_FILES['txtArquivo']['name']; // Recebe o nome do arquivo.
			preg_match_all('/\.[a-zA-Z0-9]+/', $name, $extensao);
			if (!in_array(strtolower(current(end($extensao))), array('.pdf'))) {
			    echo('Permitido apenas arquivos pdf.');
			    //header('Location:upConto.php');
			    die;

			}

			// move_uploaded_file( $arqTemporário, $nomeDoArquivo )
			if (move_uploaded_file($tmpName, $dir.$name)) { // move_uploaded_file irá realizar o envio do arquivo.
		
				$linha = mysqli_fetch_assoc($resposta);
				
				$sql = "insert into textoaluno (nome,nomeA,resumo,arquivo,aluno,idP,idM,data,hora) values ('$titulo','$aluno','$resumo','$dir$name','0','$id','$idM','$date','$time')";
				mysqli_query($link, $sql);
				//LEMBRAR!!!
				header("location:professor.php");
			}
		mysqli_close($link);
		}
		else{
			echo "ERROR";
		}
	}
	else{
		echo "ERROR";
	}
}
?>