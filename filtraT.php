<?php
	
	
	$resposta2 = mysqli_query($link, "select * from texto order by id_texto desc");

	if($resposta2){	
	
		$linha2 = mysqli_fetch_assoc($resposta2);
			echo"<header class='major'>
				<h2>Textos</h2>
			</header><div class='posts'>";

		if($linha2){
			$resposta = mysqli_query($link, "select * from professor where id_professor='$linha2[idP]'");
				if($resposta){	
					$linha = mysqli_fetch_assoc($resposta);
					if($linha){

						$nomeImagem = nomeImagem($linha['id_professor'],"miniatura_");

						echo "<article><img style='width:32%;height:40%;border-radius:50px'src='$nomeImagem' alt='' /><br><h3>$linha2[nome]</h3>$linha[nome]<h6>DD/MM/AAAA - HH:MM</h6>
						<div style='overflow: hidden; width:28em; border:1px; text-overflow: ellipsis;  white-space:nowrap;'>
						    $linha2[resumo] 
						</div>
						<br>

						<ul class='actions'>
							<li><a href='texto.php?id={$linha2['id_texto']}' class='button special'>Mais</a></li>
						</ul></article>";
					}
				}
			$linha2 = mysqli_fetch_assoc($resposta2);
		}
			if($linha2){
				$resposta = mysqli_query($link, "select * from professor where id_professor='$linha2[idP]'");
				if($resposta){	
					$linha = mysqli_fetch_assoc($resposta);
					if($linha){

						$nomeImagem = nomeImagem($linha['id_professor'],"miniatura_");

						echo "<article><img style='width:32%;height:40%;border-radius:50px'src='$nomeImagem' alt='' /><br><h3>$linha2[nome]</h3>$linha[nome]<h6>DD/MM/AAAA - HH:MM</h6>
						<div style='overflow: hidden; width:28em; border:1px; text-overflow: ellipsis;  white-space:nowrap;'>
						    $linha2[resumo] 
						</div>
						<br>

						<ul class='actions'>
							<li><a href='texto.php?id={$linha2['id_texto']}' class='button special'>Mais</a></li>
						</ul></article>";
					}
				}
				$linha2 = mysqli_fetch_assoc($resposta2);
			}
			if($linha2){
				$resposta = mysqli_query($link, "select * from professor where id_professor='$linha2[idP]'");
				if($resposta){	
					$linha = mysqli_fetch_assoc($resposta);
					if($linha){

						$nomeImagem = nomeImagem($linha['id_professor'],"miniatura_");

						echo "<article><img style='width:32%;height:40%;border-radius:50px'src='$nomeImagem' alt='' /><br><h3>$linha2[nome]</h3>$linha[nome]<h6>DD/MM/AAAA - HH:MM</h6>
						<div style='overflow: hidden; width:28em; border:1px; text-overflow: ellipsis;  white-space:nowrap;'>
						    $linha2[resumo] 
						</div>
						<br>

						<ul class='actions'>
							<li><a href='texto.php?id={$linha2['id_texto']}' class='button special'>Mais</a></li>
						</ul></article>";
					}
				}
				$linha2 = mysqli_fetch_assoc($resposta2);
			}
			if($linha2){
				$resposta = mysqli_query($link, "select * from professor where id_professor='$linha2[idP]'");
				if($resposta){	
					$linha = mysqli_fetch_assoc($resposta);
					if($linha){

						$nomeImagem = nomeImagem($linha['id_professor'],"miniatura_");

						echo "<article><img style='width:32%;height:40%;border-radius:50px'src='$nomeImagem' alt='' /><br><h3>$linha2[nome]</h3>$linha[nome]<h6>DD/MM/AAAA - HH:MM</h6>
						<div style='overflow: hidden; width:28em; border:1px; text-overflow: ellipsis;  white-space:nowrap;'>
						    $linha2[resumo] 
						</div>
						<br>

						<ul class='actions'>
							<li><a href='texto.php?id={$linha2['id_texto']}' class='button special'>Mais</a></li>
						</ul></article>";
					}
				}
				$linha2 = mysqli_fetch_assoc($resposta2);
			}
	}
	else{
		echo "Erro na exibição dos textos";
	}
?>