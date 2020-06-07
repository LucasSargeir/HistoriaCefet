<?php session_start(); $idA=$_SESSION["usuario"]; ?>
	<!--<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
</head>
<body>
 


</body>
</html>-->


<?php
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
		<title>Excluir</title>
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
									
									<form name="form" method="post" action="cTexto.php" enctype="multipart/form-data">
									    <fieldset class="infraFieldset">
									        <h2 class="infraLegend">Todos os professores</h2>
									        <h3>Clique nos nomes para excluir (Quando um professor for excluido ele não será recuperado)</h3>
											<?php
												$resposta3 = mysqli_query($link, "select * from professor where id_professor='$idA'");
												if($resposta3){	
													$linha3 = mysqli_fetch_assoc($resposta3);
													if($linha3['admin']){
														$resposta2 = mysqli_query($link, "select * from professor where admin='false'");
														if($resposta2){	

															$linha2 = mysqli_fetch_assoc($resposta2);
															while($linha2){		
																echo"<a href='excluirP.php?id={$linha2['id_professor']}'>{$linha2['nome']}</a>&nbsp;&nbsp;&nbsp;&nbsp;";
																$linha2 = mysqli_fetch_assoc($resposta2);
															}
														}
													}
													else{
														echo"<h3>Você não deveria estar aqui, vá embora. Como não sou mau colocarei um botão que vai te levar para algum lugar</h3><br><center><a href='http://www3.pudim.com/mf.php' class='button special'>É aqui</a></center>";
													}
												}
											?>
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