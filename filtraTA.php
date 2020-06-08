<?php
	
	
	$resposta4 = mysqli_query($link, "select * from textoaluno order by id_textoA desc");

	//include("functionImagem.php");
	//$nomeImagem = nomeImagem($_SESSION['usuario'],"miniatura_");

	if($resposta4){	
	
		$linha4 = mysqli_fetch_assoc($resposta4);
			echo"<header class='major'>
				<h2>Textos dos Alunos e Estagiários</h2>
			</header><div class='posts'>";

		if($linha4){
			$resposta = mysqli_query($link, "select * from professor where id_professor='$linha4[idP]'");
				if($resposta){	
					$linha = mysqli_fetch_assoc($resposta);
					if($linha){

						$nomeImagem = nomeImagem($linha['id_professor'],"miniatura_");

						echo "<article><img style='width:32%;height:40%;border-radius:50px'src='$nomeImagem' alt='' /><br><h3>$linha4[nome]</h3>$linha4[nomeA]<h6>DD/MM/AAAA - HH:MM</h6>
						<div style='overflow: hidden; width:28em; border:1px; text-overflow: ellipsis;  white-space:nowrap;'>
						    $linha4[resumo] 
						</div>
						<br>

						<ul class='actions'>
							<li><a href='textoA.php?id={$linha4['id_textoA']}' class='button special'>Mais</a></li>
						</ul></article>";
					}
				}
			$linha4 = mysqli_fetch_assoc($resposta4);
		}
			if($linha2){
				$resposta = mysqli_query($link, "select * from professor where id_professor='$linha4[idP]'");
				if($resposta){	
					$linha = mysqli_fetch_assoc($resposta);
					if($linha){

						$nomeImagem = nomeImagem($linha['id_professor'],"miniatura_");

						echo "<article><img style='width:32%;height:40%;border-radius:50px'src='$nomeImagem' alt='' /><br><h3>$linha4[nome]</h3>$linha4[nomeA]<h6>DD/MM/AAAA - HH:MM</h6>
						<div style='overflow: hidden; width:28em; border:1px; text-overflow: ellipsis;  white-space:nowrap;'>
						    $linha4[resumo] 
						</div>
						<br>

						<ul class='actions'>
							<li><a href='textoA.php?id={$linha4['id_textoA']}' class='button special'>Mais</a></li>
						</ul></article>";
					}
				}
				$linha4 = mysqli_fetch_assoc($resposta4);
			}
	}
	else{
		echo "Erro na exibição dos textos";
	}
?>