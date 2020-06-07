<?php

include("conectaBanco.php");

$idUser =  $_REQUEST['id'];
//ini_set('upload_max_filesize', '50M');
$nomeTemp = $_FILES["imagem"]["tmp_name"];
$nomeReal = $_FILES["imagem"]["name"];
$tamanho = $_FILES["imagem"]["size"];
$formato = $_FILES["imagem"]["type"];

//print_r($_FILES);
//die();

list($nome,$form) = explode(".", $nomeReal);

if( $nome != null & ($form == "jpg" || $form =="JPG")){
	echo"$form";
	$imagemEnviada = imagecreatefromjpeg($nomeTemp);
	list($w, $h) = getimagesize($nomeTemp);
	

	if ($w > $h) {
		$wi = 0.8 * $h;
	}
	else {
		$wi = 0.8 * $w;
	}

	$xi = ($w - $wi) / 2;
	$yi = ($h - $wi) / 2;

	$wf = 150;

	$destino = imagecreatetruecolor($wf, $wf);

	imagecopyresized($destino, $imagemEnviada, 0, 0, $xi, $yi, $wf, $wf, $wi, $wi);

	$nomeImagemPraSalvar = sha1_file($nomeTemp);

	imagejpeg($destino, "./images/uploads/miniatura_$nomeImagemPraSalvar.jpg");
	imagejpeg($imagemEnviada, "./images/uploads/original_$nomeImagemPraSalvar.jpg");
	imagedestroy($destino);
	imagedestroy($imagemEnviada);


	$formato = mysql_real_escape_string($formato);


	$resposta1 = mysqli_query($link, "select * from imagemprofessor where id_professor = $idUser");

	if($resposta1){

		$linha1 = mysqli_fetch_assoc($resposta1);

		if($linha1){

			$delete = $linha1['nome'];

			echo unlink("./images/uploads/miniatura_$delete.jpg");
			echo unlink("./images/uploads/original_$delete.jpg");

		}

	}

	$resposta0 =  mysqli_query($link, "delete from imagemprofessor where id_professor = $idUser");


	$sql = "insert into imagemprofessor (id_professor,nome) values ('$idUser','$nomeImagemPraSalvar')";

	$resposta = mysqli_query($link, $sql);


	if($resposta){

		echo "Foi";
		header("location:professor.php?");
		
	}
}
else{

	echo"Não foi possivel usar essa imagem";

}

?>