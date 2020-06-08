<?php
	
	
	$resposta3 = mysqli_query($link, "select * from video order by id_video desc");

	if($resposta3){	
	
		$linha3 = mysqli_fetch_assoc($resposta3);
			echo"<header class='major'>
				<h2>Vídeos</h2>
			</header><div class='posts'>";

			if($linha3){
				$resposta = mysqli_query($link, "select * from professor where id_professor='$linha3[idP]'");
				if($resposta){	
					$linha = mysqli_fetch_assoc($resposta);
					if($linha){

						$nomeImagem = nomeImagem($linha['id_professor'],"miniatura_");

						echo "<article><img style='width:32%;height:40%;border-radius:50px'src='$nomeImagem' alt='' /><br><h3>$linha3[titulo]</h3>$linha[nome]<h6>DD/MM/AAAA - HH:MM</h6>
						<div style='overflow: hidden; width:28em; border:1px; text-overflow: ellipsis;  white-space:nowrap;'>
						    $linha3[resumo] 
						</div>
						<br>

						<ul class='actions'>
							<li><a href='video.php?id={$linha3['id_video']}' class='button special'>Mais</a></li>
						</ul></article>";
					}
				}
			$linha3 = mysqli_fetch_assoc($resposta3);
			}
			if($linha3){
				$resposta = mysqli_query($link, "select * from professor where id_professor='$linha3[idP]'");
				if($resposta){	
					$linha = mysqli_fetch_assoc($resposta);
					if($linha){

						$nomeImagem = nomeImagem($linha['id_professor'],"miniatura_");

						echo "<article><img style='width:32%;height:40%;border-radius:50px'src='$nomeImagem' alt='' /><br><h3>$linha3[titulo]</h3>$linha[nome]<h6>DD/MM/AAAA - HH:MM</h6>
						<div style='overflow: hidden; width:28em; border:1px; text-overflow: ellipsis;  white-space:nowrap;'>
						    $linha3[resumo] 
						</div>
						<br>

						<ul class='actions'>
							<li><a href='video.php?id={$linha3['id_video']}' class='button special'>Mais</a></li>
						</ul></article>";
					}
				}
			}
	}
	else{
		echo "Erro na exibição dos videos";
	}
?>