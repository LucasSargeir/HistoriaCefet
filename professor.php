<?php
	include("conectaBanco.php");
	include("teste.php");
	include("functionImagem.php");
	session_start();
?>
<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Professores</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									
									<ul class="icons">
										<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
										<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon fa-medium"><span class="label">Medium</span></a></li>
									</ul>
								</header>

							<!-- Content -->
								<section>
									<header class="main">
										
									</header>
									
									<?php

										if (isset($_SESSION["usuario"])){
											$id= $_SESSION["usuario"];
										}
										else{
											$id= $_REQUEST["id"];
										}
									
										if($id){

											$resposta = mysqli_query($link, "select * from professor where id_professor = '$id'");

											if ($resposta){

												$linha = mysqli_fetch_assoc($resposta);

												if ($linha){

													//include("functionImagem.php");
													$nomeImagem = "";
													if(isset($_SESSION['usuario'])){
														$nomeImagem = nomeImagem($_SESSION['usuario'],"original_", $link);
														echo"<p><span class='image right'>
														<a href='Tfoto.php'><img style='width:50%;height:50%;border-radius:10px' 
														src='$nomeImagem' 
														alt='$nomeImagem' title='Troque sua imagem'/></a><strong>Clique na imagem para troca-la</strong>
														</span><h1>{$linha['nome']}</h1>{$linha['biografia']}.</p>";
														
													}
													else{
														$nomeImagem = nomeImagem($_REQUEST['id'],"original_", $link);
														echo"<p><span class='image right'>
														<img style='width:50%;height:50%;border-radius:10px' 
														src='$nomeImagem' 
														alt='$nomeImagem' />
														</span><h1>{$linha['nome']}</h1>{$linha['biografia']}.</p>";
													
													}


													
												}
												else{
													echo mysqli_error($link);										
												}
											}
											else{
												mysqli_error($link);
											}
											if (isset($_SESSION["usuario"])){
												echo"<ul class='actions'>
													<li><a href='editarP.php' class='button special'>Editar Perfil</a></li>
												</ul>";

											/*	echo"<br><br>
													
													<h2>Entre com uma foto de perfil</h2>
													<p>Tamanho máx 20M</p><br>
													
													<form method='post' action='uploadImagem.php' enctype='multipart/form-data'>
														<input type='hidden' name='id' value='{$_SESSION['usuario']}' />
														<input type='file' name='imagem' />
														<input type='submit' value='Enviar'>
													</form>";*/
											}
										}
									
									?>
									
									<hr class="major" />
									<?php
									if($linha['admin']==false){

//______________________________________________________________[TEXTOS]_______________________________________________________________
										if(isset($_REQUEST['id'])){

											$idProf = $_REQUEST['id'];

										}
										else{

											$idProf = $_SESSION['usuario'];
										}


										$pagT = 1;

										if(isset($_REQUEST['pagT'])){

											$pagT = $_REQUEST['pagT'];

										}	

										$linhaTextos = recebeTextosP($pagT,4,"texto","id_texto",$idProf, $link);

										echo"<header class='major'>
												<h2>Textos</h2>
											</header><div class='posts'>";

										for ($i=0; $i < count($linhaTextos); $i++) { 
											
											$respostaProf = mysqli_query($link, "select * from professor where id_professor = {$linhaTextos[$i]['idP']}");

											$linhaProf = mysqli_fetch_assoc($respostaProf);

											$nomeImagem = nomeImagem($linhaProf['id_professor'],"miniatura_", $link);

											echo "<article >
											<img style='width:32%;height:40%;border-radius:50px'src='$nomeImagem' alt='' />
											<div><h3>{$linhaTextos[$i]['nome']}</h3>
											{$linhaProf['nome']} <br><h6>";

											$data = "".$linhaTextos[$i]['data'];
											$data = str_replace("-","/",$data);
											$data = printaData($data);
											echo $data;
											
											echo " - "; 
											$hora = "".$linhaTextos[$i]['hora'];
											$hora = $hora[0].$hora[1].$hora[2].$hora[3].$hora[4];
											echo $hora;

											echo"</h6></div>
											<div style='overflow: hidden; width:25em; border:1px; text-overflow: ellipsis;  white-space:nowrap;'>
												    {$linhaTextos[$i]['resumo']} 
											</div>
												<br>

												<ul class='actions'>
													<li><a href='texto.php?id={$linhaTextos[$i]['id_texto']}' class='button special'>Mais</a></li>
												</ul></article>";
										}


										//include("filtraT.php");

										echo"</div><hr class='major' />";


										$totalObj = mysqli_num_rows(mysqli_query($link, "select * from texto where idP = $idProf"));

										$numPag = ceil($totalObj/4);

										echo"<center><ul class='pagination'>";
										if($pagT == 1 ){
											
											echo"<li><span class='button disabled'>Voltar</span></li>";

										}else{
											$sub = $pagT - 1;
											echo" <li><a href='professor.php?id=$idProf&pagT=$sub' class='button'>Voltar</a></li>";

										}

										for ($i=1; $i <= $numPag ; $i++) { 
											if( $i == $pagT){

												echo"<li><a href='professor.php?id=$idProf&pagT=$i' class='page active'>$i</a></li>";

											}else{

												echo"<li><a href='professor.php?id=$idProf&pagT=$i' class='page'>$i</a></li>";

											}
										}
										
										if($pagT == $numPag ){
											
											echo" <li><a  class='button disabled'>Próximo</a></li>";

										}else{
											$som = $pagT + 1;
											echo" <li><a href='professor.php?id=$idProf&pagT=$som' class='button'>Próximo</a></li>";

										}
										
										echo"</ul></center><br><br>";
//______________________________________________________________[ VIDEOS ]______________________________________________________________
										

										//include("filtraV.php");

										$pagV = 1;

										if(isset($_REQUEST['pagV'])){

											$pagV = $_REQUEST['pagV'];

										}	

										$linhaVideos = recebeTextosP($pagV,4,"video","id_video",$idProf, $link);

										echo"<header class='major'>
												<h2>Vídeos</h2>
											</header><div class='posts' >";

										for ($i=0; $i < count($linhaVideos); $i++) { 
											
											$respostaProf = mysqli_query($link, "select * from professor where id_professor = {$linhaVideos[$i]['idP']}");

											$linhaProf = mysqli_fetch_assoc($respostaProf);

											$nomeImagem = nomeImagem($linhaProf['id_professor'],"miniatura_", $link);
											echo "<article><img style='width:32%;height:40%;border-radius:50px'src='$nomeImagem' alt='' /><br><h3>{$linhaVideos[$i]['titulo']}</h3>{$linhaProf['nome']}<h6>";

											$data = "".$linhaVideos[$i]['data'];
											$data = str_replace("-","/",$data);
											$data = printaData($data);
											echo $data;
											
											echo " - "; 
											$hora = "".$linhaVideos[$i]['hora'];
											$hora = $hora[0].$hora[1].$hora[2].$hora[3].$hora[4];
											echo $hora;

											echo"</h6>
												<div style='overflow: hidden; width:28em; border:1px; text-overflow: ellipsis;  white-space:nowrap;'>
												    {$linhaVideos[$i]['resumo']} 
												</div>
												<br>

												<ul class='actions'>
													<li><a href='video.php?id={$linhaVideos[$i]['id_video']}' class='button special'>Mais</a></li>
												</ul></article>";
											
										}

										echo"</div><hr class='major' />";

										$totalObj = mysqli_num_rows(mysqli_query($link, "select * from video where idP = $idProf"));

										$numPag = ceil($totalObj/4);

										echo"<center><ul class='pagination'>";
										if($pagV == 1 ){
											
											echo"<li><span class='button disabled'>Voltar</span></li>";

										}else{
											$sub = $pagV - 1;
											echo" <li><a href='professor.php?id=$idProf&pagT=$sub' class='button'>Voltar</a></li>";

										}

										for ($i=1; $i <= $numPag ; $i++) { 
											if( $i == $pagV){

												echo"<li><a href='professor.php?id=$idProf&pagT=$i' class='page active'>$i</a></li>";

											}else{

												echo"<li><a href='professor.php?id=$idProf&pagT=$i' class='page'>$i</a></li>";

											}
										}
										
										if($pagV == $numPag ){
											
											echo" <li><a  class='button disabled'>Próximo</a></li>";

										}else{
											$som = $pagV + 1;
											echo" <li><a href='professor.php?id=$idProf&pagT=$som' class='button'>Próximo</a></li>";

										}
										
										echo"</ul></center><br><br>";

										/*include("filtraTid.php");

										echo"</div><hr class='major' />";

										include("filtraTidA.php");

										echo"</div><hr class='major' />";

										include("filtraVid.php");*/

										echo"<hr class='major' />

										<h2>Contato</h2>
										<p>E-mail: </p>
										<p>Blog: </p>";
									}
									else{
										echo"<center><ul class='actions'>
											<li><a href='cadastro.php' class='button special'>&nbsp;&nbsp;&nbsp;Novo Professor&nbsp;&nbsp;&nbsp;</a></li>
											<li><a href='excluir.php' class='button special'>&nbsp;&nbsp;&nbsp;Excluir Professor&nbsp;&nbsp;&nbsp;</a></li>
											<li><a href='excluirM.php' class='button special'>&nbsp;&nbsp;&nbsp;Excluir Matéria&nbsp;&nbsp;&nbsp;</a></li>
											<li><a href='resetarSenhaPag.php' class='button special'>&nbsp;&nbsp;&nbsp;Resetar Senha&nbsp;&nbsp;&nbsp;</a></li><br><br>
											<li><a href='criarEvento.php' class='button special'>&nbsp;&nbsp;&nbsp;Criar Evento&nbsp;&nbsp;&nbsp;</a></li>
										</ul></center>";
									}
									?>

								</section>

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Search 
								<section id="search" class="alt">
									<form method="post" action="#">
										<input type="text" name="query" id="query" placeholder="Search" />
									</form>
								</section>-->

							<!-- Menu -->
								<nav id="menu">
									<?php
										include("barraLateral.php");
									?>
								

						</div>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>