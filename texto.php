<?php
	include("conectaBanco.php");
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
		<title>Texto</title>
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
								<!--	<a href="index.html" class="logo"><strong>Editorial</strong> by HTML5 UP</a>
									<ul class="icons">
										<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
										<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon fa-medium"><span class="label">Medium</span></a></li>
									</ul>-->
								</header>

							<!-- Banner -->
								

							<!-- Section -->
							<?php
								echo"<section>
									<center>
									<header class='main'>";
										if(isset($_REQUEST['aluno'])){

											$aluno = $_REQUEST['aluno'];
											$id=$_REQUEST["id"];
											$resposta = mysqli_query($link, "select * from textoaluno where id_textoA ='$id' and aluno = $aluno");
											if($resposta){	
											
												$linha = mysqli_fetch_assoc($resposta);
												if($linha){
													$resposta2 = mysqli_query($link, "select * from professor where id_professor='$linha[idP]'");
													if($resposta2){	
														
														$linha2 = mysqli_fetch_assoc($resposta2);
														if($linha2){
															echo"<h1>$linha[nome]</h1></header>";
															echo"<p>$linha[resumo]</p></section>";
															echo "<center><a href='{$linha['arquivo']}' class='button icon fa-download' download='{$linha['nome']}'>Download</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
															echo "<button><a href='{$linha['arquivo']}'>Ler Online</a></button></center>";
															echo"<br><h4>Publicado por: $linha2[nome]</h4></header>";
															if( $aluno == 1 ){
																echo"<h4>Aluno(s): $linha[nomeA]</h4>";
															}
															else{
																echo"<h4>Estagiário(s): $linha[nomeA]</h4>";
															}
															if (isset($_SESSION["usuario"])){
																if(isset($_REQUEST['aluno'])){
																	echo"<br><center><ul class='actions'>
																		<li><a href='editarTA.php?id=$id' class='button special'>Editar</a></li>
																		<li><a href='excluirT.php?id=$id&aluno=1' class='button special'>Excluir</a></li>
																	</ul></center>";
																}
																else{
																	echo"<br><center><ul class='actions'>
																		<li><a href='editarT.php?id=$id' class='button special'>Editar</a></li>
																		<li><a href='excluirT.php?id=$id&aluno=1' class='button special'>Excluir</a></li>
																	</ul></center>";
																}
															}
														}
													}
												}
											}

										}else{
											
											$id=$_REQUEST["id"];
											$resposta = mysqli_query($link, "select * from texto where id_texto='$id'");
											if($resposta){	
											
												$linha = mysqli_fetch_assoc($resposta);
												if($linha){
													$resposta2 = mysqli_query($link, "select * from professor where id_professor='$linha[idP]'");
													if($resposta2){	
														
														$linha2 = mysqli_fetch_assoc($resposta2);
														if($linha2){
															echo"<h1>$linha[nome]</h1></header>";
															echo"<p>$linha[resumo]</p></section>";
															echo "<center><a href='{$linha['arquivo']}' class='button icon fa-download' download='{$linha['nome']}'>Download</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
															echo "<button><a href='{$linha['arquivo']}'>Ler Online</a></button></center>";
															echo"<br><h4>Publicado por: $linha2[nome]</h4></header>";
															if (isset($_SESSION["usuario"])){
																echo"<br><center><ul class='actions'>
																	<li><a href='editarT.php?id=$id' class='button special'>Editar</a></li>
																	<li><a href='excluirT.php?id=$id' class='button special'>Excluir</a></li>
																</ul></center>";
															}
														}
													}
												}
											}

										}
							?>

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

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
