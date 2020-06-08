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
											<p>Edite seu perfil abaixo</p>
										</header>
									</div>
								</section>

							<!-- Section -->

							<!-- Section -->
							<?php

								if (isset($_SESSION["usuario"])){
									$id= $_SESSION["usuario"];
								}
								if($id){

									$resposta = mysqli_query($link, "select * from professor where id_professor = '$id'");

									if ($resposta){

										$linha = mysqli_fetch_assoc($resposta);

										if ($linha){
											echo"<section>
												<center>
													<form method='post' action='editarPp.php'>	
															<div class='6u 12u$(xsmall)'>
																<input type='text' name='nome' id='nome' value='$linha[nome]' placeholder='Nome' required='' />
															</div>
															<br>
															<div class='6u$ 12u$(xsmall)'>
																<input type='email' name='email' id='email' value='$linha[email]' placeholder='E-mail' required=''/>
															</div>
															<br>
															<div class='6u$ 12u$(xsmall)'>
																<input type='text' name='blog' id='blog' value='$linha[blog]' placeholder='Link para blog (opcional)' />
															</div>
															<br>
															<div class='12u$''>
																<textarea name='biografia' id='biografia' placeholder='Biografia' style='resize:none; width:50%;' rows='8' required=''>$linha[biografia]</textarea>
															</div>
															<br>
															<!-- Break -->
															<div class='12u$'>
																<ul class='actions'>
																	<li><input type='submit' value='Editar' class='special' /></li>
																</ul>
															</div>
													</form>
												</center>";	
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