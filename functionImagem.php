<?php

	function nomeImagem($IdUser,$conca, $link){

		$resposta = mysqli_query($link, "select * from imagemprofessor where id_professor = $IdUser");

		$nome = "";

		if($resposta){

			$linha = mysqli_fetch_assoc($resposta);

			if($linha){

				$nome = "images/uploads/$conca{$linha['nome']}.jpg"; 

			}
			else{

				$nome = "images/default.jpg";

			}

		}
		else{
			$nome = "images/default.jpg";
		}

		return $nome;

	}

	function printaData($string){
		
		$novaData = $string[8].$string[9].$string[4].$string[5].$string[6].$string[7].$string[0].$string[1].$string[2].$string[3];

		return $novaData;
	}
	

?>