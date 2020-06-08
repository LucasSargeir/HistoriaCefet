<?php
	include("conectaBanco.php");

	function addImagem($imagem){
		
		$nomeTemp = $imagem['tmp_name'];
		$nome = $imagem['name'];



		list($nome,$form) = explode(".", $nome);

		//if( $nome != null & ($form == "jpg" || $form =="JPG")){

		$imagemEnviada = imagecreatefromjpeg($nomeTemp);
		list($w, $h) = getimagesize($nomeTemp);

	/*	if ($w > $h) {
			$wi = 0.8 * $h;
		}
		else {
			$wi = 0.8 * $w;
		}

		$xi = ($w - $wi) / 2;
		$yi = ($h - $wi) / 2;

		$wf = 150;*/
		$we = 600;
		$he = ($we*$h)/$w;

		$destino = imagecreatetruecolor($we, $he);

		imagecopyresized($destino, $imagemEnviada, 0, 0, 0, 0, $we, $he, $w, $h);

		$nomeImagemPraSalvar = sha1_file($nomeTemp);

		imagejpeg($destino, "./images/evento/evento_$nomeImagemPraSalvar.jpg");
		//imagejpeg($imagemEnviada, "./images/uploads/original_$nomeImagemPraSalvar.jpg");



		imagedestroy($destino);
		imagedestroy($imagemEnviada);

		$nomeImagem = "evento_".$nomeImagemPraSalvar.".jpg";
		
		return $nomeImagem;

	}
	function addImagemMin($imagem){
		$nomeTemp = $imagem['tmp_name'];
		$nome = $imagem['name'];


		list($nome,$form) = explode(".", $nome);

		//if( $nome != null & ($form == "jpg" || $form =="JPG")){

		$imagemEnviada = imagecreatefromjpeg($nomeTemp);
		list($w, $h) = getimagesize($nomeTemp);

	/*	if ($w > $h) {
			$wi = 0.8 * $h;
		}
		else {
			$wi = 0.8 * $w;
		}

		$xi = ($w - $wi) / 2;
		$yi = ($h - $wi) / 2;

		$wf = 150;*/

		$we = 288;
		$he = ($we*$h)/$w;

		$destino = imagecreatetruecolor($we, $he);

		imagecopyresized($destino, $imagemEnviada, 0, 0, 0, 0, $we, $he, $w, $h);

		$nomeImagemPraSalvar = sha1_file($nomeTemp);

		imagejpeg($destino, "./images/evento/min_evento_$nomeImagemPraSalvar.jpg");
		//imagejpeg($imagemEnviada, "./images/uploads/original_$nomeImagemPraSalvar.jpg");



		imagedestroy($destino);
		imagedestroy($imagemEnviada);

		$nomeImagem = "min_evento_".$nomeImagemPraSalvar.".jpg";
		
		return $nomeImagem;

	}

	$nome=$_REQUEST['nome'];
	$descricao=$_REQUEST['descricao'];
	$local=$_REQUEST['local'];
	$data_ini=$_REQUEST['data_ini'];
	$data_fin=$_REQUEST['data_fin'];
	$hora_ini=$_REQUEST['hora_ini'];
	$hora_fin=$_REQUEST['hora_fin'];
	$image=$_FILES['imagem'];

	$resposta = mysqli_query($link, "select * from evento where nome = '$nome' and data_ini = '$data_ini' and data_fin = '$data_fin' and hora_ini = '$hora_ini' and hora_fin = '$hora_fin' ");

	if($resposta){

		$linha = mysqli_fetch_assoc($resposta);

		if($linha){

			header("location:criarEvento.php");

		}
		else{

			$image2 = addImagem($image);
			$image3 = addImagemMin($image);
			$sql = mysqli_query($link, "insert into evento (nome, descricao, local, data_ini, data_fin, hora_ini, hora_fin, image) values ('$nome', '$descricao', '$local', '$data_ini', '$data_fin', '$hora_ini', '$hora_fin', '$image2')");

			if($sql){

				header("location:criarEvento.php");

			}
			else{

				echo mysqli_error($link);

			}

		}

	}

?>