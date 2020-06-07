<?php
	

	include("conectaBanco.php");
	
	$resposta2 = mysqli_query($link, "select * from texto where idP='$id' order by id_texto desc");

	//include("functionImagem.php");
	$nomeImagem = "";
	if(isset($_SESSION['usuario'])){
		$nomeImagem = nomeImagem($_SESSION['usuario'],"miniatura_");
	}
	else{
		$nomeImagem = nomeImagem($_REQUEST['id'],"miniatura_");
	}

	if($resposta2){	
	
		$linha2 = mysqli_fetch_assoc($resposta2);
			echo"<header class='major'>
				<h2>Textos</h2>
			</header><div class='posts'>";

		while($linha2){
			echo "<article><img style='width:32%;height:40%;border-radius:50px'src='$nomeImagem' alt='' /><br><h3>$linha2[nome]</h3>$linha[nome]<h6>DD/MM/AAAA - HH:MM</h6>
				<div style='overflow: hidden; width:28em; border:1px; text-overflow: ellipsis;  white-space:nowrap;'>
				    $linha2[resumo] 
				</div>
				<br>

				<ul class='actions'>
					<li><a href='texto.php?id={$linha2['id_texto']}' class='button special'>Mais</a></li>
				</ul></article>";
			$linha2 = mysqli_fetch_assoc($resposta2);
			if($linha2){
				echo "<article><img style='width:32%;height:40%;border-radius:50px' src='$nomeImagem' alt='' /><br><h3>$linha2[nome]</h3>$linha[nome]<h6>DD/MM/AAAA - HH:MM</h6>
				<div style='overflow: hidden; width:28em; border:1px; text-overflow: ellipsis;  white-space:nowrap;'>
				    $linha2[resumo] 
				</div>
				<br>			
				
				<ul class='actions'>
					<li><a href='texto.php?id={$linha2['id_texto']}' class='button special'>Mais</a></li>
				</ul></article>";
				$linha2 = mysqli_fetch_assoc($resposta2);
			}
			if($linha2){
				echo "<article><img style='width:32%;height:40%;border-radius:50px' src='$nomeImagem' alt='' /><br><h3>$linha2[nome]</h3>$linha[nome]<h6>DD/MM/AAAA - HH:MM</h6>
				<div style='overflow: hidden; width:28em; border:1px; text-overflow: ellipsis;  white-space:nowrap;'>
				    $linha2[resumo] 
				</div>
				<br>
				
				<ul class='actions'>
					<li><a href='texto.php?id={$linha2['id_texto']}' class='button special'>Mais</a></li>
				</ul></article>";
				$linha2 = mysqli_fetch_assoc($resposta2);
			}
		}
	}
	else{
		echo "ERROR!";
	}
?>