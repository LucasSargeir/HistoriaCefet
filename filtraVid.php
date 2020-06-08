<?php
	

	include("conectaBanco.php");
	
	$resposta3 = mysqli_query($link, "select * from video where idP='$id' order by id_video desc");

	//include("functionImagem.php");
	$nomeImagem = "";
	if(isset($_SESSION['usuario'])){
		$nomeImagem = nomeImagem($_SESSION['usuario'],"miniatura_");
	}
	else{
		$nomeImagem = nomeImagem($_REQUEST['id'],"miniatura_");
	}
	if($resposta3){	
	
		$linha3 = mysqli_fetch_assoc($resposta3);
			echo"<header class='major'>
				<h2>Vídeos</h2>
			</header><div class='posts'>";

		while($linha3){
			echo "<article><img style='width:32%;height:40%;border-radius:50px'src='$nomeImagem' alt='' /><br><h3>$linha3[titulo]</h3>$linha[nome]<h6>DD/MM/AAAA - HH:MM</h6>
				<div style='overflow: hidden; width:28em; border:1px; text-overflow: ellipsis;  white-space:nowrap;'>
				    $linha3[resumo] 
				</div>
				<br>

				<ul class='actions'>
					<li><a href='video.php?id={$linha3['id_video']}' class='button special'>Mais</a></li>
				</ul></article>";
			$linha3 = mysqli_fetch_assoc($resposta3);
			if($linha3){
				echo "<article><img style='width:32%;height:40%;border-radius:50px'src='$nomeImagem' alt='' /><br><h3>$linha3[titulo]</h3>$linha[nome]<h6>DD/MM/AAAA - HH:MM</h6>
				<div style='overflow: hidden; width:28em; border:1px; text-overflow: ellipsis;  white-space:nowrap;'>
				    $linha3[resumo] 
				</div>
				<br>

				<ul class='actions'>
					<li><a href='video.php?id={$linha3['id_video']}' class='button special'>Mais</a></li>
				</ul></article>";
			$linha3 = mysqli_fetch_assoc($resposta3);
			}
			if($linha3){
				echo "<article><img style='width:32%;height:40%;border-radius:50px'src='$nomeImagem' alt='' /><br><h3>$linha3[titulo]</h3>$linha[nome]<h6>DD/MM/AAAA - HH:MM</h6>
				<div style='overflow: hidden; width:28em; border:1px; text-overflow: ellipsis;  white-space:nowrap;'>
				    $linha3[resumo] 
				</div>
				<br>

				<ul class='actions'>
					<li><a href='video.php?id={$linha3['id_video']}' class='button special'>Mais</a></li>
				</ul></article>";
			$linha3 = mysqli_fetch_assoc($resposta3);
			}
		}
	}
	else{
		echo "ERROR!";
	}
?>