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
		<title>Editar</title>
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
								<section id="banner">
									<div class="content">
										<header>
											<h1>Editar<br/></h1>
											<p>Edite seu texto abaixo</p>
										</header>
									</div>
								</section>

							<!-- Section -->

							<!-- Section -->
							<?php

								if (isset($_SESSION["usuario"]) and isset($_REQUEST["id"])){
									$id= $_SESSION["usuario"];
									$idt= $_REQUEST["id"];
								}
								if ($id and $idt){

									$resposta = mysqli_query($link, "select * from texto where idP = '$id' and id_texto = '$idt'");

									if ($resposta){

										$linha = mysqli_fetch_assoc($resposta);

										if ($linha){
											

												echo "<section><form name='form' method='post' action='editarTp.php' enctype='multipart/form-data'>
												<h4>Nome</h4>
											<div class='row uniform'>
												<div class='6u 12u$(xsmall)'>
													<input type='text' name='nome' id='nome' value='$linha[nome]' placeholder='Nome' required='' />
												</div>";
											
												include("conectaBanco.php");
												

												$resposta2 = mysqli_query($link, "select * from materia");
												if($resposta2){	

													$linha2 = mysqli_fetch_assoc($resposta2);
													echo "<div class='6u$ 12u$(xsmall)'><div class='select-wrapper'><select name='materia' id='demo-category'><option value='0'>Selecione uma matéria</option>";
													while($linha2){		
														if($linha2['id_materia']==$linha['idM']){
															echo"<option VALUE={$linha2['id_materia']} selected>{$linha2['nome']}</option>";
														}
														else{
															echo"<option VALUE={$linha2['id_materia']}>{$linha2['nome']}</option>";
														}
														$linha2 = mysqli_fetch_assoc($resposta2);
													}
													echo"</select></div></div></div>";
												}
											
											echo"<br><h4>Resumo</h4>
											<textarea name='resumo' id='resumo' placeholder='Resumo' style='resize:none;height:300px;'' rows='8' required=''>$linha[resumo]</textarea>";
											$id=$_SESSION['usuario']; echo "<input type='hidden' name='id' value='$linha[id_texto]'>
											<br>
									        <button type='submit' accesskey='S' name='sbmSalvar' class='infraButton'><span class='infraTeclaAtalho'>E</span>nviar</button><br><br><br>
									</form></section>";
										}
										else{
											echo mysqli_error($link);										
										}
									}
									else{
										mysqli_error($link);
									}
									}		
							?>

						<section><form name="form" method="post" action="novoMB.php" enctype="multipart/form-data">
									    <fieldset class="infraFieldset">
									        <h2 class="infraLegend">Nova Matéria</h2>
											<h4>Nome</h4>
											<input type="text" name="titulo">
											<br>
									        <button type="submit" accesskey="S" name="local" value="1" class="infraButton"><span class="infraTeclaAtalho">A</span>dicionar</button>
									</form>

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