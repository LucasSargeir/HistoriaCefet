<?php session_start();  
	if(isset($_SESSION["usuario"])){
		$idA=$_SESSION["usuario"];
	}
	else{
		header("location:index.php");
	}
	include("conectaBanco.php");
	include("functionImagem.php");
?>
<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Criar Evento</title>
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
									
									<!--<ul class="icons">
										<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
										<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon fa-medium"><span class="label">Medium</span></a></li>
									</ul>-->
								</header>

							<!-- Content -->
								<section>
									<header class="main">
										
									</header>
									
									<form name="form" method="post" action="criarEventoLogica.php" enctype="multipart/form-data">
									    <fieldset class="infraFieldset">
									        <h2 class="infraLegend">Crie seus eventos</h2>
									        Nome:
									        <input type="text" name="nome" id="nome" style='width:50%' placeholder="Nome" required=''/><br>
									        Local:
									        <input type="text" name="local" id="local" style='width:50%' placeholder="Local" required=''/><br>
									        Imagem:<br>
									        <input type="file" name="imagem" id="imagem" style='width:50%' required=''/><br>
									        <br>Descricao: 	
									        <textarea cols='10' rows='10' style='resize:none; width:75%;border: 1px solid black' id='descricao' name='descricao' required='' placeholder="Breve descrição do evento"></textarea><br>
									        <div class="row uniform">
										        
										        <div class="6u 12u$(xsmall)">
										        Data de Início:<br> 	
										        	<input type="date" name="data_ini" id="data_ini" style='width:60%' required=''/><br><br>	
										        </div>
										        
										        <div class="6u 12u$(xsmall)">
										        Data de Término:<br> 	
										        	<input type="date" name="data_fin" id="data_fin" style='width:60%' required=''/><br><br>
										        </div>
										        
										        <div class="6u 12u$(xsmall)">
										        Hora de Início:<br> 	
										        	<input type="time" name="hora_ini" id="hora_ini" style='width:60%' required=''/><br><br>
										        </div>
										        
										        <div class="6u 12u$(xsmall)">
										        Hora de Término:<br> 	
										        	<input type="time" name="hora_fin" id="hora_fin" style='width:60%' required=''/><br><br>
										        </div>
										    </div>
										    <br><input type="submit" value='Enviar' />
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