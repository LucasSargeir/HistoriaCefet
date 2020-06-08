<?php
	//include("conectaBanco.php");
	
	function youtube_id_from_url($url) {
		$palheiro = $url;
		$agulha   = 'iframe';

		$pos = strpos( $palheiro, $agulha );

		if($pos === false){
		    $pattern = 
		        '%^# Match any youtube URL
		        (?:https?://)?  
		        (?:www\.)?      
		        (?:             
		          youtu\.be/    
		        | youtube\.com  
		          (?:           
		            /embed/     
		          | /v/         
		          | /watch\?v=  
		          )             
		        )               
		        ([\w-]{10,12})  	       
		         $%x'
		        ;
		    
		    $url = str_replace("&feature=youtu.be", "", $url);
		    $result = preg_match($pattern, $url, $matches);

		    if ($result) {
		    	//$height = screen.height/2;
		    	//$width = screen.width/2;
		    	//echo"$width";
		    	$url = "<iframe height='315' width='100%' onload='autoResize(this)' src='https://www.youtube.com/embed/{$matches[1]}' frameborder='0' allowfullscreen></iframe>";
		        return $url;
		    }
	    	return false;
		}
		else{

			return $url;

		}
	}


/*DETALHES  DA FUNÇÃO ----------------< youtube_id_from_url($url); >------------------

	
	$url ==> o link do You Tube


	------------------------------[ RETORNO ]------------------------------------------
	|																				  |
	|O retorno é a tag <iframe> do video constado no link                             |
	| 																				  |
	-----------------------------------------------------------------------------------
;*/
//****************************************************[ TESTE ]***************************************************************************
		
	//echo youtube_id_from_url($link);



//*******************************************************************************************************************************
//*******************************************************************************************************************************
//*******************************************************************************************************************************
//*******************************************************************************************************************************
//*******************************************************************************************************************************
	function maiorId($tabela,$chavePrimaria, $link){
		$id = 1000;;
		
		$resposta = mysqli_query($link, "select * from $tabela order by $chavePrimaria desc");

		if($resposta){
			$linha = mysqli_fetch_assoc($resposta);
			if($linha){

				$id = $linha[$chavePrimaria];

			}
		}
		
		return $id;
	}
	function recebeTextos($pag, $limite, $tabela, $chavePrimaria, $link){

		$qtdTotal = mysqli_num_rows(mysqli_query($link, "select * from ".$tabela));

		$idTeste = maiorId($tabela,$chavePrimaria, $link);//1;// testa os ids;
		$numObjetos = 0;// quantos objetos tem no vetor
 		$objetos;// os objetos em si
		
		while ( $numObjetos+1 <= $qtdTotal && $numObjetos < $limite*$pag && $idTeste > 0) {
			
			$resposta = mysqli_query($link, "select * from $tabela where $chavePrimaria = $idTeste");
			
			if($resposta){
				
				$linha = mysqli_fetch_assoc($resposta);

				if($linha){
					
					$objetos[$numObjetos] = $linha;
					$numObjetos++;

				}
				$idTeste--;
			}
		}

		$aux = null;
		$count = 0;
		if($objetos != null){
			for ($i= ($pag*$limite)-$limite; $i < min($limite*$pag,count($objetos)); $i++) { 
				
				$aux[$count] = $objetos[$i];
				$count++;

			}
		}

		return $aux;

	}
	function maiorIdP($tabela,$chavePrimaria,$idProf, $link){
		$id = 1000;;
		
		$resposta = mysqli_query($link, "select * from $tabela where idP = $idProf order by $chavePrimaria desc");

		if($resposta){
			$linha = mysqli_fetch_assoc($resposta);
			if($linha){

				$id = $linha[$chavePrimaria];

			}
		}
		
		return $id;
	}
	function recebeTextosP($pag, $limite, $tabela, $chavePrimaria,$idProf, $link){

		$qtdTotal = mysqli_num_rows(mysqli_query($link, "select * from $tabela where idP = $idProf"));

		$idTeste = maiorIdP($tabela,$chavePrimaria,$idProf, $link);//1;// testa os ids;
		$numObjetos = 0;// quantos objetos tem no vetor
 		$objetos = null;// os objetos em si
		
		while ( $numObjetos+1 <= $qtdTotal && $numObjetos < $limite*$pag && $idTeste > 0) {
			
			$resposta = mysqli_query($link, "select * from $tabela where $chavePrimaria = $idTeste and idP = $idProf");
			
			if($resposta){
				
				$linha = mysqli_fetch_assoc($resposta);

				if($linha){
					
					$objetos[$numObjetos] = $linha;
					$numObjetos++;

				}
				$idTeste--;
			}
		}

		$aux = null;
		$count = 0;
		if($objetos != null){
			for ($i= ($pag*$limite)-$limite; $i < min($limite*$pag,count($objetos)); $i++) { 
				
				$aux[$count] = $objetos[$i];
				$count++;

			}
		}
		return $aux;

	}

	function maiorIdA($tabela,$chavePrimaria,$query, $link){
		$id = 1000;;
		
		$resposta = mysqli_query($link, "select * from $tabela where $query order by $chavePrimaria desc");

		if($resposta){
			$linha = mysqli_fetch_assoc($resposta);
			if($linha){

				$id = $linha[$chavePrimaria];

			}
		}
		
		return $id;
	}
	function recebeTextosA($pag, $limite, $tabela, $chavePrimaria,$query, $link){

		$qtdTotal = mysqli_num_rows(mysqli_query($link, str_replace("and","","select * from $tabela where $query ")));

		$idTeste = maiorIdA($tabela,$chavePrimaria,$query, $link);//1;// testa os ids;
		$numObjetos = 0;// quantos objetos tem no vetor
 		$objetos = null;// os objetos em si
		
		while ( $numObjetos+1 <= $qtdTotal && $numObjetos < $limite*$pag && $idTeste > 0) {
			
			$resposta = mysqli_query($link, "select * from $tabela where $query $chavePrimaria = $idTeste ");
			
			if($resposta){
				
				$linha = mysqli_fetch_assoc($resposta);

				if($linha){
					
					$objetos[$numObjetos] = $linha;
					$numObjetos++;

				}
				$idTeste--;
			}
		}

		$aux = null;
		$count = 0;
		if($objetos != null){
			for ($i= ($pag*$limite)-$limite; $i < min($limite*$pag,count($objetos)); $i++) { 
				
				$aux[$count] = $objetos[$i];
				$count++;

			}
		}
		return $aux;

	}


/*DETALHES  DA FUNÇÃO ----------------< recebeTextos($pag, $limite); >------------------

	
	$pag ==> indica a página que você quer receber 

	$limite ==> o número de textos que você quer por página

	$tabela ==> nome da tabela que você quer pegar

	$chavePrimaria ==> o nome do campo da chave primaria (id) da tabela que você quer


	------------------------------[ RETORNO ]------------------------------------------
	|																				  |
	|O retorno é uma matriz do tipo $mat[$posicao][$atributo], abaixo segue um exemplo|
	| 																				  |
	--------------------------------[ OBS ]--------------------------------------------
	|																				  |
	|Se não existir nada a ser printado na página selecionada a função retornará null |
	|																				  |
	-----------------------------------------------------------------------------------



****************************************************************[ TESTE ]*****************************************************************/
/*	$linha = recebeTextos(9,4,"texto","id_texto");

	for ($i=0; $i < count($linha); $i++) { 
		
			echo "<h3>{$linha[$i]['nome']}</h3>{$linha[$i]['arquivo']}
						<div style='overflow: hidden; width:28em; border:1px; text-overflow: ellipsis;  white-space:nowrap;'>
						    {$linha[$i]['resumo']} 
						</div>
						<br>

						<ul class='actions'>
							
						</ul></article><hr>";
		
	}
*/
//*****************************************************************************************************************************************
	
?>